@extends('layouts.app-admin')

@section('titulo', 'Mi perfil')

@section('content')
    @php
        $user = $user ?? auth()->user();
        $avatar = $user && $user->imagen ? asset($user->imagen) : asset('img/perfil.jpg');
        $socialLinks = $user?->socialLinks;
    @endphp

    <div class="admin-topbar">
        <div>
            <p class="admin-topbar__eyebrow">Perfil</p>
            <h1 class="admin-topbar__title">Editar perfil</h1>
        </div>
    </div>

    <section class="admin-section">
        <div class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Mi perfil</h2>
                    <p class="admin-card__subtitle">Actualiza tus datos, seguridad y redes sociales.</p>
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

                <div class="admin-card__header">
                    <div>
                        <h2 class="admin-card__title">Redes sociales</h2>
                        <p class="admin-card__subtitle">Se mostraran como iconos en la seccion de autor del blog.</p>
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label">Facebook</label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $socialLinks?->facebook_url) }}" class="admin-input" placeholder="https://facebook.com/tu-perfil" />
                        @error('facebook_url')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label">Instagram</label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $socialLinks?->instagram_url) }}" class="admin-input" placeholder="https://instagram.com/tu-perfil" />
                        @error('instagram_url')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label">LinkedIn</label>
                        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $socialLinks?->linkedin_url) }}" class="admin-input" placeholder="https://linkedin.com/in/tu-perfil" />
                        @error('linkedin_url')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label">X</label>
                        <input type="url" name="x_url" value="{{ old('x_url', $socialLinks?->x_url) }}" class="admin-input" placeholder="https://x.com/tu-perfil" />
                        @error('x_url')
                            <p class="admin-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label">YouTube</label>
                        <input type="url" name="youtube_url" value="{{ old('youtube_url', $socialLinks?->youtube_url) }}" class="admin-input" placeholder="https://youtube.com/@tu-canal" />
                        @error('youtube_url')
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
                        <input type="password" name="new_password" class="admin-input" placeholder="Minimo 8 caracteres" />
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
