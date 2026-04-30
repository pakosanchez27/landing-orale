@extends('layouts.app')

@section('titulo', 'Blog')
@section('meta_description', 'Articulos sobre diseno web, UX, SEO y estrategia digital para mejorar la presencia online y conversiones de tu negocio.')
@section('og_image', $posts->isNotEmpty() ? (\Illuminate\Support\Str::startsWith($posts->first()['cover_image'], ['http://', 'https://']) ? $posts->first()['cover_image'] : asset($posts->first()['cover_image'])) : asset('img/blog-principal.png'))

@section('content')
    <section class="page-hero">
        <div class="shell page-hero__card" data-reveal>
            <span class="eyebrow">Blog</span>
            <h1>Ideas, criterios y buenas practicas para construir una presencia digital <span class="gradient-text">mas fuerte</span>.</h1>
            <p>Compartimos aprendizajes sobre dise&ntilde;o web, UX, SEO t&eacute;cnico, conversi&oacute;n y estrategia digital para marcas que quieren crecer con m&aacute;s claridad.</p>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Entradas recientes</span>
                <h2>Contenido pensado para ayudarte a tomar mejores decisiones digitales.</h2>
            </div>

            @if ($posts->isNotEmpty())
                <div class="blog-grid-modern grid-3">
                    @foreach ($posts as $post)
                        @php
                            $postCover = \Illuminate\Support\Str::startsWith($post['cover_image'], ['http://', 'https://']) ? $post['cover_image'] : asset($post['cover_image']);
                        @endphp
                        <article class="blog-card-modern" data-reveal>
                            <img src="{{ $postCover }}" alt="{{ $post['title'] }}" loading="lazy" />
                            <div class="blog-card-modern__body">
                                <div class="blog-card-modern__meta">
                                    <span>{{ \Carbon\Carbon::parse($post['published_at'])->translatedFormat('d F Y') }}</span>
                                    <span>{{ $post['category'] }}</span>
                                </div>
                                <h3>{{ $post['title'] }}</h3>
                                <p>{{ $post['excerpt'] }}</p>
                                <a href="{{ route('blog.post', $post['slug']) }}" class="btn btn-secondary">Leer articulo</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="empty-state surface-card" data-reveal>
                    <h3>Aun no hay articulos disponibles.</h3>
                    <p>Cuando publiquemos nuevas entradas apareceran aqui automaticamente.</p>
                </div>
            @endif
        </div>
    </section>

    <section class="section">
        <div class="shell band-card" data-reveal>
            <div class="two-col-grid">
                <div>
                    <span class="eyebrow">Que vas a encontrar</span>
                    <h2>Contenido util para marcas que ya entendieron que su web es una pieza comercial, no solo una tarjeta digital.</h2>
                </div>
                <div class="card-grid">
                    <article class="feature-card">
                        <div class="feature-card__icon"><i class="fa-solid fa-pen-nib"></i></div>
                        <h3>Estrategia</h3>
                        <p>Como estructurar mensajes, secciones y recorridos para guiar mejor al usuario.</p>
                    </article>
                    <article class="feature-card">
                        <div class="feature-card__icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
                        <h3>Experiencia</h3>
                        <p>Buenas practicas de UX, performance y dise&ntilde;o responsive que elevan la percepci&oacute;n de marca.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
