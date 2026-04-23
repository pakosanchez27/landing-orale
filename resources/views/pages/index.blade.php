@extends('layouts.app')

@section('titulo', 'Inicio')
@section('meta_description', 'Agencia de diseno y desarrollo web en Mexico. Creamos sitios modernos, rapidos y orientados a resultados para negocios, emprendedores y PyMEs.')
@section('og_image', asset('img/hero.png'))

@push('head-extra')
    <link rel="preload" as="image" href="{{ asset('img/hero.png') }}">
@endpush

@section('content')
    <section class="page-hero page-hero--home">
        <div class="shell hero-grid">
            <div class="hero-copy" data-reveal>
                <span class="eyebrow">Estudio digital premium.</span>
                <h1>Construimos sitios web que se sienten <span class="gradient-text">memorables</span> y marcan la diferencia</h1>
                <p>En Orale Web dise&ntilde;amos experiencias visuales de alto impacto para marcas que necesitan verse s&oacute;lidas, cargar r&aacute;pido y transformar visitas en prospectos reales.</p>
                <div class="hero-actions">
                    <a href="/contacto" class="btn btn-primary">Quiero mi proyecto</a>
                    <a href="/demos" class="btn btn-secondary">Ver demos en vivo</a>
                </div>
                <div class="pill-row">
                    <span class="pill">Landing pages de conversi&oacute;n</span>
                    <span class="pill">Sitios corporativos</span>
                    <span class="pill">SEO t&eacute;cnico base</span>
                </div>
            </div>

            <div class="hero-aside" data-reveal>
                <div class="hero-visual art-frame">
                    <img src="{{ asset('img/hero.png') }}" alt="Presentacion principal de Orale Web" loading="eager" fetchpriority="high" decoding="async" />
                </div>
                <div class="metric-chip">
                    <span>Velocidad objetivo</span>
                    <strong>&lt;2s de carga</strong>
                </div>
                <div class="floating-note">
                    <span>Resultados esperados</span>
                    <strong>+ confianza, + leads</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="stat-grid">
                <article class="stat-card" data-reveal>
                    <strong>Dise&ntilde;o</strong>
                    <span>Interfaces limpias, editoriales y pensadas para vender.</span>
                </article>
                <article class="stat-card" data-reveal>
                    <strong>UX</strong>
                    <span>Recorridos claros para llevar al usuario hacia la acci&oacute;n.</span>
                </article>
                <article class="stat-card" data-reveal>
                    <strong>SEO</strong>
                    <span>Estructura t&eacute;cnica lista para crecer en buscadores.</span>
                </article>
                <article class="stat-card" data-reveal>
                    <strong>Escala</strong>
                    <span>Arquitectura preparada para evolucionar contigo.</span>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Servicios</span>
                <h2>Una presencia digital con direcci&oacute;n estrat&eacute;gica, no solo con buena apariencia.</h2>
                <p>Tomamos la esencia visual de tu marca y la convertimos en un sistema web elegante, veloz y orientado a resultados.</p>
            </div>

            <div class="card-grid grid-3">
                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon"><i class="fa-solid fa-laptop-code"></i></div>
                    <h3>Sitios web corporativos</h3>
                    <p>P&aacute;ginas multip&aacute;gina para negocios que necesitan autoridad, narrativa clara y una estructura profesional.</p>
                    <ul class="feature-list">
                        <li>Arquitectura de informaci&oacute;n clara</li>
                        <li>Dise&ntilde;o responsive de alta fidelidad</li>
                        <li>Implementaci&oacute;n limpia y escalable</li>
                    </ul>
                </article>

                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon"><i class="fa-solid fa-bolt"></i></div>
                    <h3>Landing pages de alto impacto</h3>
                    <p>Piezas enfocadas en captaci&oacute;n de leads, lanzamientos y servicios donde cada bloque debe empujar a la conversi&oacute;n.</p>
                    <ul class="feature-list">
                        <li>Copy con enfoque comercial</li>
                        <li>Jerarqu&iacute;a visual persuasiva</li>
                        <li>Formularios listos para recibir prospectos</li>
                    </ul>
                </article>

                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon"><i class="fa-solid fa-chart-line"></i></div>
                    <h3>Optimizaci&oacute;n y crecimiento</h3>
                    <p>No entregamos una web est&aacute;tica: dejamos una base s&oacute;lida para que tu presencia digital siga creciendo.</p>
                    <ul class="feature-list">
                        <li>SEO t&eacute;cnico inicial</li>
                        <li>Mejora de velocidad y confianza</li>
                        <li>Escalabilidad para nuevas secciones</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell two-col-grid">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Propuesta de valor</span>
                <h2>Tu web no deber&iacute;a verse gen&eacute;rica si tu negocio no lo es.</h2>
                <p>Dise&ntilde;amos con una direcci&oacute;n visual premium inspirada en interfaces modernas, superficies suaves, tipograf&iacute;a con car&aacute;cter y un lenguaje visual que eleva la percepci&oacute;n de marca.</p>
                <ul class="detail-list">
                    <li>Identidad visual coherente desde el primer scroll</li>
                    <li>Bloques dise&ntilde;ados para transmitir confianza</li>
                    <li>Desarrollo pensado para sostener campa&ntilde;as y crecimiento</li>
                </ul>
            </div>
            <div class="split-visual art-frame" data-reveal>
                <img src="{{ asset('img/img-2.png') }}" alt="Ejemplo visual de desarrollo web profesional" loading="lazy" />
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Demos recientes</span>
                <h2>Referencias visuales pensadas para imaginar c&oacute;mo podr&iacute;a verse tu marca en digital.</h2>
                <p>Explora una selecci&oacute;n de demos por industria y visualiza el tipo de experiencia que podemos dise&ntilde;ar, adaptar y llevar a producci&oacute;n para tu negocio.</p>
            </div>

            <div class="card-grid grid-3">
                @forelse ($demos->take(6) as $demo)
                    @php
                        $demoImage = \Illuminate\Support\Str::startsWith($demo->imagen, ['http://', 'https://']) ? $demo->imagen : asset($demo->imagen);
                    @endphp
                    <article class="portfolio-card" data-reveal>
                        <img src="{{ $demoImage }}" alt="{{ $demo->titulo }}" loading="lazy" />
                        <div class="portfolio-card__body">
                            @if ($demo->industria)
                                <span class="pill" style="background-color: {{ $demo->industria->color ?: '#5E1ED3' }}1A; color: {{ $demo->industria->color ?: '#5E1ED3' }};">
                                    {{ $demo->industria->nombre }}
                                </span>
                            @endif
                            <h3>{{ $demo->titulo }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($demo->descripcion, 120) }}</p>
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-demo-trigger
                                data-demo-title="{{ $demo->titulo }}"
                                data-demo-image="{{ $demoImage }}"
                                data-demo-description="{{ $demo->descripcion }}"
                                data-demo-link="{{ $demo->link }}"
                                data-demo-industry="{{ $demo->industria?->nombre }}"
                                data-demo-color="{{ $demo->industria?->color ?: '#5E1ED3' }}">
                                Ver demo
                            </button>
                        </div>
                    </article>
                @empty
                    <p data-reveal>Aun no hay demos disponibles.</p>
                @endforelse
            </div>

            <div class="dual-actions" style="margin-top: 2.8rem;" data-reveal>
                <a href="/demos" class="btn btn-dark">Explorar todos los demos</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell band-card" data-reveal>
            <div class="two-col-grid">
                <div>
                    <span class="eyebrow">Proceso</span>
                    <h2>Un flujo claro para que el proyecto avance con orden, velocidad y criterio visual.</h2>
                </div>
                <div class="timeline-list">
                    <article class="timeline-card">
                        <span class="timeline-card__step">1</span>
                        <h3>Descubrimiento y enfoque</h3>
                        <p>Definimos objetivos, estilo visual, prioridades y tipo de conversi&oacute;n que necesita tu negocio.</p>
                    </article>
                    <article class="timeline-card">
                        <span class="timeline-card__step">2</span>
                        <h3>Dise&ntilde;o y desarrollo</h3>
                        <p>Construimos una interfaz con identidad propia y una implementaci&oacute;n limpia, r&aacute;pida y adaptable.</p>
                    </article>
                    <article class="timeline-card">
                        <span class="timeline-card__step">3</span>
                        <h3>Lanzamiento y ajuste</h3>
                        <p>Publicamos, afinamos detalles y dejamos la base lista para seguir captando oportunidades.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Paquetes</span>
                <h2>Opciones pensadas para emprendedores, marcas en crecimiento y proyectos a medida.</h2>
            </div>

            <div class="pricing-grid">
                <article class="pricing-card" data-reveal>
                    <span class="pricing-card__tag">Basico</span>
                    <div>
                        <p class="pricing-card__price">$3,500 <span>+ IVA</span></p>
                        <p>Una base clara para negocios que necesitan validarse r&aacute;pido con una presencia profesional.</p>
                    </div>
                    <ul class="feature-list">
                        <li>One page con hasta 5 secciones</li>
                        <li>Responsive y formulario de contacto</li>
                        <li>Alta en Google My Business</li>
                    </ul>
                    <a href="/contacto?paquete=basico" class="btn btn-secondary">Elegir plan</a>
                </article>

                <article class="pricing-card is-featured" data-reveal>
                    <span class="pricing-card__tag">Profesional</span>
                    <div>
                        <p class="pricing-card__price">$5,500 <span>+ IVA</span></p>
                        <p>La opci&oacute;n ideal para marcas que necesitan una web m&aacute;s robusta, elegante y lista para escalar.</p>
                    </div>
                    <ul class="feature-list">
                        <li>Hasta 5 p&aacute;ginas independientes</li>
                        <li>Blog, redes y correos corporativos</li>
                        <li>2 meses de mantenimiento incluidos</li>
                    </ul>
                    <a href="/contacto?paquete=profesional" class="btn btn-primary">Elegir plan</a>
                </article>

                <article class="pricing-card" data-reveal>
                    <span class="pricing-card__tag">Personalizado</span>
                    <div>
                        <p class="pricing-card__price">A medida</p>
                        <p>Para proyectos con procesos, integraciones o necesidades visuales y funcionales fuera de plantilla.</p>
                    </div>
                    <ul class="feature-list">
                        <li>Arquitectura y alcance a la medida</li>
                        <li>Funcionalidades especiales</li>
                        <li>Escalabilidad segun objetivos</li>
                    </ul>
                    <a href="/contacto?paquete=personalizado" class="btn btn-secondary">Cotizar</a>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell cta-panel" data-reveal>
            <span class="eyebrow">Siguiente paso</span>
            <h2>Tu negocio puede verse tan s&oacute;lido como realmente es.</h2>
            <p>Si quieres una web inspirada en una direcci&oacute;n visual premium, moderna y orientada a resultados, construyamos algo a la altura de tu marca.</p>
            <div class="dual-actions">
                <a href="/contacto" class="btn btn-primary">Iniciar proyecto</a>
                <a href="/paquetes" class="btn btn-secondary">Comparar paquetes</a>
            </div>
        </div>
    </section>
@endsection

@push('page-overlays')
    @include('partials.demo-modal')
@endpush
