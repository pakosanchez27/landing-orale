@extends('layouts.app-admin')

@section('content')
    <header class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">Cat&aacute;logos</p>
            <h1 class="admin-topbar__title">Industrias</h1>
        </div>
    </header>

    <main class="admin-content">
        <section class="admin-panel">
            <div class="admin-panel__header">
                <h2>Lista de industrias</h2>
                <a class="btn-primario" type="button" id="nueva-industria-btn" onclick="createIndustria()">Nueva
                    industria</a>
            </div>
            <div class="admin-panel__body">
                <div class="table-wrap">
                    <table id="industrias-table" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Color</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($industrias as $industria)
                                <tr>
                                    <td>{{ $industria['id'] }}</td>
                                    <td>{{ $industria['nombre'] }}</td>
                                    <td><span class="color-chip" style="background:{{ $industria['color'] }};"></span></td>
                                    @if ($industria['estado'] == 1)
                                        <td><span class="estado estado-activo">Activo</span></td>
                                    @else
                                    <td><span class="estado estado-inactivo">inactivo</span></td>
                                    @endif
                                    <td>
                                        <button class="btn-action" type="button" onclick="editIndustria({{$industria['id']}})">Editar</button>
                                        @if ($industria['estado'] == 1)
                                            <button class="btn-action btn-danger" type="button"
                                                onclick="toggleIndustriaEstado({{ $industria['id'] }}, 0)">Eliminar</button>
                                        @else
                                            <button class="btn-action btn-blue" type="button"
                                                onclick="toggleIndustriaEstado({{ $industria['id'] }}, 1)">Activar</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                    
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <div class="admin-modal" id="industria-modal" hidden>
        <div class="admin-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="industria-modal-title">
            <div class="admin-modal__header">
                <h3 id="industria-modal-title">Nueva industria</h3>
                <button class="admin-modal__close" type="button" id="industria-modal-close" aria-label="Cerrar modal">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <form class="admin-modal__body">
                <label class="admin-field">
                    <span>Nombre</span>
                    <input type="text" id="nombre" placeholder="Ej. Hospitalidad" required />
                    <small class="admin-error" id="error-nombre"></small>
                </label>
                <label class="admin-field">
                    <span>Color</span>
                    <input type="color" id="color" value="#5e1ed3" />
                    <small class="admin-error" id="error-color"></small>
                </label>
                <label class="admin-field">
                    <span>Estado</span>
                    <select id="estado">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                    <small class="admin-error" id="error-estado"></small>
                </label>
                <div class="admin-modal__actions">
                    <button type="button" class="admin-btn-secondary" id="industria-modal-cancel">Cancelar</button>
                    <button type="button" class="btn-primario" id="industria-save-btn"
                        data-url="{{ route('admin.catalogos.industrias.store') }}"
                        onclick="saveIndustria()">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="admin-modal" id="industria-modal-edit" hidden>
        <div class="admin-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="industria-modal-edit-title">
            <div class="admin-modal__header">
                <h3 id="industria-modal-edit-title">Editar industria</h3>
                <button class="admin-modal__close" type="button" id="industria-modal-edit-close" aria-label="Cerrar modal">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <form class="admin-modal__body">
                <input type="hidden" id="industria-edit-id" />
                <label class="admin-field">
                    <span>Nombre</span>
                    <input type="text" id="nombre-edit" placeholder="Ej. Hospitalidad" required />
                    <small class="admin-error" id="error-nombre-edit"></small>
                </label>
                <label class="admin-field">
                    <span>Color</span>
                    <input type="color" id="color-edit" value="#5e1ed3" />
                    <small class="admin-error" id="error-color-edit"></small>
                </label>
                <label class="admin-field">
                    <span>Estado</span>
                    <select id="estado-edit">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                    <small class="admin-error" id="error-estado-edit"></small>
                </label>
                <div class="admin-modal__actions">
                    <button type="button" class="admin-btn-secondary" id="industria-modal-edit-cancel">Cancelar</button>
                    <button type="button" class="btn-primario" id="industria-update-btn"
                        data-url="{{ route('admin.catalogos.industrias.update') }}"
                        onclick="updateIndustria()">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('page-scripts')
    @vite(['resources/js/admin/catalogos.js'])
@endpush
