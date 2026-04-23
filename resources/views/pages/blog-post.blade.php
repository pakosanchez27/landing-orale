@extends('layouts.app')

@section('titulo', $post['title'])
@section('meta_description', $post['excerpt'])
@section('og_image', \Illuminate\Support\Str::startsWith($post['cover_image'], ['http://', 'https://']) ? $post['cover_image'] : asset($post['cover_image']))
@section('og_type', 'article')

@section('content')
    @php
        $postCover = \Illuminate\Support\Str::startsWith($post['cover_image'], ['http://', 'https://']) ? $post['cover_image'] : asset($post['cover_image']);
    @endphp
    <section class="page-hero">
        <div class="shell article-layout">
            <article class="surface-card article-card" data-reveal>
                <img src="{{ $postCover }}" alt="{{ $post['title'] }}" loading="lazy" />
                <div class="article-meta">
                    <span>{{ \Carbon\Carbon::parse($post['published_at'])->translatedFormat('d F Y') }}</span>
                    <span>{{ $post['category'] }}</span>
                    <span>{{ $post['reading_time'] }}</span>
                </div>
                <h1 style="margin: 1.8rem 0 2rem;">{{ $post['title'] }}</h1>

                <div class="article-content">
                    {!! $post['content_html'] !!}
                </div>
            </article>

            <aside class="article-sidebar">
                <div class="surface-card sidebar-card" data-reveal>
                    <span class="eyebrow">Resumen</span>
                    <div class="timeline-list">
                        <div>
                            <h3>Lectura</h3>
                            <p>{{ $post['reading_time'] }}</p>
                        </div>
                        <div>
                            <h3>Categoria</h3>
                            <p>{{ $post['category'] }}</p>
                        </div>
                        <div>
                            <h3>Resumen</h3>
                            <p>{{ $post['excerpt'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="surface-card sidebar-card" data-reveal>
                    <span class="eyebrow">Siguiente paso</span>
                    <h3>Quieres aplicar esto en tu marca?</h3>
                    <p>Podemos revisar tu sitio actual y proponerte una direcci&oacute;n visual y estructural m&aacute;s clara.</p>
                    <a href="/contacto" class="btn btn-primary" style="margin-top: 1.6rem;">Hablar del proyecto</a>
                </div>
            </aside>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Mas entradas</span>
                <h2>Articulos relacionados</h2>
            </div>

            <div class="blog-grid-modern grid-3">
                @forelse ($relatedPosts as $relatedPost)
                    @php
                        $relatedCover = \Illuminate\Support\Str::startsWith($relatedPost['cover_image'], ['http://', 'https://']) ? $relatedPost['cover_image'] : asset($relatedPost['cover_image']);
                    @endphp
                    <article class="blog-card-modern" data-reveal>
                        <img src="{{ $relatedCover }}" alt="{{ $relatedPost['title'] }}" loading="lazy" />
                        <div class="blog-card-modern__body">
                            <div class="blog-card-modern__meta">
                                <span>{{ \Carbon\Carbon::parse($relatedPost['published_at'])->translatedFormat('d F Y') }}</span>
                                <span>{{ $relatedPost['category'] }}</span>
                            </div>
                            <h3>{{ $relatedPost['title'] }}</h3>
                            <p>{{ $relatedPost['excerpt'] }}</p>
                            <a href="{{ route('blog.post', $relatedPost['slug']) }}" class="btn btn-secondary">Leer articulo</a>
                        </div>
                    </article>
                @empty
                    <p data-reveal>No hay articulos relacionados por ahora.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
