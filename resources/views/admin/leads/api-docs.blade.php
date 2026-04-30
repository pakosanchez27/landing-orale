@extends('layouts.app-admin')

@section('titulo')
    API Bot CRM
@endsection

@section('content')
    <header class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">CRM</p>
            <h1 class="admin-topbar__title">Documentaci&oacute;n API del bot</h1>
        </div>
        <div class="admin-topbar__actions">
            <span class="admin-kpi-pill">Bearer Token requerido</span>
        </div>
    </header>

    <main class="admin-content">
        <section class="crm-docs">
            <article class="admin-panel crm-docs__intro">
                <div class="admin-panel__header">
                    <div>
                        <h2>Resumen</h2>
                        <span class="admin-link">Esta API permite que n8n interact&uacute;e con el CRM sin tocar la base directamente.</span>
                    </div>
                </div>

                <div class="crm-docs__meta">
                    <div class="crm-docs__meta-card">
                        <span>Base URL</span>
                        <code>{{ $baseApiUrl }}</code>
                    </div>
                    <div class="crm-docs__meta-card">
                        <span>Autenticaci&oacute;n</span>
                        <code>Authorization: Bearer TU_TOKEN</code>
                    </div>
                    <div class="crm-docs__meta-card">
                        <span>Variable .env</span>
                        <code>CRM_BOT_API_TOKEN</code>
                    </div>
                </div>
            </article>

            <article class="admin-panel crm-docs__section">
                <div class="admin-panel__header">
                    <div>
                        <h2>Headers obligatorios</h2>
                        <span class="admin-link">Env&iacute;alos en todas las peticiones del bot.</span>
                    </div>
                </div>

                <pre class="crm-docs__code"><code>Authorization: Bearer TU_TOKEN
Accept: application/json
Content-Type: application/json</code></pre>
            </article>

            <article class="admin-panel crm-docs__section">
                <div class="admin-panel__header">
                    <div>
                        <h2>1. Crear o actualizar lead</h2>
                        <span class="admin-link">Endpoint principal para que el bot inserte o sincronice leads.</span>
                    </div>
                </div>

                <div class="crm-docs__endpoint">
                    <strong>POST</strong>
                    <code>{{ $baseApiUrl }}/leads/upsert</code>
                </div>

                <p class="crm-docs__copy">Busca por WhatsApp o correo. Si existe, actualiza; si no, crea el lead.</p>

                <pre class="crm-docs__code"><code>{
  "full_name": "Juan Perez",
  "email": "juan@correo.com",
  "whatsapp_number": "+525512345678",
  "source": "bot",
  "status": "new",
  "score": 75,
  "interest_package": "profesional",
  "needs_summary": "Quiere una landing para su clinica",
  "bot_session_id": "wa-session-001",
  "origin_meta": {
    "canal": "whatsapp",
    "origen": "n8n"
  }
}</code></pre>

                <pre class="crm-docs__code"><code>curl.exe -X POST "{{ $baseApiUrl }}/leads/upsert" ^
  -H "Authorization: Bearer TU_TOKEN" ^
  -H "Accept: application/json" ^
  -H "Content-Type: application/json" ^
  -d "{\"full_name\":\"Juan Perez\",\"email\":\"juan@correo.com\",\"whatsapp_number\":\"+525512345678\",\"source\":\"bot\",\"status\":\"new\"}"</code></pre>
            </article>

            <article class="admin-panel crm-docs__section">
                <div class="admin-panel__header">
                    <div>
                        <h2>2. Registrar actividad</h2>
                        <span class="admin-link">Guarda notas o eventos del bot en el historial del lead.</span>
                    </div>
                </div>

                <div class="crm-docs__endpoint">
                    <strong>POST</strong>
                    <code>{{ $baseApiUrl }}/leads/{lead}/activity</code>
                </div>

                <pre class="crm-docs__code"><code>{
  "title": "Seguimiento inicial desde bot",
  "description": "El prospecto respondio que si le interesa una llamada.",
  "type": "bot_update",
  "source": "bot",
  "meta": {
    "canal": "whatsapp"
  }
}</code></pre>
            </article>

            <article class="admin-panel crm-docs__section">
                <div class="admin-panel__header">
                    <div>
                        <h2>3. Cambiar estado del lead</h2>
                        <span class="admin-link">Mueve al lead entre fases del CRM y exige nota de seguimiento.</span>
                    </div>
                </div>

                <div class="crm-docs__endpoint">
                    <strong>POST</strong>
                    <code>{{ $baseApiUrl }}/leads/{lead}/status</code>
                </div>

                <pre class="crm-docs__code"><code>{
  "status": "qualified",
  "follow_up_note": "El lead confirmo interes y cumple con el perfil.",
  "source": "bot"
}</code></pre>

                <div class="crm-docs__chips">
                    <span>new</span>
                    <span>pending_contact</span>
                    <span>contacted</span>
                    <span>qualified</span>
                    <span>scheduled</span>
                    <span>proposal_sent</span>
                    <span>won</span>
                    <span>lost</span>
                </div>
            </article>

            <article class="admin-panel crm-docs__section">
                <div class="admin-panel__header">
                    <div>
                        <h2>4. Agendar cita</h2>
                        <span class="admin-link">Crea una cita en el CRM cuando el bot consiga fecha y hora.</span>
                    </div>
                </div>

                <div class="crm-docs__endpoint">
                    <strong>POST</strong>
                    <code>{{ $baseApiUrl }}/leads/{lead}/appointments</code>
                </div>

                <pre class="crm-docs__code"><code>{
  "starts_at": "2026-05-02 16:00:00",
  "ends_at": "2026-05-02 16:30:00",
  "channel": "google_meet",
  "meeting_link": "https://meet.google.com/abc-defg-hij",
  "status": "scheduled",
  "notes": "Llamada agendada por el bot.",
  "source": "bot",
  "follow_up_note": "Se agenda llamada de descubrimiento."
}</code></pre>
            </article>

            <article class="admin-panel crm-docs__section">
                <div class="admin-panel__header">
                    <div>
                        <h2>Flujo recomendado en n8n</h2>
                        <span class="admin-link">Orden sugerido para mantener limpio el historial del CRM.</span>
                    </div>
                </div>

                <ol class="crm-docs__steps">
                    <li>Recibir mensaje del canal origen.</li>
                    <li>Hacer `upsert` del lead en el CRM.</li>
                    <li>Guardar actividad relevante del bot.</li>
                    <li>Si califica, cambiar estado con nota.</li>
                    <li>Si agenda llamada, crear appointment.</li>
                </ol>
            </article>
        </section>
    </main>
@endsection
