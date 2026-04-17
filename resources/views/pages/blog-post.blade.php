@extends('layouts.app')

@section('titulo', 'Blog Post')
@section('meta_description', 'Guia practica para mejorar estructura, rendimiento y experiencia de usuario sin perder claridad comercial.')
@section('og_image', asset('img/blog-principal.png'))
@section('og_type', 'article')

@section('content')
    <section class="page-hero">
        <div class="shell article-layout">
            <article class="surface-card article-card" data-reveal>
                <img src="{{ asset('img/blog-principal.png') }}" alt="Imagen principal del articulo" loading="lazy" />
                <div class="article-meta">
                    <span>03 marzo 2026</span>
                    <span>UX</span>
                    <span>Estrategia digital</span>
                </div>
                <h1 style="margin: 1.8rem 0 2rem;">Como mejorar la UX de tu sitio web en 30 dias</h1>

                <div class="article-content">
                    <p>Mejorar la experiencia de usuario no siempre exige rehacer un sitio completo. A menudo, los avances mas importantes aparecen cuando ordenas mejor la jerarquia visual, aclaras el recorrido y reduces la friccion en puntos clave.</p>
                    <p>El primer paso es revisar si tu home responde rapido tres preguntas: qu&eacute; haces, para qui&eacute;n lo haces y qu&eacute; debe hacer el usuario despu&eacute;s. Si esas respuestas no est&aacute;n claras en los primeros segundos, el sitio pierde fuerza comercial.</p>
                    <p>Despu&eacute;s conviene revisar bloques espec&iacute;ficos: encabezados, botones, formularios, velocidad, composici&oacute;n visual y coherencia entre secciones. La UX no es solo usabilidad; tambi&eacute;n es percepci&oacute;n, ritmo y confianza.</p>
                    <h2>Un checklist simple para empezar</h2>
                    <ul>
                        <li>Haz que el encabezado principal explique valor real, no solo una frase bonita.</li>
                        <li>Reduce ruido visual y deja un camino evidente hacia la acci&oacute;n principal.</li>
                        <li>Optimiza im&aacute;genes, espaciado y contraste para mejorar legibilidad.</li>
                        <li>Revisa el formulario: menos fricci&oacute;n casi siempre significa m&aacute;s conversiones.</li>
                    </ul>
                    <p>Cuando un sitio se siente ordenado, fluido y consistente, la marca se percibe mas seria. Y esa percepci&oacute;n tiene un impacto directo en la confianza del usuario y en la capacidad de generar prospectos.</p>
                </div>
            </article>

            <aside class="article-sidebar">
                <div class="surface-card sidebar-card" data-reveal>
                    <span class="eyebrow">Resumen</span>
                    <div class="timeline-list">
                        <div>
                            <h3>Lectura</h3>
                            <p>5 minutos</p>
                        </div>
                        <div>
                            <h3>Ideal para</h3>
                            <p>Negocios con una web que se siente confusa o poco convincente.</p>
                        </div>
                        <div>
                            <h3>Resultado</h3>
                            <p>Una experiencia m&aacute;s clara, m&aacute;s r&aacute;pida y mejor orientada a conversi&oacute;n.</p>
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
                <article class="blog-card-modern" data-reveal>
                    <img src="{{ asset('img/blog1.png') }}" alt="Articulo relacionado 1" loading="lazy" />
                    <div class="blog-card-modern__body">
                        <div class="blog-card-modern__meta">
                            <span>27 febrero 2026</span>
                            <span>SEO tecnico</span>
                        </div>
                        <h3>Como migrar tu web sin perder traccion</h3>
                        <p>Buenas practicas para actualizar una web sin comprometer estructura, indexacion ni experiencia.</p>
                        <a href="{{ route('blog.post') }}" class="btn btn-secondary">Leer articulo</a>
                    </div>
                </article>
                <article class="blog-card-modern" data-reveal>
                    <img src="{{ asset('img/blog2.png') }}" alt="Articulo relacionado 2" loading="lazy" />
                    <div class="blog-card-modern__body">
                        <div class="blog-card-modern__meta">
                            <span>18 febrero 2026</span>
                            <span>Conversion</span>
                        </div>
                        <h3>Elementos clave de una landing que si convierte</h3>
                        <p>Desde la propuesta de valor hasta el CTA final, cada bloque debe empujar a una decision clara.</p>
                        <a href="{{ route('blog.post') }}" class="btn btn-secondary">Leer articulo</a>
                    </div>
                </article>
                <article class="blog-card-modern" data-reveal>
                    <img src="{{ asset('img/blog-principal.png') }}" alt="Articulo relacionado 3" loading="lazy" />
                    <div class="blog-card-modern__body">
                        <div class="blog-card-modern__meta">
                            <span>08 febrero 2026</span>
                            <span>Performance</span>
                        </div>
                        <h3>Velocidad web: por qu&eacute; importa mas de lo que parece</h3>
                        <p>Mejorar tiempos de carga tambi&eacute;n mejora confianza, permanencia y resultados comerciales.</p>
                        <a href="{{ route('blog.post') }}" class="btn btn-secondary">Leer articulo</a>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
