<?php

use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns lead data, status and activities when searching by phone', function () {
    config()->set('services.crm_bot.token', 'test-token');

    $source = LeadSource::query()->firstOrCreate([
        'key' => 'bot',
    ], [
        'name' => 'Bot',
        'description' => 'Bot source',
        'is_active' => true,
    ]);

    $status = LeadStatus::query()->firstOrCreate([
        'key' => 'new',
    ], [
        'name' => 'Nuevo',
        'sort_order' => 1,
        'color' => '#000000',
        'is_closed' => false,
    ]);

    $lead = Lead::query()->create([
        'full_name' => 'Juan Perez',
        'email' => 'juan@example.com',
        'phone_country_code' => '52',
        'phone_number' => '5551234567',
        'phone_e164' => '+525551234567',
        'whatsapp_number' => '5551234567',
        'company_name' => 'Acme',
        'source_id' => $source->id,
        'status_id' => $status->id,
        'needs_summary' => 'Quiere una cotizacion.',
    ]);

    LeadActivity::query()->create([
        'lead_id' => $lead->id,
        'source_id' => $source->id,
        'type' => 'created',
        'title' => 'Lead creado',
        'description' => 'Registro inicial.',
        'meta' => ['channel' => 'n8n'],
    ]);

    $response = $this
        ->withToken('test-token')
        ->getJson('/api/crm/bot/leads/search?phone=5551234567');

    $response
        ->assertOk()
        ->assertJsonPath('ok', true)
        ->assertJsonPath('data.exists', true)
        ->assertJsonPath('data.count', 1)
        ->assertJsonPath('data.leads.0.full_name', 'Juan Perez')
        ->assertJsonPath('data.leads.0.status.name', $status->name)
        ->assertJsonPath('data.leads.0.activities.0.title', 'Lead creado');
});

it('returns exists false when no lead matches the provided phone', function () {
    config()->set('services.crm_bot.token', 'test-token');

    $response = $this
        ->withToken('test-token')
        ->getJson('/api/crm/bot/leads/search?phone=0000000000');

    $response
        ->assertOk()
        ->assertJsonPath('ok', true)
        ->assertJsonPath('data.exists', false)
        ->assertJsonPath('data.count', 0)
        ->assertJsonPath('data.leads', []);
});
