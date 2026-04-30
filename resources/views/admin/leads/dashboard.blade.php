@extends('layouts.app-admin')

@section('titulo')
    CRM Dashboard
@endsection

@section('content')
    <header class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">CRM</p>
            <h1 class="admin-topbar__title">Dashboard comercial</h1>
        </div>
        <div class="admin-topbar__actions">
            <span class="admin-kpi-pill">{{ number_format($totalLeads) }} leads registrados</span>
        </div>
    </header>

    <main class="admin-content">
        @if (! $crmReady)
            <div class="admin-alert admin-alert--error">
                El dashboard CRM a&uacute;n no est&aacute; disponible porque faltan las tablas del sistema. Ejecuta las migraciones para habilitarlo.
            </div>
        @endif

        <section class="crm-dashboard">
            <div class="crm-dashboard__cards">
                @foreach ($summaryCards as $card)
                    <article class="crm-stat-card">
                        <div class="crm-stat-card__head">
                            <span class="crm-stat-card__icon">
                                <i class="fa-solid {{ $card['icon'] }}" aria-hidden="true"></i>
                            </span>
                            <span class="crm-stat-card__delta crm-stat-card__delta--{{ $card['delta']['direction'] }}">
                                {{ $card['delta']['value'] }}
                            </span>
                        </div>
                        <p class="crm-stat-card__label">{{ $card['title'] }}</p>
                        <strong class="crm-stat-card__value">{{ $card['value'] }}</strong>
                        <small class="crm-stat-card__meta">{{ $card['delta']['label'] }}</small>
                        <svg class="crm-stat-card__sparkline" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                            <polyline points="{{ $card['sparkline'] }}" />
                        </svg>
                    </article>
                @endforeach
            </div>

            <div class="crm-dashboard__grid">
                <section class="admin-panel crm-analytics-card">
                    <div class="admin-panel__header">
                        <div>
                            <h2>Flujo de captaci&oacute;n</h2>
                            <span class="admin-link">Nuevos leads por mes vs mismo periodo del a&ntilde;o anterior</span>
                        </div>
                    </div>

                    <div class="crm-bars">
                        @foreach ($monthlySeries as $month)
                            <div class="crm-bars__group">
                                <div class="crm-bars__columns">
                                    <span class="crm-bars__bar crm-bars__bar--ghost" style="height: {{ $month['projected_height'] }}%" title="A&ntilde;o anterior: {{ $month['projected'] }}"></span>
                                    <span class="crm-bars__bar crm-bars__bar--solid" style="height: {{ $month['actual_height'] }}%" title="Actual: {{ $month['actual'] }}"></span>
                                </div>
                                <div class="crm-bars__legend">
                                    <strong>{{ $month['actual'] }}</strong>
                                    <span>{{ strtoupper($month['label']) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="crm-stage-strip">
                        @foreach ($pipelineSnapshot as $stage)
                            <article class="crm-stage-pill" style="--crm-stage-color: {{ $stage['color'] }}">
                                <span>{{ $stage['name'] }}</span>
                                <strong>{{ $stage['count'] }}</strong>
                            </article>
                        @endforeach
                    </div>
                </section>

                <div class="crm-dashboard__stack">
                    <section class="admin-panel crm-side-card">
                        <div class="admin-panel__header">
                            <div>
                                <h2>Actividad reciente</h2>
                                <span class="admin-link">Ultimos movimientos registrados en el CRM</span>
                            </div>
                        </div>

                        <div class="crm-activity-list">
                            @forelse ($recentActivities as $activity)
                                <article class="crm-activity-item">
                                    <span class="crm-activity-item__dot"></span>
                                    <div class="crm-activity-item__copy">
                                        <strong>{{ $activity->user?->name ?? 'Sistema' }}</strong>
                                        <p>{{ $activity->title }}{{ $activity->lead?->full_name ? ' en ' . $activity->lead->full_name : '' }}</p>
                                        <small>{{ $activity->created_at?->diffForHumans() ?? 'Sin fecha' }}</small>
                                    </div>
                                </article>
                            @empty
                                <p class="crm-side-card__empty">Todav&iacute;a no hay actividad reciente registrada.</p>
                            @endforelse
                        </div>
                    </section>

                    <section class="admin-panel crm-side-card">
                        <div class="admin-panel__header">
                            <div>
                                <h2>Proximos seguimientos</h2>
                                <span class="admin-link">Leads con seguimiento programado en los proximos 7 dias</span>
                            </div>
                        </div>

                        <div class="crm-task-list">
                            @forelse ($upcomingFollowUps as $lead)
                                <article class="crm-task-item">
                                    <div class="crm-task-item__check">
                                        <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="crm-task-item__copy">
                                        <strong>{{ $lead->full_name }}</strong>
                                        <p>{{ $lead->status?->name ?? 'Sin etapa' }}{{ $lead->assignedUser?->name ? ' · ' . $lead->assignedUser->name : '' }}</p>
                                        <small>{{ $lead->next_follow_up_at?->translatedFormat('d M Y, H:i') }}</small>
                                    </div>
                                </article>
                            @empty
                                <p class="crm-side-card__empty">No hay seguimientos programados en los proximos 7 dias.</p>
                            @endforelse
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection
