@extends('layouts.app-admin')

@section('titulo', 'Mi perfil')

@section('content')
    @php
        $user = auth()->user();
        $avatar = $user && $user->imagen ? asset($user->imagen) : asset('img/perfil.jpg');
    @endphp

    <section class="admin-section">
        <div class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Mi perfil</h2>
                    <p class="admin-card__subtitle">Actualiza tus datos y seguridad</p>
                </div>
            </div>

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

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="admin-form">
                @csrf

                <div class="admin-form__row">
                    <div class="admin-form__group admin-form__group--avatar">
                        <img src="{{ $avatar }}" alt="Foto de perfil" class="admin-avatar" />
                        <input type="file" name="imagen" accept="image/*" class="admin-input" />
                        @error('imagen')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label">Nombre</label>
                        <input type="text" name="name" value="{{ old('name', $user?->name) }}" class="admin-input" required />
                        @error('name')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="admin-form__divider"></div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label">Contraseña actual</label>
                        <input type="password" name="current_password" class="admin-input" placeholder="********" />
                        @error('current_password')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label">Nueva contraseña</label>
                        <input type="password" name="new_password" class="admin-input" placeholder="Mínimo 8 caracteres" />
                        @error('new_password')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label">Confirmar nueva contraseña</label>
                        <input type="password" name="new_password_confirmation" class="admin-input" placeholder="Repite la contraseña" />
                    </div>
                </div>

                <div class="admin-form__actions">
                    <button type="submit" class="admin-btn admin-btn--primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </section>
@endsection
