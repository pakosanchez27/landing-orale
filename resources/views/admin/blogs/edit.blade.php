@extends('layouts.app-admin')

@section('titulo', 'Editar blog')

@section('content')
    @php
        $postCover = \Illuminate\Support\Str::startsWith($post['cover_image'], ['http://', 'https://']) ? $post['cover_image'] : asset($post['cover_image']);
    @endphp
    <div class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">Blogs</p>
            <h1 class="admin-topbar__title">Editar articulo</h1>
        </div>
    </div>

    <main class="admin-content">
        <section class="admin-panel">
            <div class="admin-panel__header">
                <h2>{{ $post['title'] }}</h2>
            </div>

            <div class="admin-panel__body">
                <form action="{{ route('admin.blogs.update', $post['id']) }}" method="POST" enctype="multipart/form-data" class="admin-form">
                    @csrf
                    @method('PUT')

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="title">Titulo</label>
                            <input class="admin-input" id="title" name="title" type="text" value="{{ old('title', $post['title']) }}" required />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="slug">Slug</label>
                            <input class="admin-input" id="slug" name="slug" type="text" value="{{ old('slug', $post['slug']) }}" />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="category">Categoria</label>
                            <input class="admin-input" id="category" name="category" type="text" value="{{ old('category', $post['category']) }}" required />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="reading_time">Tiempo de lectura</label>
                            <input class="admin-input" id="reading_time" name="reading_time" type="text" value="{{ old('reading_time', $post['reading_time']) }}" required />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="published_at">Fecha de publicacion</label>
                            <input class="admin-input" id="published_at" name="published_at" type="date" value="{{ old('published_at', $post['published_at']) }}" required />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="is_active">Estado</label>
                            <select class="admin-input" id="is_active" name="is_active">
                                <option value="1" @selected(old('is_active', $post['is_active'] ? '1' : '0') === '1')>Publicado</option>
                                <option value="0" @selected(old('is_active', $post['is_active'] ? '1' : '0') === '0')>Oculto</option>
                            </select>
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="excerpt">Extracto</label>
                            <textarea class="admin-input admin-textarea" id="excerpt" name="excerpt" rows="3" required>{{ old('excerpt', $post['excerpt']) }}</textarea>
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="cover_image">Reemplazar portada</label>
                            <input class="admin-input" id="cover_image" name="cover_image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label">Imagen actual</label>
                            <img src="{{ $postCover }}" alt="{{ $post['title'] }}" class="admin-blog-preview" />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label">Contenido</label>
                            @include('admin.blogs.partials.editor', ['name' => 'content_html', 'value' => old('content_html', $post['content_html'])])
                        </div>
                    </div>

                    <div class="admin-form__actions">
                        <button type="submit" class="admin-btn admin-btn--primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection

@push('page-scripts')
    @include('admin.blogs.partials.editor-script')
@endpush
