@extends('layouts.app-admin')

@section('titulo')
    CRM
@endsection

@section('content')
    <header class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">CRM</p>
            <h1 class="admin-topbar__title">Pipeline de leads</h1>
        </div>
        <div class="admin-topbar__actions">
            <span class="admin-kpi-pill">{{ number_format($totalLeads) }} leads</span>
        </div>
    </header>

    <main class="admin-content">
        @if (! $crmReady)
            <div class="admin-alert admin-alert--error">
                El tablero CRM a&uacute;n no est&aacute; disponible porque faltan las tablas del sistema. Ejecuta las migraciones para habilitarlo.
            </div>
        @endif

        <section class="admin-panel">
            <div class="admin-panel__header">
                <h2>Vista tipo tablero</h2>
                <span class="admin-link">Etapas comerciales organizadas como Kanban</span>
            </div>

            <div class="crm-board" style="--crm-column-count: {{ max($boardColumns->count(), 1) }};">
                @forelse ($boardColumns as $column)
                    @php
                        $status = $column['status'];
                        $statusColor = $status->color ?: '#5e1ed3';
                    @endphp

                    <section class="crm-column">
                        <header class="crm-column__header" style="--crm-column-color: {{ $statusColor }}">
                            <div>
                                <p class="crm-column__title">{{ $status->name }}</p>
                                <span class="crm-column__count">{{ $column['count'] }} lead{{ $column['count'] === 1 ? '' : 's' }}</span>
                            </div>
                            <span class="crm-column__bar" aria-hidden="true"></span>
                        </header>

                        <div class="crm-column__body" data-status-id="{{ $status->id }}">
                            @forelse ($column['leads'] as $lead)
                                @php
                                    $whatsappLink = $lead->whatsapp_number
                                        ? 'https://wa.me/' . preg_replace('/\D+/', '', $lead->whatsapp_number)
                                        : null;

                                    $leadHistory = $lead->activities
                                        ->map(function ($activity) {
                                            return [
                                                'date' => $activity->created_at?->format('d/m/Y H:i'),
                                                'user' => $activity->user?->name ?? 'Sistema',
                                                'type' => $activity->type,
                                                'title' => $activity->title,
                                                'from' => $activity->meta['previous_status_name'] ?? '-',
                                                'to' => $activity->meta['new_status_name'] ?? '-',
                                                'note' => $activity->meta['follow_up_note'] ?? $activity->description ?? '-',
                                            ];
                                        })
                                        ->values();
                                @endphp
                                <article class="crm-card" draggable="true" data-lead-id="{{ $lead->id }}" data-lead-history='@json($leadHistory)'>
                                    <div class="crm-card__body">
                                        <h3 class="crm-card__title">{{ $lead->full_name }}</h3>
                                    </div>

                                    <div class="crm-card__footer">
                                        <div class="crm-card__contact">
                                            <span>{{ $lead->whatsapp_number ?: 'Sin WhatsApp' }}</span>
                                            <small>{{ $lead->email ?: 'Sin correo' }}</small>
                                        </div>
                                    </div>

                                    <div class="crm-card__actions">
                                        @if ($whatsappLink)
                                            <a
                                                class="btn-action crm-card__action-btn"
                                                href="{{ $whatsappLink }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                aria-label="Enviar WhatsApp a {{ $lead->full_name }}"
                                                title="Enviar WhatsApp"
                                            >
                                                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                                            </a>
                                        @endif

                                        @if ($lead->email)
                                            <a
                                                class="btn-action crm-card__action-btn"
                                                href="mailto:{{ $lead->email }}"
                                                aria-label="Enviar correo a {{ $lead->full_name }}"
                                                title="Enviar correo"
                                            >
                                                <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                                            </a>
                                        @endif

                                        <div class="crm-card__menu" data-card-menu>
                                            <button
                                                type="button"
                                                class="admin-btn-secondary crm-card__more"
                                                data-card-menu-toggle
                                                aria-expanded="false"
                                                aria-label="Abrir menu de acciones"
                                            >
                                                <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                                            </button>
                                            <div class="crm-card__dropdown" data-card-menu-panel hidden>
                                                <button
                                                    type="button"
                                                    class="crm-card__dropdown-btn"
                                                    data-lead-modal-open
                                                    data-lead-name="{{ $lead->full_name }}"
                                                    data-lead-whatsapp="{{ $lead->whatsapp_number ?: 'Sin WhatsApp' }}"
                                                    data-lead-email="{{ $lead->email ?: 'Sin correo' }}"
                                                    data-lead-industry="{{ $lead->industry?->nombre ?? 'Sin industria' }}"
                                                    data-lead-package="{{ $lead->interest_package ? ucfirst($lead->interest_package) : 'Sin paquete' }}"
                                                    data-lead-source="{{ $lead->source?->name ?? 'Sin fuente' }}"
                                                    data-lead-status="{{ $status->name }}"
                                                    data-lead-summary="{{ $lead->needs_summary ?: 'Sin mensaje registrado.' }}"
                                                    data-lead-assigned="{{ $lead->assignedUser?->name ?? 'Sin responsable asignado' }}"
                                                    data-lead-can-assign="{{ $canAssignLeads ? '1' : '0' }}"
                                                    data-lead-followup="{{ $lead->next_follow_up_at ? $lead->next_follow_up_at->format('d/m/Y H:i') : 'Sin seguimiento programado' }}"
                                                    data-lead-updated="{{ $lead->updated_at ? $lead->updated_at->format('d/m/Y H:i') : 'Sin fecha' }}"
                                                >
                                                    Ver
                                                </button>
                                                <button
                                                    type="button"
                                                    class="crm-card__dropdown-btn"
                                                    data-lead-edit-open
                                                    data-lead-id="{{ $lead->id }}"
                                                    data-lead-name="{{ $lead->full_name }}"
                                                    data-lead-whatsapp="{{ $lead->whatsapp_number }}"
                                                    data-lead-email="{{ $lead->email }}"
                                                    data-lead-industry-id="{{ $lead->industry_id }}"
                                                    data-lead-status-id="{{ $lead->status_id }}"
                                                    data-lead-package="{{ $lead->interest_package }}"
                                                    data-lead-budget="{{ $lead->budget_range }}"
                                                    data-lead-summary="{{ $lead->needs_summary }}"
                                                    data-lead-assigned-id="{{ $lead->assigned_to }}"
                                                    data-lead-can-assign="{{ $canAssignLeads ? '1' : '0' }}"
                                                    data-lead-followup-edit="{{ $lead->next_follow_up_at ? $lead->next_follow_up_at->format('Y-m-d\\TH:i') : '' }}"
                                                    data-lead-lost-reason="{{ $lead->lost_reason }}"
                                                >
                                                    Editar
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($lead->assignedUser)
                                        @php
                                            $assignedAvatar = $lead->assignedUser->imagen ? asset($lead->assignedUser->imagen) : asset('img/perfil.jpg');
                                        @endphp
                                        <div class="crm-card__assignee">
                                            <img src="{{ $assignedAvatar }}" alt="{{ $lead->assignedUser->name }}" class="crm-card__assignee-avatar" />
                                            <div class="crm-card__assignee-copy">
                                                <small>Responsable</small>
                                                <strong>{{ $lead->assignedUser->name }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </article>
                            @empty
                                <div class="crm-empty" data-empty-state>
                                    <p>Sin leads en esta etapa.</p>
                                </div>
                            @endforelse
                        </div>
                    </section>
                @empty
                    <div class="crm-empty crm-empty--board">
                        <p>No hay etapas disponibles todav&iacute;a para mostrar el tablero.</p>
                    </div>
                @endforelse
            </div>
        </section>
    </main>

    <div class="admin-modal" id="lead-detail-modal" hidden>
        <div class="admin-modal__dialog crm-modal crm-modal--detail">
            <div class="admin-modal__header">
                <h3 id="lead-detail-title">Detalle del lead</h3>
                <button type="button" class="admin-modal__close" id="lead-detail-close" aria-label="Cerrar detalle">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <div class="admin-modal__body crm-modal__body">
                <div class="crm-modal__grid">
                    <div class="crm-modal__item">
                        <span>WhatsApp</span>
                        <strong id="lead-detail-whatsapp">-</strong>
                    </div>
                    <div class="crm-modal__item">
                        <span>Correo</span>
                        <strong id="lead-detail-email">-</strong>
                    </div>
                    <div class="crm-modal__item">
                        <span>Industria</span>
                        <strong id="lead-detail-industry">-</strong>
                    </div>
                    <div class="crm-modal__item">
                        <span>Paquete</span>
                        <strong id="lead-detail-package">-</strong>
                    </div>
                    <div class="crm-modal__item">
                        <span>Fuente</span>
                        <strong id="lead-detail-source">-</strong>
                    </div>
                    <div class="crm-modal__item">
                        <span>Estado</span>
                        <strong id="lead-detail-status">-</strong>
                    </div>
                    <div class="crm-modal__item">
                        <span>Responsable</span>
                        <strong id="lead-detail-assigned">-</strong>
                    </div>
                    <div class="crm-modal__item">
                        <span>Seguimiento</span>
                        <strong id="lead-detail-followup">-</strong>
                    </div>
                </div>

                <div class="crm-modal__message">
                    <span>Mensaje</span>
                    <p id="lead-detail-summary">-</p>
                </div>

                <div class="crm-modal__meta">
                    <span>Ultima actualizacion</span>
                    <strong id="lead-detail-updated">-</strong>
                </div>

                <div class="crm-modal__history">
                    <div class="crm-modal__history-head">
                        <span>Historial de seguimiento</span>
                    </div>
                    <div class="crm-history-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Movimiento</th>
                                    <th>Nota</th>
                                </tr>
                            </thead>
                            <tbody id="lead-detail-history-body">
                                <tr>
                                    <td colspan="4">Sin historial registrado.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-modal" id="lead-edit-modal" hidden>
        <div class="admin-modal__dialog crm-modal crm-modal--edit">
            <div class="admin-modal__header">
                <h3>Editar lead</h3>
                <button type="button" class="admin-modal__close" id="lead-edit-close" aria-label="Cerrar edicion">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <div class="admin-modal__body">
                <form id="lead-edit-form" class="admin-form">
                    <input type="hidden" id="edit-lead-id" />

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="edit-full-name">Nombre</label>
                            <input class="admin-input" id="edit-full-name" type="text" />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="edit-email">Correo</label>
                            <input class="admin-input" id="edit-email" type="email" />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="edit-whatsapp">WhatsApp</label>
                            <input class="admin-input" id="edit-whatsapp" type="text" />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="edit-followup">Proximo seguimiento</label>
                            <input class="admin-input" id="edit-followup" type="datetime-local" />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="edit-industry">Industria</label>
                            <select class="admin-input" id="edit-industry">
                                <option value="">Selecciona una industria</option>
                                @foreach ($industries as $industry)
                                    <option value="{{ $industry->id }}">{{ $industry->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="edit-assigned">Responsable</label>
                            @if ($canAssignLeads)
                                <select class="admin-input" id="edit-assigned">
                                    <option value="">Sin responsable</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input class="admin-input" id="edit-assigned-label" type="text" value="Solo administracion puede asignar responsables" disabled />
                                <input id="edit-assigned" type="hidden" />
                            @endif
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="edit-status">Estado</label>
                            <select class="admin-input" id="edit-status">
                                @foreach ($statuses as $statusOption)
                                    <option value="{{ $statusOption->id }}">{{ $statusOption->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="edit-package">Paquete</label>
                            <select class="admin-input" id="edit-package">
                                <option value="">Sin paquete</option>
                                <option value="profesional">Profesional</option>
                                <option value="basico">Basico</option>
                                <option value="personalizado">Personalizado</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="edit-budget">Rango de presupuesto</label>
                            <input class="admin-input" id="edit-budget" type="text" />
                        </div>
                    </div>

                    <div class="admin-form__group">
                        <label class="admin-label" for="edit-summary">Seguimiento / mensaje</label>
                        <textarea class="admin-input admin-textarea" id="edit-summary" rows="5"></textarea>
                    </div>

                    <div class="admin-form__group">
                        <label class="admin-label" for="edit-follow-up-note">Nota de seguimiento al cambiar estado</label>
                        <textarea class="admin-input admin-textarea" id="edit-follow-up-note" rows="3" placeholder="Escribe una nota si vas a cambiar la etapa del lead."></textarea>
                    </div>

                    <div class="admin-form__group">
                        <label class="admin-label" for="edit-lost-reason">Motivo de perdida</label>
                        <input class="admin-input" id="edit-lost-reason" type="text" />
                    </div>

                    <div class="admin-form__actions">
                        <button type="button" class="admin-btn-secondary" id="lead-edit-cancel">Cancelar</button>
                        <button type="submit" class="admin-btn admin-btn--primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script>
        (() => {
            const board = document.querySelector('.crm-board');
            const detailModal = document.getElementById('lead-detail-modal');
            const detailClose = document.getElementById('lead-detail-close');
            const editModal = document.getElementById('lead-edit-modal');
            const editClose = document.getElementById('lead-edit-close');
            const editCancel = document.getElementById('lead-edit-cancel');
            const editForm = document.getElementById('lead-edit-form');

            if (!board) {
                return;
            }

            const statusUrlTemplate = @json(route('admin.crm.leads.status', ['lead' => '__LEAD__']));
            const updateUrlTemplate = @json(route('admin.crm.leads.update', ['lead' => '__LEAD__']));
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            let dragState = null;
            const detailMap = {
                title: document.getElementById('lead-detail-title'),
                whatsapp: document.getElementById('lead-detail-whatsapp'),
                email: document.getElementById('lead-detail-email'),
                industry: document.getElementById('lead-detail-industry'),
                package: document.getElementById('lead-detail-package'),
                source: document.getElementById('lead-detail-source'),
                status: document.getElementById('lead-detail-status'),
                assigned: document.getElementById('lead-detail-assigned'),
                followup: document.getElementById('lead-detail-followup'),
                summary: document.getElementById('lead-detail-summary'),
                updated: document.getElementById('lead-detail-updated'),
                historyBody: document.getElementById('lead-detail-history-body'),
            };
            const editMap = {
                id: document.getElementById('edit-lead-id'),
                fullName: document.getElementById('edit-full-name'),
                email: document.getElementById('edit-email'),
                whatsapp: document.getElementById('edit-whatsapp'),
                industry: document.getElementById('edit-industry'),
                assigned: document.getElementById('edit-assigned'),
                status: document.getElementById('edit-status'),
                package: document.getElementById('edit-package'),
                budget: document.getElementById('edit-budget'),
                summary: document.getElementById('edit-summary'),
                followUpNote: document.getElementById('edit-follow-up-note'),
                followup: document.getElementById('edit-followup'),
                lostReason: document.getElementById('edit-lost-reason'),
            };

            const getBodyCount = (body) => body.querySelectorAll('.crm-card').length;

            const renderHistory = (card) => {
                if (!detailMap.historyBody) {
                    return;
                }

                let history = [];

                try {
                    history = JSON.parse(card?.dataset.leadHistory || '[]');
                } catch (error) {
                    history = [];
                }

                if (!history.length) {
                    detailMap.historyBody.innerHTML = `
                        <tr>
                            <td colspan="4">Sin historial registrado.</td>
                        </tr>
                    `;
                    return;
                }

                detailMap.historyBody.innerHTML = history.map((item) => `
                    <tr>
                        <td>${item.date ?? '-'}</td>
                        <td>${item.user ?? '-'}</td>
                        <td>${item.from && item.to && item.from !== '-' ? `${item.from} -> ${item.to}` : (item.title ?? '-')}</td>
                        <td>${item.note ?? '-'}</td>
                    </tr>
                `).join('');
            };

            const setModalOpen = (open) => {
                if (!detailModal) {
                    return;
                }

                detailModal.hidden = !open;
                document.body.classList.toggle('admin-lock', open);
            };

            const setEditModalOpen = (open) => {
                if (!editModal) {
                    return;
                }

                editModal.hidden = !open;
                document.body.classList.toggle('admin-lock', open);
            };

            const closeAllMenus = () => {
                board.querySelectorAll('[data-card-menu]').forEach((menu) => {
                    menu.classList.remove('is-open');
                    menu.querySelector('[data-card-menu-panel]')?.setAttribute('hidden', '');
                    menu.querySelector('[data-card-menu-toggle]')?.setAttribute('aria-expanded', 'false');
                });
            };

            const updateColumnCount = (body) => {
                const column = body.closest('.crm-column');
                const countNode = column?.querySelector('.crm-column__count');
                const count = getBodyCount(body);

                if (countNode) {
                    countNode.textContent = `${count} lead${count === 1 ? '' : 's'}`;
                }
            };

            const ensureEmptyState = (body) => {
                const currentEmpty = body.querySelector('[data-empty-state]');
                const cardCount = getBodyCount(body);

                if (cardCount === 0 && !currentEmpty) {
                    const empty = document.createElement('div');
                    empty.className = 'crm-empty';
                    empty.setAttribute('data-empty-state', '');
                    empty.innerHTML = '<p>Sin leads en esta etapa.</p>';
                    body.appendChild(empty);
                }

                if (cardCount > 0 && currentEmpty) {
                    currentEmpty.remove();
                }
            };

            const setDropState = (body, isActive) => {
                body.classList.toggle('is-drop-target', isActive);
            };

            const clearDropStates = () => {
                board.querySelectorAll('.crm-column__body').forEach((body) => setDropState(body, false));
            };

            const requestFollowUpNote = async () => {
                if (window.Swal) {
                    const result = await window.Swal.fire({
                        title: 'Agregar nota de seguimiento',
                        input: 'textarea',
                        inputLabel: 'Escribe la nota para este cambio de estatus',
                        inputPlaceholder: 'Ej. Se contacto al prospecto y acepto avanzar a la siguiente etapa...',
                        inputAttributes: {
                            'aria-label': 'Nota de seguimiento',
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Guardar cambio',
                        cancelButtonText: 'Cancelar',
                        inputValidator: (value) => {
                            if (!value || value.trim().length < 3) {
                                return 'Escribe una nota de seguimiento de al menos 3 caracteres.';
                            }
                        },
                    });

                    if (!result.isConfirmed) {
                        return null;
                    }

                    return result.value.trim();
                }

                const fallbackNote = window.prompt('Escribe una nota de seguimiento para este cambio de estatus:');

                if (!fallbackNote || fallbackNote.trim().length < 3) {
                    return null;
                }

                return fallbackNote.trim();
            };

            const submitStatusChange = async ({ card, leadId, targetStatusId, targetStatusName, originBody, targetBody = null }) => {
                const followUpNote = await requestFollowUpNote();

                if (!followUpNote) {
                    clearDropStates();
                    return { cancelled: true };
                }

                if (targetBody) {
                    targetBody.querySelector('[data-empty-state]')?.remove();
                    targetBody.appendChild(card);
                    ensureEmptyState(originBody);
                    updateColumnCount(originBody);
                    updateColumnCount(targetBody);
                }

                card.classList.add('is-saving');

                try {
                    const response = await fetch(statusUrlTemplate.replace('__LEAD__', leadId), {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({
                            status_id: Number(targetStatusId),
                            follow_up_note: followUpNote,
                        }),
                    });

                    if (!response.ok) {
                        throw new Error('No se pudo actualizar el estado del lead.');
                    }

                    const payload = await response.json();
                    card.dataset.statusId = String(targetStatusId);

                    if (window.Swal) {
                        await window.Swal.fire({
                            title: 'Estado actualizado',
                            text: `El lead ahora esta en "${payload.status.name ?? targetStatusName}".`,
                            icon: 'success',
                            confirmButtonText: 'Continuar',
                        });
                    }

                    window.location.reload();

                    return { ok: true, payload };
                } catch (error) {
                    if (targetBody && originBody) {
                        originBody.appendChild(card);
                        ensureEmptyState(targetBody);
                        ensureEmptyState(originBody);
                        updateColumnCount(originBody);
                        updateColumnCount(targetBody);
                    }

                    if (window.Swal) {
                        await window.Swal.fire({
                            title: 'No se pudo mover el lead',
                            text: error.message,
                            icon: 'error',
                            confirmButtonText: 'Entendido',
                        });
                    } else {
                        window.alert(error.message);
                    }

                    return { ok: false, error };
                } finally {
                    card.classList.remove('is-saving');
                    clearDropStates();
                }
            };

            const handleDropMove = async (targetBody) => {
                if (!dragState || !targetBody || targetBody === dragState.originBody) {
                    clearDropStates();
                    return;
                }

                const currentDrag = dragState;
                const targetStatusId = targetBody.dataset.statusId;

                if (!targetStatusId || targetStatusId === currentDrag.originStatusId) {
                    clearDropStates();
                    return;
                }

                await submitStatusChange({
                    card: currentDrag.card,
                    leadId: currentDrag.leadId,
                    targetStatusId,
                    targetStatusName: targetBody.closest('.crm-column')?.querySelector('.crm-column__title')?.textContent?.trim() || 'la nueva etapa',
                    originBody: currentDrag.originBody,
                    targetBody,
                });
            };

            board.querySelectorAll('[data-lead-modal-open]').forEach((button) => {
                button.addEventListener('click', () => {
                    closeAllMenus();
                    renderHistory(button.closest('.crm-card'));
                    detailMap.title.textContent = button.dataset.leadName || 'Detalle del lead';
                    detailMap.whatsapp.textContent = button.dataset.leadWhatsapp || '-';
                    detailMap.email.textContent = button.dataset.leadEmail || '-';
                    detailMap.industry.textContent = button.dataset.leadIndustry || '-';
                    detailMap.package.textContent = button.dataset.leadPackage || '-';
                    detailMap.source.textContent = button.dataset.leadSource || '-';
                    detailMap.status.textContent = button.dataset.leadStatus || '-';
                    detailMap.assigned.textContent = button.dataset.leadAssigned || '-';
                    detailMap.followup.textContent = button.dataset.leadFollowup || '-';
                    detailMap.summary.textContent = button.dataset.leadSummary || '-';
                    detailMap.updated.textContent = button.dataset.leadUpdated || '-';
                    setModalOpen(true);
                });
            });

            board.querySelectorAll('[data-card-menu-toggle]').forEach((button) => {
                button.addEventListener('click', (event) => {
                    event.stopPropagation();
                    const menu = button.closest('[data-card-menu]');
                    const panel = menu?.querySelector('[data-card-menu-panel]');
                    const willOpen = panel?.hasAttribute('hidden');

                    closeAllMenus();

                    if (menu && panel && willOpen) {
                        menu.classList.add('is-open');
                        panel.removeAttribute('hidden');
                        button.setAttribute('aria-expanded', 'true');
                    }
                });
            });

            board.querySelectorAll('[data-lead-edit-open]').forEach((button) => {
                button.addEventListener('click', () => {
                    closeAllMenus();
                    editMap.id.value = button.dataset.leadId || '';
                    editMap.fullName.value = button.dataset.leadName || '';
                    editMap.email.value = button.dataset.leadEmail || '';
                    editMap.whatsapp.value = button.dataset.leadWhatsapp || '';
                    editMap.industry.value = button.dataset.leadIndustryId || '';
                    if (editMap.assigned) {
                        editMap.assigned.value = button.dataset.leadCanAssign === '1' ? (button.dataset.leadAssignedId || '') : '';
                    }
                    editMap.status.value = button.dataset.leadStatusId || '';
                    editMap.package.value = button.dataset.leadPackage || '';
                    editMap.budget.value = button.dataset.leadBudget || '';
                    editMap.summary.value = button.dataset.leadSummary || '';
                    editMap.followUpNote.value = '';
                    editMap.followup.value = button.dataset.leadFollowupEdit || '';
                    editMap.lostReason.value = button.dataset.leadLostReason || '';
                    setEditModalOpen(true);
                });
            });

            detailClose?.addEventListener('click', () => setModalOpen(false));
            editClose?.addEventListener('click', () => setEditModalOpen(false));
            editCancel?.addEventListener('click', () => setEditModalOpen(false));

            detailModal?.addEventListener('click', (event) => {
                if (event.target === detailModal) {
                    setModalOpen(false);
                }
            });

            editModal?.addEventListener('click', (event) => {
                if (event.target === editModal) {
                    setEditModalOpen(false);
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && detailModal && !detailModal.hidden) {
                    setModalOpen(false);
                }

                 if (event.key === 'Escape' && editModal && !editModal.hidden) {
                    setEditModalOpen(false);
                }
            });

            document.addEventListener('click', (event) => {
                if (!event.target.closest('[data-card-menu]')) {
                    closeAllMenus();
                }
            });

            editForm?.addEventListener('submit', async (event) => {
                event.preventDefault();

                const leadId = editMap.id.value;

                if (!leadId) {
                    return;
                }

                const editButton = board.querySelector(`[data-lead-edit-open][data-lead-id="${leadId}"]`);
                const originalStatusId = editButton?.dataset.leadStatusId || '';
                const isStatusChange = originalStatusId && editMap.status.value && originalStatusId !== editMap.status.value;

                if (isStatusChange && (!editMap.followUpNote.value || editMap.followUpNote.value.trim().length < 3)) {
                    if (window.Swal) {
                        await window.Swal.fire({
                            title: 'Falta nota de seguimiento',
                            text: 'Si cambias el estado del lead, agrega una nota de seguimiento de al menos 3 caracteres.',
                            icon: 'warning',
                            confirmButtonText: 'Entendido',
                        });
                    } else {
                        window.alert('Si cambias el estado del lead, agrega una nota de seguimiento de al menos 3 caracteres.');
                    }

                    return;
                }

                try {
                    const response = await fetch(updateUrlTemplate.replace('__LEAD__', leadId), {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({
                            full_name: editMap.fullName.value,
                            email: editMap.email.value || null,
                            whatsapp_number: editMap.whatsapp.value || null,
                            industry_id: editMap.industry.value || null,
                            assigned_to: editMap.assigned.value || null,
                            status_id: editMap.status.value || null,
                            interest_package: editMap.package.value || null,
                            budget_range: editMap.budget.value || null,
                            needs_summary: editMap.summary.value || null,
                            follow_up_note: isStatusChange ? editMap.followUpNote.value.trim() : null,
                            next_follow_up_at: editMap.followup.value || null,
                            lost_reason: editMap.lostReason.value || null,
                        }),
                    });

                    if (!response.ok) {
                        throw new Error('No se pudieron guardar los cambios del lead.');
                    }

                    const payload = await response.json();
                    setEditModalOpen(false);

                    if (window.Swal) {
                        await window.Swal.fire({
                            title: 'Lead actualizado',
                            text: payload.message || 'Los cambios se guardaron correctamente.',
                            icon: 'success',
                            confirmButtonText: 'Continuar',
                        });
                    }

                    window.location.reload();
                } catch (error) {
                    if (window.Swal) {
                        await window.Swal.fire({
                            title: 'No se pudo actualizar',
                            text: error.message,
                            icon: 'error',
                            confirmButtonText: 'Entendido',
                        });
                    } else {
                        window.alert(error.message);
                    }
                }
            });

            board.querySelectorAll('.crm-card').forEach((card) => {
                card.addEventListener('dragstart', (event) => {
                    const originBody = card.closest('.crm-column__body');

                    dragState = {
                        card,
                        leadId: card.dataset.leadId,
                        originBody,
                        originStatusId: originBody?.dataset.statusId,
                    };

                    card.classList.add('is-dragging');
                    event.dataTransfer.effectAllowed = 'move';
                    event.dataTransfer.setData('text/plain', card.dataset.leadId || '');
                });

                card.addEventListener('dragend', () => {
                    card.classList.remove('is-dragging');
                    clearDropStates();
                    dragState = null;
                });
            });

            board.querySelectorAll('.crm-column__body').forEach((body) => {
                body.addEventListener('dragover', (event) => {
                    event.preventDefault();
                    if (dragState) {
                        setDropState(body, true);
                    }
                });

                body.addEventListener('dragleave', (event) => {
                    if (!body.contains(event.relatedTarget)) {
                        setDropState(body, false);
                    }
                });

                body.addEventListener('drop', async (event) => {
                    event.preventDefault();
                    await handleDropMove(body);
                });
            });
        })();
    </script>
@endpush
