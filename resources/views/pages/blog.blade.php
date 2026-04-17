@extends('layouts.app')

@section('titulo', 'Blog')
@section('meta_description', 'Articulos sobre diseno web, UX, SEO y estrategia digital para mejorar la presencia online y conversiones de tu negocio.')
@section('og_image', asset('img/blog-principal.png'))

@section('content')
    @php
        $posts = [
            [
                'image' => asset('img/blog-principal.png'),
                'date' => '03 marzo 2026',
                'category' => 'UX',
                'title' => 'Como mejorar la UX de tu sitio web en 30 dias',
                'excerpt' => 'Un plan practico para optimizar navegacion, velocidad y conversiones sin rehacerlo todo desde cero.',
            ],
            [
                'image' => asset('img/blog1.png'),
                'date' => '27 febrero 2026',
                'category' => 'SEO tecnico',
                'title' => 'Guia para migrar tu web sin perder posicionamiento',
                'excerpt' => 'Puntos clave para cuidar URLs, rendimiento y estructura al modernizar un sitio existente.',
            ],
            [
                'image' => asset('img/blog2.png'),
                'date' => '18 febrero 2026',
                'category' => 'Conversion',
                'title' => 'Que debe incluir una landing page para vender mas',
                'excerpt' => 'Jerarquia visual, prueba social y llamadas a la accion que empujan resultados reales.',
            ],
            [
                'image' => asset('img/blog1.png'),
                'date' => '12 febrero 2026',
                'category' => 'Branding',
                'title' => 'Coherencia visual: por que influye en la confianza',
                'excerpt' => 'Una web coherente se percibe mas profesional, mas solida y mucho mas creible.',
            ],
            [
                'image' => asset('img/blog2.png'),
                'date' => '10 febrero 2026',
                'category' => 'Automatizacion',
                'title' => 'Integraciones web utiles para cerrar mas oportunidades',
                'excerpt' => 'Formularios, CRM, correo y seguimiento para evitar que tus prospectos se pierdan.',
            ],
            [
                'image' => asset('img/blog-principal.png'),
                'date' => '08 febrero 2026',
                'category' => 'Performance',
                'title' => 'Velocidad web: como bajar el tiempo de carga',
                'excerpt' => 'Ideas practicas para mejorar experiencia, SEO y conversion sin sacrificar calidad visual.',
            ],
        ];
    @endphp

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

            <div class="blog-grid-modern grid-3">
                @foreach ($posts as $post)
                    <article class="blog-card-modern" data-reveal>
                        <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" loading="lazy" />
                        <div class="blog-card-modern__body">
                            <div class="blog-card-modern__meta">
                                <span>{{ $post['date'] }}</span>
                                <span>{{ $post['category'] }}</span>
                            </div>
                            <h3>{{ $post['title'] }}</h3>
                            <p>{{ $post['excerpt'] }}</p>
                            <a href="{{ route('blog.post') }}" class="btn btn-secondary">Leer articulo</a>
                        </div>
                    </article>
                @endforeach
            </div>
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
