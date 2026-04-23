@extends('layouts.app-admin')

@section('titulo', 'Blogs')

@section('content')
    <div class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">Contenido</p>
            <h1 class="admin-topbar__title">Administrador de blogs</h1>
        </div>
        <div class="admin-topbar__actions">
            <a href="{{ route('admin.blogs.create') }}" class="btn-primario">Nuevo articulo</a>
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
                <h2>Articulos actuales</h2>
            </div>
            <div class="admin-panel__body admin-blog-grid">
                @forelse ($posts as $post)
                    @php
                        $postCover = \Illuminate\Support\Str::startsWith($post['cover_image'], ['http://', 'https://']) ? $post['cover_image'] : asset($post['cover_image']);
                    @endphp
                    <article class="admin-card admin-blog-card">
                        <img src="{{ $postCover }}" alt="{{ $post['title'] }}" class="admin-blog-card__image" />
                        <div class="admin-blog-card__body">
                            <div class="blog-card-modern__meta">
                                <span>{{ \Carbon\Carbon::parse($post['published_at'])->translatedFormat('d F Y') }}</span>
                                <span>{{ $post['category'] }}</span>
                            </div>
                            <h3 class="admin-card__title">{{ $post['title'] }}</h3>
                            <p>{{ $post['excerpt'] }}</p>
                            <div class="admin-blog-card__footer">
                                <span class="estado {{ $post['is_active'] ? 'estado-activo' : 'estado-inactivo' }}">
                                    {{ $post['is_active'] ? 'Publicado' : 'Oculto' }}
                                </span>
                                <div>
                                    <a href="{{ route('admin.blogs.edit', $post['id']) }}" class="btn-action" title="Editar articulo">
                                        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.blogs.destroy', $post['id']) }}" method="POST" class="admin-inline-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-danger js-confirm-delete-post" data-post-title="{{ $post['title'] }}">
                                            <i class="fa-solid fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <p>No hay articulos registrados.</p>
                @endforelse
            </div>
        </section>
    </main>
@endsection

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.js-confirm-delete-post').forEach(function (button) {
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
                        title: 'Eliminar articulo',
                        text: 'Se eliminara el articulo "' + (button.dataset.postTitle || '') + '".',
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
