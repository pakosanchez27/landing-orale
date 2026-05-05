<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\LeadBotSession;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CrmBotController extends Controller
{
    public function upsertLead(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'full_name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp_number' => ['nullable', 'string', 'max:30'],
            'phone_country_code' => ['nullable', 'string', 'max:10'],
            'phone_number' => ['nullable', 'string', 'max:30'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'industry_id' => ['nullable', 'integer', 'exists:industrias,id'],
            'source' => ['nullable', 'string', 'max:60'],
            'status' => ['nullable'],
            'score' => ['nullable', 'integer', 'min:0', 'max:100'],
            'interest_package' => ['nullable', 'string', 'max:255'],
            'budget_range' => ['nullable', 'string', 'max:255'],
            'needs_summary' => ['nullable', 'string'],
            'last_contact_at' => ['nullable', 'date'],
            'next_follow_up_at' => ['nullable', 'date'],
            'qualified_at' => ['nullable', 'date'],
            'won_at' => ['nullable', 'date'],
            'lost_at' => ['nullable', 'date'],
            'lost_reason' => ['nullable', 'string', 'max:255'],
            'bot_session_id' => ['nullable', 'string', 'max:255'],
            'qualification_result' => ['nullable', 'string', 'max:255'],
            'qualification_score' => ['nullable', 'integer', 'min:0', 'max:100'],
            'origin_meta' => ['nullable', 'array'],
        ]);

        if (blank($validated['email'] ?? null) && blank($validated['whatsapp_number'] ?? null)) {
            throw ValidationException::withMessages([
                'whatsapp_number' => 'Debes enviar al menos WhatsApp o correo para identificar el lead.',
            ]);
        }

        $source = $this->resolveSource($validated['source'] ?? 'bot');
        $status = $this->resolveStatus($validated['status'] ?? 'new');
        $normalizedWhatsapp = $this->normalizePhone($validated['whatsapp_number'] ?? null);
        $normalizedPhone = $this->normalizePhone($validated['phone_number'] ?? null, $validated['phone_country_code'] ?? null);

        $leadQuery = Lead::query();
        $leadQuery->where(function ($query) use ($normalizedWhatsapp, $normalizedPhone, $validated) {
            if ($normalizedWhatsapp) {
                $query->where('phone_e164', $normalizedWhatsapp)
                    ->orWhere('whatsapp_number', $validated['whatsapp_number']);
            } elseif ($normalizedPhone) {
                $query->where('phone_e164', $normalizedPhone);
            }

            if (! blank($validated['email'] ?? null)) {
                $query->orWhere('email', $validated['email']);
            }
        });

        $lead = $leadQuery->first();

        $isNew = ! $lead;
        $lead ??= new Lead();

        $lead->fill([
            'full_name' => $validated['full_name'] ?? $lead->full_name ?? 'Lead sin nombre',
            'email' => $validated['email'] ?? $lead->email,
            'phone_country_code' => $validated['phone_country_code'] ?? $lead->phone_country_code,
            'phone_number' => $validated['phone_number'] ?? $lead->phone_number,
            'phone_e164' => $normalizedWhatsapp ?: ($normalizedPhone ?: $lead->phone_e164),
            'whatsapp_number' => $validated['whatsapp_number'] ?? $lead->whatsapp_number,
            'company_name' => $validated['company_name'] ?? $lead->company_name,
            'industry_id' => $validated['industry_id'] ?? $lead->industry_id,
            'source_id' => $lead->exists ? ($lead->source_id ?: $source->id) : $source->id,
            'status_id' => $status->id,
            'score' => $validated['score'] ?? $lead->score,
            'interest_package' => $validated['interest_package'] ?? $lead->interest_package,
            'budget_range' => $validated['budget_range'] ?? $lead->budget_range,
            'needs_summary' => $validated['needs_summary'] ?? $lead->needs_summary,
            'last_contact_at' => $validated['last_contact_at'] ?? $lead->last_contact_at,
            'next_follow_up_at' => $validated['next_follow_up_at'] ?? $lead->next_follow_up_at,
            'qualified_at' => $validated['qualified_at'] ?? $lead->qualified_at,
            'won_at' => $validated['won_at'] ?? $lead->won_at,
            'lost_at' => $validated['lost_at'] ?? $lead->lost_at,
            'lost_reason' => $validated['lost_reason'] ?? $lead->lost_reason,
            'origin_meta' => array_filter([
                ...($lead->origin_meta ?? []),
                ...($validated['origin_meta'] ?? []),
                'last_ingested_from' => 'bot',
            ], fn($value) => $value !== null && $value !== ''),
        ]);
        $lead->save();

        LeadActivity::create([
            'lead_id' => $lead->id,
            'user_id' => null,
            'source_id' => $source->id,
            'type' => $isNew ? 'created' : 'bot_update',
            'title' => $isNew ? 'Lead creado desde bot' : 'Lead actualizado desde bot',
            'description' => $validated['needs_summary'] ?? 'Sin resumen adicional.',
            'meta' => [
                'channel' => 'n8n',
                'status' => $status->name,
                'score' => $validated['score'] ?? $lead->score,
            ],
        ]);

        $this->syncBotSession($lead, $validated);

        return response()->json([
            'ok' => true,
            'message' => $isNew ? 'Lead creado correctamente.' : 'Lead actualizado correctamente.',
            'data' => [
                'lead_id' => $lead->id,
                'uuid' => $lead->uuid,
                'created' => $isNew,
                'status' => [
                    'id' => $status->id,
                    'key' => $status->key,
                    'name' => $status->name,
                ],
            ],
        ]);
    }

    public function storeActivity(Request $request, Lead $lead): JsonResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['nullable', 'string', 'max:60'],
            'source' => ['nullable', 'string', 'max:60'],
            'meta' => ['nullable', 'array'],
        ]);

        $source = $this->resolveSource($validated['source'] ?? 'bot');

        $activity = LeadActivity::create([
            'lead_id' => $lead->id,
            'user_id' => null,
            'source_id' => $source->id,
            'type' => $validated['type'] ?? 'bot_update',
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'meta' => [
                'channel' => 'n8n',
                ...($validated['meta'] ?? []),
            ],
        ]);

        return response()->json([
            'ok' => true,
            'message' => 'Actividad registrada correctamente.',
            'data' => [
                'activity_id' => $activity->id,
            ],
        ]);
    }

    public function updateStatus(Request $request, Lead $lead): JsonResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'max:60'],
            'follow_up_note' => ['required', 'string', 'min:3'],
            'source' => ['nullable', 'string', 'max:60'],
        ]);

        $source = $this->resolveSource($validated['source'] ?? 'bot');
        $status = $this->resolveStatus($validated['status']);
        $previousStatus = $lead->status;

        if ((int) $lead->status_id !== (int) $status->id) {
            $lead->status_id = $status->id;
            $lead->save();
        }

        LeadActivity::create([
            'lead_id' => $lead->id,
            'user_id' => null,
            'source_id' => $source->id,
            'type' => 'status_changed',
            'title' => 'Estado actualizado desde bot',
            'description' => sprintf(
                'El lead cambio de "%s" a "%s". Nota: %s',
                $previousStatus?->name ?? 'Sin etapa',
                $status->name,
                $validated['follow_up_note']
            ),
            'meta' => [
                'previous_status_id' => $previousStatus?->id,
                'new_status_id' => $status->id,
                'previous_status_name' => $previousStatus?->name,
                'new_status_name' => $status->name,
                'follow_up_note' => $validated['follow_up_note'],
                'channel' => 'n8n',
            ],
        ]);

        return response()->json([
            'ok' => true,
            'message' => 'Estado actualizado correctamente.',
            'data' => [
                'lead_id' => $lead->id,
                'status' => [
                    'id' => $status->id,
                    'key' => $status->key,
                    'name' => $status->name,
                ],
            ],
        ]);
    }

    public function storeAppointment(Request $request, Lead $lead): JsonResponse
    {
        $validated = $request->validate([
            'starts_at' => ['required', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'channel' => ['required', 'string', 'max:60'],
            'meeting_link' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'status' => ['nullable', 'string', 'max:60'],
            'source' => ['nullable', 'string', 'max:60'],
            'follow_up_note' => ['nullable', 'string', 'min:3'],
        ]);

        $source = $this->resolveSource($validated['source'] ?? 'bot');

        $appointment = Appointment::create([
            'lead_id' => $lead->id,
            'created_by' => null,
            'scheduled_by_source_id' => $source->id,
            'starts_at' => $validated['starts_at'],
            'ends_at' => $validated['ends_at'] ?? null,
            'channel' => $validated['channel'],
            'meeting_link' => $validated['meeting_link'] ?? null,
            'status' => $validated['status'] ?? 'scheduled',
            'notes' => $validated['notes'] ?? null,
        ]);

        LeadActivity::create([
            'lead_id' => $lead->id,
            'user_id' => null,
            'source_id' => $source->id,
            'type' => 'appointment_created',
            'title' => 'Cita agendada desde bot',
            'description' => $validated['notes'] ?? 'Cita registrada desde n8n.',
            'meta' => [
                'appointment_id' => $appointment->id,
                'starts_at' => $appointment->starts_at?->toIso8601String(),
                'channel' => $appointment->channel,
                'follow_up_note' => $validated['follow_up_note'] ?? null,
            ],
        ]);

        return response()->json([
            'ok' => true,
            'message' => 'Cita registrada correctamente.',
            'data' => [
                'appointment_id' => $appointment->id,
                'lead_id' => $lead->id,
            ],
        ]);
    }

    private function resolveSource(string $key): LeadSource
    {
        return LeadSource::query()->firstOrCreate(
            ['key' => Str::slug($key, '_')],
            [
                'name' => Str::headline($key),
                'description' => 'Fuente generada automaticamente para integraciones.',
                'is_active' => true,
            ]
        );
    }

    private function resolveStatus(int|string|null $value): LeadStatus
    {
        if (blank($value)) {
            $value = 'new';
        }

        $status = LeadStatus::query()
            ->when(
                is_numeric($value),
                fn($query) => $query->where('id', (int) $value),
                fn($query) => $query
                    ->where('key', Str::slug((string) $value, '_'))
                    ->orWhere('name', (string) $value)
            )
            ->first();

        if (! $status) {
            throw ValidationException::withMessages([
                'status' => 'El estatus enviado no existe en el CRM.',
            ]);
        }

        return $status;
    }

    private function normalizePhone(?string $number, ?string $countryCode = null): ?string
    {
        if (blank($number)) {
            return null;
        }

        $digits = preg_replace('/\D+/', '', $number);
        $prefix = preg_replace('/\D+/', '', (string) $countryCode);

        if ($prefix && ! str_starts_with($digits, $prefix)) {
            $digits = $prefix . $digits;
        }

        return $digits ? '+' . $digits : null;
    }

    private function syncBotSession(Lead $lead, array $validated): void
    {
        if (
            ! Schema::hasTable('lead_bot_sessions')
            || blank($validated['bot_session_id'] ?? null)
        ) {
            return;
        }

        LeadBotSession::query()->updateOrCreate(
            [
                'lead_id' => $lead->id,
                'session_id' => $validated['bot_session_id'],
            ],
            [
                'provider' => 'n8n',
                'qualification_result' => $validated['qualification_result'] ?? null,
                'qualification_score' => $validated['qualification_score'] ?? ($validated['score'] ?? null),
                'collected_data' => $validated['origin_meta'] ?? null,
                'started_at' => now(),
            ]
        );
    }
}
