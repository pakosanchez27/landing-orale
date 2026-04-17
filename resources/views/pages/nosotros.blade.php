@extends('layouts.app')

@section('titulo', 'Nosotros')
@section('meta_description', 'Conoce a Orale Web, una agencia mexicana especializada en estrategia digital, diseno y desarrollo web para negocios locales y PyMEs.')
@section('og_image', asset('img/team.jpg'))

@section('content')
    <section class="page-hero">
        <div class="shell page-hero__card" data-reveal>
            <span class="eyebrow">Sobre Orale Web</span>
            <h1>Dise&ntilde;amos presencia digital con <span class="gradient-text">criterio, claridad y car&aacute;cter.</span></h1>
            <p>Somos un estudio creativo y t&eacute;cnico enfocado en ayudar a negocios, emprendedores y marcas emergentes a verse profesionales en internet sin caer en sitios gen&eacute;ricos, lentos o sin estrategia.</p>
        </div>
    </section>

    <section class="section">
        <div class="shell two-col-grid">
            <div class="split-visual" data-reveal>
                <picture>
                    <source srcset="{{ asset('img/team.webp') }}" type="image/webp">
                    <img src="{{ asset('img/team.jpg') }}" alt="Equipo de Orale Web" loading="lazy" />
                </picture>
            </div>

            <div class="section-intro" data-reveal>
                <span class="eyebrow">Nuestra esencia</span>
                <h2>Combinamos estrategia comercial, dise&ntilde;o premium y desarrollo bien hecho.</h2>
                <p>Cada proyecto nace de una pregunta simple: &iquest;c&oacute;mo debe sentirse esta marca en digital para inspirar confianza y mover a la acci&oacute;n? A partir de ah&iacute; dise&ntilde;amos experiencias limpias, contempor&aacute;neas y funcionales.</p>
                <ul class="detail-list">
                    <li>Estrategia antes que decoraci&oacute;n</li>
                    <li>Dise&ntilde;o enfocado en percepci&oacute;n y conversi&oacute;n</li>
                    <li>Desarrollo veloz, estable y adaptable</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell card-grid grid-3">
            <article class="feature-card" data-reveal>
                <div class="feature-card__icon"><i class="fa-solid fa-compass-drafting"></i></div>
                <h3>Mision</h3>
                <p>Crear sitios web y landing pages que eleven la percepci&oacute;n de marca y ayuden a generar oportunidades reales de negocio.</p>
            </article>
            <article class="feature-card" data-reveal>
                <div class="feature-card__icon"><i class="fa-solid fa-eye"></i></div>
                <h3>Vision</h3>
                <p>Convertirnos en una referencia para marcas que buscan un lenguaje visual m&aacute;s cuidado y una ejecuci&oacute;n digital m&aacute;s seria.</p>
            </article>
            <article class="feature-card" data-reveal>
                <div class="feature-card__icon"><i class="fa-solid fa-shield-heart"></i></div>
                <h3>Valores</h3>
                <p>Transparencia, criterio visual, velocidad de respuesta y obsesion por construir piezas que s&iacute; aporten valor al negocio.</p>
            </article>
        </div>
    </section>

    <section class="section">
        <div class="shell band-card" data-reveal>
            <div class="section-intro">
                <span class="eyebrow">Como trabajamos</span>
                <h2>No vendemos paginas bonitas sin fondo. Construimos herramientas de confianza para marcas reales.</h2>
            </div>
            <div class="card-grid grid-3">
                <article class="timeline-card">
                    <span class="timeline-card__step">1</span>
                    <h3>Escuchamos</h3>
                    <p>Entendemos el negocio, su audiencia y el tipo de percepci&oacute;n que necesita generar.</p>
                </article>
                <article class="timeline-card">
                    <span class="timeline-card__step">2</span>
                    <h3>Definimos direcci&oacute;n</h3>
                    <p>Elegimos una narrativa visual y una estructura pensada para guiar al usuario con claridad.</p>
                </article>
                <article class="timeline-card">
                    <span class="timeline-card__step">3</span>
                    <h3>Construimos con detalle</h3>
                    <p>Implementamos una experiencia pulida, responsiva y lista para crecer.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Equipo</span>
                <h2>Un equipo peque&ntilde;o, multidisciplinario y obsesionado con hacer que cada pixel tenga sentido.</h2>
            </div>

            <div class="card-grid grid-3">
                <article class="team-card" data-reveal>
                    <picture>
                        <source srcset="{{ asset('img/team.webp') }}" type="image/webp">
                        <img src="{{ asset('img/team.jpg') }}" alt="Maria Ramirez, direccion de estrategia" loading="lazy" />
                    </picture>
                    <div class="team-card__body">
                        <h3>Maria Ramirez</h3>
                        <p class="mini-pill">Direccion de estrategia</p>
                        <p>Define objetivos, propuesta de valor y recorrido comercial para que cada web tenga un papel claro dentro del negocio.</p>
                    </div>
                </article>

                <article class="team-card" data-reveal>
                    <picture>
                        <source srcset="{{ asset('img/nosotros.jpg.webp') }}" type="image/webp">
                        <img src="{{ asset('img/nosotros.jpg') }}" alt="Carlos Mendez, diseno UI UX" loading="lazy" />
                    </picture>
                    <div class="team-card__body">
                        <h3>Carlos Mendez</h3>
                        <p class="mini-pill">Dise&ntilde;o UI/UX</p>
                        <p>Convierte necesidades comerciales en interfaces pulidas, contempor&aacute;neas y con una lectura visual clara.</p>
                    </div>
                </article>

                <article class="team-card" data-reveal>
                    <div class="team-card__media team-card__media--art art-frame art-frame--compact">
                        <img src="{{ asset('img/nosotros.png') }}" alt="Andrea Torres, desarrollo web" loading="lazy" />
                    </div>
                    <div class="team-card__body">
                        <h3>Andrea Torres</h3>
                        <p class="mini-pill">Desarrollo web</p>
                        <p>Se encarga de que todo lo dise&ntilde;ado cobre vida con rendimiento, limpieza t&eacute;cnica y buena experiencia en cualquier pantalla.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell cta-panel" data-reveal>
            <span class="eyebrow">Construyamos algo serio</span>
            <h2>Tu negocio merece una identidad digital que refleje el nivel real de tu trabajo.</h2>
            <p>Si buscas un redise&ntilde;o completo, una landing page potente o una web con una direcci&oacute;n visual m&aacute;s premium, conversemos.</p>
            <div class="dual-actions">
                <a href="/contacto" class="btn btn-primary">Cotizar ahora</a>
                <a href="/demos" class="btn btn-secondary">Ver referencias</a>
            </div>
        </div>
    </section>
@endsection
