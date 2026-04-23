@extends('layouts.app-admin')

@section('titulo', 'Nuevo blog')

@section('content')
    <div class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">Blogs</p>
            <h1 class="admin-topbar__title">Crear articulo</h1>
        </div>
    </div>

    <main class="admin-content">
        <section class="admin-panel">
            <div class="admin-panel__header">
                <h2>Nuevo articulo</h2>
            </div>

            <div class="admin-panel__body">
                <div class="admin-ai-panel">
                    <div class="admin-ai-panel__header">
                        <div>
                            <p class="admin-topbar__eyebrow">IA</p>
                            <h3 class="admin-card__title">Generar borrador con OpenAI</h3>
                        </div>
                        <button type="button" class="admin-btn admin-btn--primary" id="blog-ai-generate-btn">
                            Generar con IA
                        </button>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="ai_title">Titulo base</label>
                            <input class="admin-input" id="ai_title" type="text" placeholder="Ej. Como captar mas clientes con una landing page" />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="ai_idea">Idea del blog</label>
                            <textarea class="admin-input admin-textarea" id="ai_idea" rows="4" placeholder="Explica el enfoque, publico objetivo, tono y puntos que quieres tocar."></textarea>
                        </div>
                    </div>

                    <p class="admin-ai-panel__hint">La IA llenara titulo, slug, categoria, extracto, tiempo de lectura y contenido del articulo.</p>
                </div>

                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
                    @csrf

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="title">Titulo</label>
                            <input class="admin-input" id="title" name="title" type="text" value="{{ old('title') }}" required />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="slug">Slug opcional</label>
                            <input class="admin-input" id="slug" name="slug" type="text" value="{{ old('slug') }}" placeholder="se-genera-si-lo-dejas-vacio" />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="category">Categoria</label>
                            <input class="admin-input" id="category" name="category" type="text" value="{{ old('category') }}" required />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="reading_time">Tiempo de lectura</label>
                            <input class="admin-input" id="reading_time" name="reading_time" type="text" value="{{ old('reading_time', '5 minutos') }}" required />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="published_at">Fecha de publicacion</label>
                            <input class="admin-input" id="published_at" name="published_at" type="date" value="{{ old('published_at', now()->toDateString()) }}" required />
                        </div>
                        <div class="admin-form__group">
                            <label class="admin-label" for="is_active">Estado</label>
                            <select class="admin-input" id="is_active" name="is_active">
                                <option value="1" @selected(old('is_active', '1') === '1')>Publicado</option>
                                <option value="0" @selected(old('is_active') === '0')>Oculto</option>
                            </select>
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="excerpt">Extracto</label>
                            <textarea class="admin-input admin-textarea" id="excerpt" name="excerpt" rows="3" required>{{ old('excerpt') }}</textarea>
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label" for="cover_image">Imagen de portada</label>
                            <input class="admin-input" id="cover_image" name="cover_image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" required />
                        </div>
                    </div>

                    <div class="admin-form__row">
                        <div class="admin-form__group">
                            <label class="admin-label">Contenido</label>
                            @include('admin.blogs.partials.editor', ['name' => 'content_html', 'value' => old('content_html', '<p>Escribe aqui el contenido del articulo.</p>')])
                        </div>
                    </div>

                    <div class="admin-form__actions">
                        <button type="submit" class="admin-btn admin-btn--primary">Guardar articulo</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection

@push('page-scripts')
    @include('admin.blogs.partials.editor-script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const aiButton = document.getElementById('blog-ai-generate-btn');
            const aiTitle = document.getElementById('ai_title');
            const aiIdea = document.getElementById('ai_idea');
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');
            const categoryInput = document.getElementById('category');
            const readingTimeInput = document.getElementById('reading_time');
            const excerptInput = document.getElementById('excerpt');
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            if (!aiButton || !aiTitle || !aiIdea) {
                return;
            }

            aiButton.addEventListener('click', async function () {
                const title = aiTitle.value.trim();
                const idea = aiIdea.value.trim();

                if (!title || !idea) {
                    if (window.Swal) {
                        window.Swal.fire({
                            icon: 'warning',
                            title: 'Completa los datos',
                            text: 'Escribe el titulo base y la idea del blog antes de generar.',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                    return;
                }

                const originalText = aiButton.textContent;
                aiButton.disabled = true;
                aiButton.textContent = 'Generando...';

                try {
                    const response = await fetch('{{ route('admin.blogs.ai-generate') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken || ''
                        },
                        body: JSON.stringify({
                            title: title,
                            idea: idea
                        })
                    });

                    const payload = await response.json();

                    if (!response.ok) {
                        throw new Error(payload.message || 'No fue posible generar el blog.');
                    }

                    const data = payload.data || {};
                    titleInput.value = data.title || titleInput.value;
                    slugInput.value = data.slug || '';
                    categoryInput.value = data.category || '';
                    readingTimeInput.value = data.reading_time || readingTimeInput.value;
                    excerptInput.value = data.excerpt || '';

                    const editorRoot = document.querySelector('[data-editor-root]');
                    const editorSurface = editorRoot?.querySelector('[data-editor-surface]');
                    const editorTextarea = editorRoot?.querySelector('[data-editor-textarea]');

                    if (editorSurface && editorTextarea) {
                        editorSurface.innerHTML = data.content_html || '<p>Sin contenido generado.</p>';
                        editorTextarea.value = editorSurface.innerHTML;
                    }

                    if (window.Swal) {
                        window.Swal.fire({
                            icon: 'success',
                            title: 'Borrador generado',
                            text: 'La IA completo el formulario con una propuesta inicial.',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                } catch (error) {
                    if (window.Swal) {
                        window.Swal.fire({
                            icon: 'error',
                            title: 'No se pudo generar',
                            text: error.message || 'Ocurrio un error al consultar OpenAI.',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                } finally {
                    aiButton.disabled = false;
                    aiButton.textContent = originalText;
                }
            });
        });
    </script>
@endpush
