@extends('layouts.app-admin')

@section('titulo', 'Crear usuario')

@section('content')
    <section class="admin-section">
        <div class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Crear usuario</h2>
                    <p class="admin-card__subtitle">Completa los datos del nuevo usuario</p>
                </div>
            </div>

            <div class="admin-alert admin-alert--success">
                Al crear el usuario se enviara un correo de bienvenida con un enlace para definir su contrasena.
            </div>

            <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data" class="admin-form" novalidate>
                @csrf

                <div class="admin-form__row">
                    <div class="admin-form__group admin-form__group--avatar">
                        @php
                            $defaultAvatar = asset('img/perfil.jpg');
                        @endphp
                        <img src="{{ $defaultAvatar }}" alt="Foto de perfil" class="admin-avatar" id="avatar-preview" />
                        <input type="file" name="imagen" accept="image/*" class="admin-input" id="avatar-input" />
                        @error('imagen')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label">Nombre</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="admin-input" required />
                        @error('name')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label">Correo</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="admin-input" required />
                        @error('email')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label">Cargo</label>
                        <input type="text" name="cargo" value="{{ old('cargo') }}" class="admin-input" />
                        @error('cargo')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label">Rol</label>
                        <select name="role_id" class="admin-input" required>
                            <option value="">Selecciona un rol</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="admin-form__actions">
                    <button type="submit" class="admin-btn admin-btn--primary">Crear usuario</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script>
        const avatarInput = document.getElementById('avatar-input');
        const avatarPreview = document.getElementById('avatar-preview');

        if (avatarInput && avatarPreview) {
            avatarInput.addEventListener('change', (event) => {
                const [file] = event.target.files;
                if (!file) return;
                const reader = new FileReader();
                reader.onload = (e) => {
                    avatarPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
@endpush
