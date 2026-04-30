<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioContactoRequest;
use App\Mail\ConfirmacionCliente;
use App\Mail\NuevoCliente;
use App\Models\IndustriaModel;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class FormularioController extends Controller
{
    public function enviar(FormularioContactoRequest $request)
    {
        // Datos validados
        $data = $request->validated();
        $phoneE164 = $data['whatsapp_codigo'] . $data['whatsapp'];
        $data['whatsapp'] = trim($data['whatsapp_codigo'] . ' ' . $data['whatsapp']);

        if ($this->crmTablesAvailable()) {
            DB::transaction(function () use ($data, $phoneE164) {
                $landingSource = LeadSource::query()->where('key', 'landing')->first();
                $newStatus = LeadStatus::query()->where('key', 'new')->first();

                if ($landingSource && $newStatus) {
                    $lead = Lead::query()
                        ->where('phone_e164', $phoneE164)
                        ->orWhere('email', $data['correo'])
                        ->first();

                    $isNewLead = $lead === null;
                    $industryId = $this->resolveIndustryId($data['industria']);

                    if (! $lead) {
                        $lead = new Lead();
                        $lead->source_id = $landingSource->id;
                        $lead->status_id = $newStatus->id;
                    }

                    $lead->fill([
                        'full_name' => $data['nombre'],
                        'email' => $data['correo'],
                        'phone_country_code' => $data['whatsapp_codigo'],
                        'phone_number' => $data['whatsapp'],
                        'phone_e164' => $phoneE164,
                        'whatsapp_number' => $data['whatsapp'],
                        'industry_id' => $industryId,
                        'interest_package' => $data['paquete'],
                        'needs_summary' => $data['mensaje'],
                        'origin_meta' => [
                            'form' => 'contacto',
                            'industria' => $data['industria'],
                            'paquete' => $data['paquete'],
                            'aviso_privacidad' => true,
                        ],
                    ]);
                    $lead->save();

                    LeadActivity::create([
                        'lead_id' => $lead->id,
                        'source_id' => $landingSource->id,
                        'type' => $isNewLead ? 'created' : 'updated',
                        'title' => $isNewLead ? 'Lead registrado desde landing page' : 'Lead actualizado desde landing page',
                        'description' => 'Formulario de contacto enviado desde la landing page.',
                        'meta' => [
                            'correo' => $data['correo'],
                            'whatsapp' => $phoneE164,
                            'industria' => $data['industria'],
                            'paquete' => $data['paquete'],
                        ],
                    ]);
                }
            });
        }

        $equipo = [
            'contacto@oraleweb.com',
            'javier.sanchezjps27@gmail.com',
        ];


        // Enviar email al equipo
        Mail::to($equipo)->send(new NuevoCliente($data));

        // Enviar confirmacion al cliente

        Mail::to($data['correo'])
            ->send(new ConfirmacionCliente($data));


        // Opcional: redireccionar con mensaje
        return back()->with('success', 'Tu mensaje fue enviado correctamente.');
    }

    private function crmTablesAvailable(): bool
    {
        return Schema::hasTable('leads')
            && Schema::hasTable('lead_sources')
            && Schema::hasTable('lead_statuses')
            && Schema::hasTable('lead_activities');
    }

    private function resolveIndustryId(string $industryKey): ?int
    {
        $industryNameMap = [
            'hospitalidad' => 'Hospitalidad y alimentos',
            'inmobiliarias' => 'Inmobiliarias',
            'medica' => 'Medica',
            'turismo' => 'Turismo',
            'profesional' => 'Profesional y freelancer',
            'otro' => 'Otro',
        ];

        $industryName = $industryNameMap[$industryKey] ?? null;

        if (! $industryName || ! Schema::hasTable('industrias')) {
            return null;
        }

        return IndustriaModel::query()
            ->where('nombre', $industryName)
            ->value('id');
    }
}
