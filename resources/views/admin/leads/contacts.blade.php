@extends('layouts.app-admin')

@section('titulo')
    CRM Contactos
@endsection

@section('content')
    <header class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">CRM</p>
            <h1 class="admin-topbar__title">Contactos</h1>
        </div>
        <div class="admin-topbar__actions">
            <span class="admin-kpi-pill">{{ number_format($leads->count()) }} contactos</span>
        </div>
    </header>

    <main class="admin-content">
        @if (! $crmReady)
            <div class="admin-alert admin-alert--error">
                La secci&oacute;n de contactos a&uacute;n no est&aacute; disponible porque faltan las tablas del CRM. Ejecuta las migraciones para habilitarla.
            </div>
        @endif

        <section class="admin-panel">
            <div class="admin-panel__header">
                <h2>Base de contactos</h2>
                <span class="admin-link">Vista tabular clasica para administracion y seguimiento</span>
            </div>

            <div class="admin-panel__body">
                <div class="table-wrap table-wrap--usuarios">
                    <table id="crm-contacts-table" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>WhatsApp</th>
                                <th>Correo</th>
                                <th>Empresa / Industria</th>
                                <th>Estado</th>
                                <th>Score</th>
                                <th>Ultimo contacto</th>
                                <th>Responsable</th>
                                <th>Fuente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($leads as $lead)
                                @php
                                    $companyLabel = $lead->company_name ?: ($lead->industry?->nombre ?? 'Sin empresa');
                                    $statusLabel = $lead->status?->name ?? 'Sin estado';
                                    $leadScore = max(0, min((int) ($lead->score ?? 0), 100));
                                    $lastContact = $lead->last_contact_at ?? $lead->updated_at;
                                @endphp
                                <tr>
                                    <td>{{ $lead->full_name }}</td>
                                    <td>{{ $lead->whatsapp_number ?: 'Sin WhatsApp' }}</td>
                                    <td>{{ $lead->email ?: 'Sin correo' }}</td>
                                    <td>{{ $companyLabel }}</td>
                                    <td>{{ $statusLabel }}</td>
                                    <td>{{ $leadScore }}</td>
                                    <td>{{ $lastContact ? $lastContact->format('d/m/Y H:i') : 'Sin contacto' }}</td>
                                    <td>{{ $lead->assignedUser?->name ?? 'Sin responsable' }}</td>
                                    <td>{{ $lead->source?->name ?? 'Sin fuente' }}</td>
                                    <td>
                                        <div class="crm-contacts-actions">
                                            @if ($lead->whatsapp_number)
                                                <a
                                                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->whatsapp_number) }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="btn-action"
                                                    title="Abrir WhatsApp"
                                                >
                                                    <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                                                </a>
                                            @endif

                                            @if ($lead->email)
                                                <a
                                                    href="mailto:{{ $lead->email }}"
                                                    class="btn-action"
                                                    title="Enviar correo"
                                                >
                                                    <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                                                </a>
                                            @endif

                                            <a
                                                href="{{ route('admin.crm') }}"
                                                class="btn-action"
                                                title="Ir al pipeline"
                                            >
                                                <i class="fa-solid fa-table-columns" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">Aun no hay contactos registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.DataTable && document.getElementById('crm-contacts-table')) {
                new window.DataTable('#crm-contacts-table', {
                    autoWidth: false,
                    scrollX: true,
                    scrollCollapse: true,
                    language: {
                        search: 'Buscar:',
                        lengthMenu: 'Mostrar _MENU_ registros',
                        info: 'Mostrando _START_ a _END_ de _TOTAL_ contactos',
                        infoEmpty: 'Mostrando 0 a 0 de 0 contactos',
                        zeroRecords: 'No se encontraron contactos',
                        paginate: {
                            first: 'Primero',
                            last: 'Ultimo',
                            next: 'Siguiente',
                            previous: 'Anterior',
                        },
                    },
                    pageLength: 10,
                    lengthChange: true,
                    order: [[6, 'desc']],
                    columnDefs: [
                        {
                            targets: 0,
                            width: '220px',
                        },
                        {
                            targets: 1,
                            width: '150px',
                        },
                        {
                            targets: 2,
                            width: '220px',
                        },
                        {
                            targets: 3,
                            width: '180px',
                        },
                        {
                            targets: 6,
                            width: '160px',
                        },
                        {
                            targets: 9,
                            orderable: false,
                            searchable: false,
                            width: '150px',
                        },
                    ],
                    dom: '<"usuarios-datatable__top"lf>rt<"usuarios-datatable__bottom"ip>',
                });
            }
        });
    </script>
@endpush
