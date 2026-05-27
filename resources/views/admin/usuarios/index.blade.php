@extends('layouts.app-admin')

@section('titulo')
    usuarios
@endsection

@section('content')
    <div class="admin-topbar">
        <a class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </a>
        <div>
            <p class="admin-topbar__eyebrow">Usuarios</p>
            <h1 class="admin-topbar__title">Administrador de usuarios</h1>
        </div>
        <div class="admin-topbar__actions">
            <a href="{{ route('usuarios.create') }}" class="btn-primario" type="button">Nuevo Usuario</a>
        </div>
    </div>

    <main class="admin-content">
        <section class="admin-panel">
         
            <div class="admin-panel__body">
                @if (session('status'))
                    <div class="admin-alert admin-alert--success">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="admin-alert admin-alert--error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="table-wrap table-wrap--usuarios">
                    <table id="usuarios-table" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Cargo</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->cargo ?: 'Sin cargo' }}</td>
                                    <td>{{ $user->role?->name ?: 'Sin rol' }}</td>
                                    <td>
                                        <form action="{{ route('usuarios.reset-password', $user) }}" method="POST" class="admin-inline-form">
                                            @csrf
                                            <button class="btn-action btn-blue js-confirm-action" type="submit" title="Restablecer contrasena"
                                                data-swal-title="Restablecer contrasena"
                                                data-swal-text="Se generara una contrasena temporal para este usuario."
                                                data-swal-confirm="Si, restablecer"
                                                data-swal-cancel="Cancelar">
                                                <i class="fa-solid fa-key" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('usuarios.edit', $user) }}" class="btn-action" title="Editar usuario">
                                            <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('usuarios.destroy', $user) }}" method="POST" class="admin-inline-form">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-action btn-danger js-confirm-action" type="submit" title="Eliminar usuario"
                                                data-swal-title="Eliminar usuario"
                                                data-swal-text="Esta accion eliminara al usuario."
                                                data-swal-confirm="Si, eliminar"
                                                data-swal-cancel="Cancelar">
                                                <i class="fa-solid fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No hay usuarios registrados.</td>
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
            if (window.DataTable && document.getElementById('usuarios-table')) {
                new window.DataTable('#usuarios-table', {
                    autoWidth: false,
                    pageLength: 10,
                    lengthChange: true,
                    order: [[0, 'asc']],
                    columnDefs: [
                        {
                            targets: -1,
                            orderable: false,
                            searchable: false,
                            width: '280px'
                        }
                    ],
                    dom: '<"usuarios-datatable__top"lf>rt<"usuarios-datatable__bottom"ip>',
                    language: {
                        search: 'Buscar:',
                        lengthMenu: 'Mostrar _MENU_ registros',
                        info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
                        processing: 'Procesando...',
                        loadingRecords: 'Cargando...',
                        zeroRecords: 'No se encontraron usuarios',
                        emptyTable: 'No hay usuarios disponibles en la tabla',
                        infoEmpty: 'Mostrando 0 a 0 de 0 registros',
                        infoFiltered: '(filtrado de _MAX_ registros totales)',
                        paginate: {
                            first: 'Primero',
                            last: 'Ultimo',
                            next: 'Siguiente',
                            previous: 'Anterior'
                        }
                    }
                });
            }

            document.querySelectorAll('.js-confirm-action').forEach(function (button) {
                button.addEventListener('click', function (event) {
                    event.preventDefault();

                    const form = button.closest('form');
                    if (!form || !window.Swal) {
                        if (form) {
                            form.submit();
                        }
                        return;
                    }

                    window.Swal.fire({
                        title: button.dataset.swalTitle || 'Confirmar accion',
                        text: button.dataset.swalText || 'Deseas continuar?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: button.dataset.swalConfirm || 'Aceptar',
                        cancelButtonText: button.dataset.swalCancel || 'Cancelar',
                        reverseButtons: true,
                        focusCancel: true
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
