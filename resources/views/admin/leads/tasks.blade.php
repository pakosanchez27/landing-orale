@extends('layouts.app-admin')

@section('titulo')
    CRM Tareas
@endsection

@section('content')
    <header class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">CRM</p>
            <h1 class="admin-topbar__title">Tareas comerciales</h1>
        </div>
        <div class="admin-topbar__actions">
            <span class="admin-kpi-pill">{{ number_format($summary['total']) }} tareas</span>
            @if ($canCreateTasks)
                <button type="button" class="admin-btn admin-btn--primary" id="task-create-open">
                    <i class="fa-solid fa-plus" aria-hidden="true"></i>
                    Nueva tarea
                </button>
            @endif
        </div>
    </header>

    <main class="admin-content">
        @if (session('status'))
            <div class="admin-alert admin-alert--success">
                {{ session('status') }}
            </div>
        @endif

        @if (! $tasksReady)
            <div class="admin-alert admin-alert--error">
                La secci&oacute;n de tareas a&uacute;n no est&aacute; disponible porque faltan tablas del CRM.
            </div>
        @endif

        <section class="crm-tasks-page">
            <div class="crm-task-summary-wrap">
                <article class="admin-panel">
                    <div class="admin-panel__header">
                        <div>
                            <h2>Resumen</h2>
                            <span class="admin-link">Balance actual del trabajo comercial.</span>
                        </div>
                    </div>

                    <div class="crm-task-metrics">
                        <article class="crm-task-metric">
                            <span>Pendientes</span>
                            <strong>{{ $summary['pending'] }}</strong>
                        </article>
                        <article class="crm-task-metric">
                            <span>En progreso</span>
                            <strong>{{ $summary['in_progress'] }}</strong>
                        </article>
                        <article class="crm-task-metric">
                            <span>Completadas</span>
                            <strong>{{ $summary['completed'] }}</strong>
                        </article>
                        <article class="crm-task-metric">
                            <span>Vencidas</span>
                            <strong>{{ $summary['overdue'] }}</strong>
                        </article>
                    </div>
                </article>
            </div>

            <section class="admin-panel">
                <div class="admin-panel__header">
                    <div>
                        <h2>Tablero de tareas</h2>
                        <span class="admin-link">Organiza el seguimiento del equipo por estado.</span>
                    </div>
                </div>

                <div class="crm-task-board">
                    @php
                        $taskColumns = [
                            ['title' => 'Pendientes', 'items' => $openTasks, 'status' => 'pending'],
                            ['title' => 'En progreso', 'items' => $inProgressTasks, 'status' => 'in_progress'],
                            ['title' => 'Completadas', 'items' => $completedTasks, 'status' => 'completed'],
                        ];
                    @endphp

                    @foreach ($taskColumns as $column)
                        <section class="crm-task-column">
                            <header class="crm-task-column__header">
                                <div>
                                    <h3>{{ $column['title'] }}</h3>
                                    <span>{{ $column['items']->count() }} tarea{{ $column['items']->count() === 1 ? '' : 's' }}</span>
                                </div>
                            </header>

                            <div class="crm-task-column__body">
                                @forelse ($column['items'] as $task)
                                    @php
                                        $canUpdateTaskStatus = auth()->check()
                                            && (
                                                in_array((int) auth()->user()->role_id, [0, 1], true)
                                                || (int) auth()->id() === (int) $task->assigned_to
                                            );
                                    @endphp
                                    <article class="crm-task-card {{ $task->due_at && $task->status !== 'completed' && $task->due_at->isPast() ? 'is-overdue' : '' }}">
                                        <div class="crm-task-card__head">
                                            <span class="crm-task-chip crm-task-chip--{{ $task->priority }}">{{ $priorityOptions[$task->priority] ?? ucfirst($task->priority) }}</span>
                                            <span class="crm-task-chip crm-task-chip--type">{{ $typeOptions[$task->type] ?? ucfirst($task->type) }}</span>
                                        </div>

                                        <h4>{{ $task->title }}</h4>
                                        <p>{{ $task->description ?: 'Sin descripcion adicional.' }}</p>

                                        <div class="crm-task-card__meta">
                                            <strong>{{ $task->lead?->full_name ?? 'Lead sin nombre' }}</strong>
                                            <span>{{ $task->assignedUser?->name ? 'Responsable: ' . $task->assignedUser->name : 'Sin responsable asignado' }}</span>
                                            <span>{{ $task->due_at ? 'Vence: ' . $task->due_at->format('d/m/Y H:i') : 'Sin fecha limite' }}</span>
                                        </div>

                                        @if ($canUpdateTaskStatus)
                                            <div class="crm-task-card__actions">
                                                @if ($task->status !== 'in_progress')
                                                    <form action="{{ route('admin.crm.tasks.status', $task) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="in_progress" />
                                                        <button type="submit" class="admin-btn-secondary">Mover a progreso</button>
                                                    </form>
                                                @endif

                                                @if ($task->status !== 'completed')
                                                    <form action="{{ route('admin.crm.tasks.status', $task) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="completed" />
                                                        <button type="submit" class="admin-btn admin-btn--primary">Completar</button>
                                                    </form>
                                                @endif

                                                @if ($task->status === 'completed')
                                                    <form action="{{ route('admin.crm.tasks.status', $task) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="pending" />
                                                        <button type="submit" class="admin-btn-secondary">Reabrir</button>
                                                    </form>
                                                @endif
                                            </div>
                                        @else
                                            <div class="crm-task-card__locked">
                                                Solo el administrador o el responsable asignado puede actualizar esta tarea.
                                            </div>
                                        @endif
                                    </article>
                                @empty
                                    <div class="crm-empty">
                                        <p>No hay tareas en esta columna.</p>
                                    </div>
                                @endforelse
                            </div>
                        </section>
                    @endforeach
                </div>
            </section>
        </section>
    </main>

    @if ($canCreateTasks)
        <div class="admin-modal" id="task-create-modal" @if (! $errors->any()) hidden @endif>
            <div class="admin-modal__dialog crm-modal crm-modal--edit">
                <div class="admin-modal__header">
                    <h3>Nueva tarea</h3>
                    <button type="button" class="admin-modal__close" id="task-create-close" aria-label="Cerrar modal">
                        <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                    </button>
                </div>

                <form action="{{ route('admin.crm.tasks.store') }}" method="POST" class="admin-modal__body">
                    @csrf

                    <div class="admin-form__row">
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

                        <label class="admin-field">
                            Asignar a
                            <select name="assigned_to">
                                <option value="">Sin responsable</option>
                                @foreach ($userOptions as $user)
                                    <option value="{{ $user->id }}" @selected((string) old('assigned_to') === (string) $user->id)>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="admin-form__row">
                        <label class="admin-field">
                            Tipo
                            <select name="type" required>
                                @foreach ($typeOptions as $value => $label)
                                    <option value="{{ $value }}" @selected(old('type', 'follow_up') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="admin-field">
                            Prioridad
                            <select name="priority" required>
                                @foreach ($priorityOptions as $value => $label)
                                    <option value="{{ $value }}" @selected(old('priority', 'medium') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="admin-form__row">
                        <label class="admin-field">
                            Estado inicial
                            <select name="status" required>
                                @foreach ($statusOptions as $value => $label)
                                    <option value="{{ $value }}" @selected(old('status', 'pending') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="admin-field">
                            Fecha limite
                            <input type="datetime-local" name="due_at" value="{{ old('due_at') }}" />
                        </label>
                    </div>

                    <label class="admin-field">
                        Titulo
                        <input type="text" name="title" value="{{ old('title') }}" maxlength="255" required />
                    </label>

                    <label class="admin-field">
                        Descripcion
                        <textarea name="description" class="admin-input admin-textarea" rows="4">{{ old('description') }}</textarea>
                    </label>

                    @if ($errors->any())
                        <div class="admin-alert admin-alert--error">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="admin-modal__actions">
                        <button type="button" class="admin-btn-secondary" id="task-create-cancel">Cancelar</button>
                        <button type="submit" class="admin-btn admin-btn--primary">Guardar tarea</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openButton = document.getElementById('task-create-open');
            const modal = document.getElementById('task-create-modal');
            const closeButton = document.getElementById('task-create-close');
            const cancelButton = document.getElementById('task-create-cancel');

            if (!modal) {
                return;
            }

            const setOpen = (open) => {
                modal.hidden = !open;
                document.body.classList.toggle('admin-lock', open);
            };

            openButton?.addEventListener('click', () => setOpen(true));
            closeButton?.addEventListener('click', () => setOpen(false));
            cancelButton?.addEventListener('click', () => setOpen(false));

            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    setOpen(false);
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && !modal.hidden) {
                    setOpen(false);
                }
            });

            if (!modal.hidden) {
                document.body.classList.add('admin-lock');
            }
        });
    </script>
@endpush
