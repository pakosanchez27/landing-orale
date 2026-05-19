@extends('layouts.app-admin')

@section('titulo')
    CRM Calendario
@endsection

@section('content')
    <header class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">CRM</p>
            <h1 class="admin-topbar__title">Calendario de citas</h1>
        </div>
        <div class="admin-topbar__actions">
            <a href="{{ $currentMonthUrl }}" class="admin-btn-secondary">
                <i class="fa-solid fa-calendar-day" aria-hidden="true"></i>
                Ir a hoy
            </a>
        </div>
    </header>

    <main class="admin-content">
        @if (session('status'))
            <div class="admin-alert admin-alert--success">
                {{ session('status') }}
            </div>
        @endif

        @if (! $calendarReady)
            <div class="admin-alert admin-alert--error">
                El calendario CRM no est&aacute; disponible porque faltan las tablas necesarias del sistema.
            </div>
        @endif

        <section class="crm-calendar-page">
            <article class="admin-panel crm-calendar-panel">
                <div class="admin-panel__header crm-calendar-panel__header">
                    <div>
                        <h2>{{ $monthDate->translatedFormat('F Y') }}</h2>
                        <span class="admin-link">Vista mensual de las citas agendadas desde el CRM y el bot.</span>
                    </div>
                    <div class="crm-calendar-toolbar">
                        <a href="{{ $previousMonthUrl }}" class="admin-btn-secondary" aria-label="Mes anterior">
                            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $nextMonthUrl }}" class="admin-btn-secondary" aria-label="Mes siguiente">
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="crm-calendar-weekdays" aria-hidden="true">
                    @foreach (['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'] as $weekday)
                        <span>{{ $weekday }}</span>
                    @endforeach
                </div>

                <div class="crm-calendar-grid">
                    @foreach ($calendarDays as $day)
                        <article class="crm-calendar-day {{ $day['isCurrentMonth'] ? '' : 'is-muted' }} {{ $day['isToday'] ? 'is-today' : '' }}">
                            <div class="crm-calendar-day__head">
                                <span class="crm-calendar-day__number">{{ $day['date']->day }}</span>
                                @if (($dailyTotals[$day['key']] ?? 0) > 0)
                                    <span class="crm-calendar-day__count">{{ $dailyTotals[$day['key']] }} cita{{ ($dailyTotals[$day['key']] ?? 0) === 1 ? '' : 's' }}</span>
                                @endif
                            </div>

                            <div class="crm-calendar-day__events">
                                @forelse ($day['appointments'] as $appointment)
                                    <div class="crm-calendar-event">
                                        <strong>{{ $appointment->starts_at?->format('H:i') }} - {{ $appointment->lead?->full_name ?? 'Lead sin nombre' }}</strong>
                                        <span>{{ $appointment->channel }}{{ $appointment->meeting_link ? ' - Con enlace' : '' }}</span>
                                    </div>
                                @empty
                                    <span class="crm-calendar-day__empty">Sin citas</span>
                                @endforelse

                                @if ($day['extraCount'] > 0)
                                    <span class="crm-calendar-day__more">+{{ $day['extraCount'] }} m&aacute;s</span>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </article>

            <div class="crm-calendar-sidebar">
                <article class="admin-panel crm-calendar-form">
                    <div class="admin-panel__header">
                        <div>
                            <h2>Agendar cita</h2>
                            <span class="admin-link">Registra una cita nueva y vinc&uacute;lala directamente al lead.</span>
                        </div>
                    </div>

                    <form action="{{ route('admin.crm.calendar.appointments.store') }}" method="POST" class="admin-form">
                        @csrf

                        <label class="admin-field">
                            Lead
                            <select name="lead_id" required>
                                <option value="">Selecciona un lead</option>
                                @foreach ($leadOptions as $lead)
                                    <option value="{{ $lead->id }}" @selected((string) old('lead_id') === (string) $lead->id)>
                                        {{ $lead->full_name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        <div class="admin-form__row">
                            <label class="admin-field">
                                Inicio
                                <input type="datetime-local" name="starts_at" value="{{ old('starts_at') }}" required />
                            </label>

                            <label class="admin-field">
                                Fin
                                <input type="datetime-local" name="ends_at" value="{{ old('ends_at') }}" />
                            </label>
                        </div>

                        <div class="admin-form__row">
                            <label class="admin-field">
                                Canal
                                <select name="channel" required>
                                    @foreach ($appointmentChannelOptions as $value => $label)
                                        <option value="{{ $value }}" @selected(old('channel', 'google_meet') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label class="admin-field">
                                Estado
                                <select name="status" required>
                                    @foreach ($appointmentStatusOptions as $value => $label)
                                        <option value="{{ $value }}" @selected(old('status', 'scheduled') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <label class="admin-field">
                            Enlace de reunion
                            <input type="text" name="meeting_link" value="{{ old('meeting_link') }}" maxlength="255" placeholder="https://..." />
                        </label>

                        <label class="admin-field">
                            Notas
                            <textarea name="notes" class="admin-input admin-textarea" rows="3">{{ old('notes') }}</textarea>
                        </label>

                        <label class="admin-field">
                            Nota de seguimiento
                            <textarea name="follow_up_note" class="admin-input admin-textarea" rows="2">{{ old('follow_up_note') }}</textarea>
                        </label>

                        @if ($errors->any())
                            <div class="admin-alert admin-alert--error">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="admin-form__actions">
                            <button type="submit" class="admin-btn admin-btn--primary">Guardar cita</button>
                        </div>
                    </form>
                </article>

                <article class="admin-panel crm-calendar-summary">
                    <div class="admin-panel__header">
                        <div>
                            <h2>Resumen del mes</h2>
                            <span class="admin-link">{{ $appointments->count() }} cita{{ $appointments->count() === 1 ? '' : 's' }} dentro de esta vista</span>
                        </div>
                    </div>

                    <div class="crm-calendar-metrics">
                        <div class="crm-calendar-metric">
                            <span>D&iacute;as con citas</span>
                            <strong>{{ $dailyTotals->filter(fn ($count) => $count > 0)->count() }}</strong>
                        </div>
                        <div class="crm-calendar-metric">
                            <span>Canales usados</span>
                            <strong>{{ $appointments->pluck('channel')->filter()->unique()->count() }}</strong>
                        </div>
                    </div>
                </article>

                <article class="admin-panel crm-calendar-list">
                    <div class="admin-panel__header">
                        <div>
                            <h2>Pr&oacute;ximas citas</h2>
                            <span class="admin-link">Las siguientes 8 citas programadas a partir de hoy.</span>
                        </div>
                    </div>

                    <div class="crm-calendar-agenda">
                        @forelse ($upcomingAppointments as $appointment)
                            <article class="crm-calendar-agenda__item">
                                <div class="crm-calendar-agenda__time">
                                    <strong>{{ $appointment->starts_at?->translatedFormat('d M') }}</strong>
                                    <span>{{ $appointment->starts_at?->format('H:i') }}</span>
                                </div>
                                <div class="crm-calendar-agenda__copy">
                                    <strong>{{ $appointment->lead?->full_name ?? 'Lead sin nombre' }}</strong>
                                    <p>{{ ucfirst($appointment->channel) }}{{ $appointment->scheduledBySource?->name ? ' - ' . $appointment->scheduledBySource->name : '' }}</p>
                                    @if ($appointment->meeting_link)
                                        <a href="{{ $appointment->meeting_link }}" target="_blank" rel="noopener noreferrer">Abrir enlace</a>
                                    @endif
                                </div>
                                <span class="crm-status crm-status--{{ \Illuminate\Support\Str::slug($appointment->status ?? 'scheduled', '_') }}">
                                    {{ $appointment->status ?? 'scheduled' }}
                                </span>
                            </article>
                        @empty
                            <p class="crm-side-card__empty">No hay citas futuras registradas.</p>
                        @endforelse
                    </div>
                </article>
            </div>
        </section>
    </main>
@endsection
