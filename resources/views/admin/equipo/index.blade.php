@extends('layouts.app-admin')

@section('titulo', 'Equipo')

@section('content')
    <div class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">Nosotros</p>
            <h1 class="admin-topbar__title">Administrador de equipo</h1>
        </div>
    </div>

    <main class="admin-content">
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

        <section class="admin-panel">
            <div class="admin-panel__header">
                <h2>Nuevo integrante</h2>
            </div>

            <div class="admin-panel__body">
                <form action="{{ route('admin.equipo.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
                    @csrf
                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="name">Nombre</label>
                            <input class="admin-input" id="name" name="name" type="text" value="{{ old('name') }}" required />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="role">Cargo</label>
                            <input class="admin-input" id="role" name="role" type="text" value="{{ old('role') }}" required />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="image">Imagen</label>
                            <input class="admin-input" id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" required />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="display_mode">Tipo de tarjeta</label>
                            <select class="admin-input" id="display_mode" name="display_mode" required>
                                <option value="picture" @selected(old('display_mode') === 'picture')>Imagen normal</option>
                                <option value="art" @selected(old('display_mode') === 'art')>Marco artistico</option>
                            </select>
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="sort_order">Orden</label>
                            <input class="admin-input" id="sort_order" name="sort_order" type="number" min="1" value="{{ old('sort_order', $teamMembers->count() + 1) }}" required />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="is_active">Estado</label>
                            <select class="admin-input" id="is_active" name="is_active">
                                <option value="1" @selected(old('is_active', '1') === '1')>Activo</option>
                                <option value="0" @selected(old('is_active') === '0')>Oculto</option>
                            </select>
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="description">Descripcion</label>
                            <textarea class="admin-input admin-textarea" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="admin-form__actions">
                        <button type="submit" class="admin-btn admin-btn--primary">Agregar integrante</button>
                    </div>
                </form>
            </div>
        </section>

        <section class="admin-panel">
            <div class="admin-panel__header">
                <h2>Integrantes actuales</h2>
            </div>

            <div class="admin-panel__body admin-team-grid">
                @forelse ($teamMembers as $member)
                    @php
                        $memberImage = \Illuminate\Support\Str::startsWith($member['image'], ['http://', 'https://']) ? $member['image'] : asset($member['image']);
                    @endphp
                    <article class="admin-card admin-team-card">
                        <div class="admin-card__header">
                            <div>
                                <h3 class="admin-card__title">{{ $member['name'] }}</h3>
                                <p class="admin-card__subtitle">{{ $member['role'] }}</p>
                            </div>
                            <span class="estado {{ $member['is_active'] ? 'estado-activo' : 'estado-inactivo' }}">
                                {{ $member['is_active'] ? 'Activo' : 'Oculto' }}
                            </span>
                        </div>

                        <div class="admin-team-card__preview">
                            <img src="{{ $memberImage }}" alt="{{ $member['name'] }}" class="admin-avatar" />
                            <div class="admin-team-card__meta">
                                <p><strong>Orden:</strong> {{ $member['sort_order'] }}</p>
                                <p><strong>Modo:</strong> {{ $member['display_mode'] === 'art' ? 'Marco artistico' : 'Imagen normal' }}</p>
                                <p><strong>Imagen:</strong> {{ $member['image'] }}</p>
                                @if (!empty($member['image_webp']))
                                    <p><strong>Webp:</strong> {{ $member['image_webp'] }}</p>
                                @endif
                            </div>
                        </div>

                        <form action="{{ route('admin.equipo.update', $member['id']) }}" method="POST" enctype="multipart/form-data" class="admin-form">
                            @csrf
                            @method('PUT')

                            <div class="admin-form__row">
                                <div class="admin-form__group">
                                    <label class="admin-label">Nombre</label>
                                    <input class="admin-input" name="name" type="text" value="{{ $member['name'] }}" required />
                                </div>
                                <div class="admin-form__group">
                                    <label class="admin-label">Cargo</label>
                                    <input class="admin-input" name="role" type="text" value="{{ $member['role'] }}" required />
                                </div>
                            </div>

                            <div class="admin-form__row">
                                <div class="admin-form__group">
                                    <label class="admin-label">Reemplazar imagen</label>
                                    <input class="admin-input" name="image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" />
                                </div>
                            </div>

                            <div class="admin-form__row">
                                <div class="admin-form__group">
                                    <label class="admin-label">Tipo de tarjeta</label>
                                    <select class="admin-input" name="display_mode" required>
                                        <option value="picture" @selected($member['display_mode'] === 'picture')>Imagen normal</option>
                                        <option value="art" @selected($member['display_mode'] === 'art')>Marco artistico</option>
                                    </select>
                                </div>
                                <div class="admin-form__group">
                                    <label class="admin-label">Orden</label>
                                    <input class="admin-input" name="sort_order" type="number" min="1" value="{{ $member['sort_order'] }}" required />
                                </div>
                                <div class="admin-form__group">
                                    <label class="admin-label">Estado</label>
                                    <select class="admin-input" name="is_active">
                                        <option value="1" @selected($member['is_active'])>Activo</option>
                                        <option value="0" @selected(!$member['is_active'])>Oculto</option>
                                    </select>
                                </div>
                            </div>

                            <div class="admin-form__row">
                                <div class="admin-form__group">
                                    <label class="admin-label">Descripcion</label>
                                    <textarea class="admin-input admin-textarea" name="description" rows="4" required>{{ $member['description'] }}</textarea>
                                </div>
                            </div>

                            <div class="admin-form__actions admin-form__actions--split">
                                <button type="submit" class="admin-btn admin-btn--primary">Guardar cambios</button>
                            </div>
                        </form>

                        <form action="{{ route('admin.equipo.destroy', $member['id']) }}" method="POST" class="admin-team-card__delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-danger js-confirm-delete-team"
                                data-member-name="{{ $member['name'] }}">
                                <i class="fa-solid fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </article>
                @empty
                    <p>No hay integrantes registrados.</p>
                @endforelse
            </div>
        </section>
    </main>
@endsection

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.js-confirm-delete-team').forEach(function (button) {
                button.addEventListener('click', function (event) {
                    event.preventDefault();

                    const form = button.closest('form');
                    if (!form) {
                        return;
                    }

                    if (!window.Swal) {
                        form.submit();
                        return;
                    }

                    window.Swal.fire({
                        icon: 'warning',
                        title: 'Eliminar integrante',
                        text: 'Se eliminara a ' + (button.dataset.memberName || 'este integrante') + ' de la seccion de equipo.',
                        showCancelButton: true,
                        confirmButtonText: 'Si, eliminar',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true
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
