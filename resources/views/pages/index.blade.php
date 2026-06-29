@extends('layouts.app')

@section('titulo', 'Inicio')
@section('meta_description', 'Soluciones digitales para captar, gestionar y convertir clientes: sitios web, automatizaciones, IA para negocios y Orale Lead System Pro.')
@section('og_image', asset('img/hero.png'))

@push('head-extra')
    <link rel="preload" as="image" href="{{ asset('img/hero.png') }}">
@endpush

@section('content')
    <section class="page-hero page-hero--home home-hero">
        <div class="shell hero-grid">
            <div class="hero-copy" data-reveal>
                <span class="eyebrow">Soluciones digitales para crecer</span>
                <h1>Convierte m&aacute;s visitantes en prospectos con sitios web, automatizaci&oacute;n e inteligencia artificial</h1>
                <p>Ayudamos a negocios, emprendedores y empresas a captar oportunidades, dar seguimiento y mejorar sus procesos mediante soluciones digitales dise&ntilde;adas para crecer.</p>
                <div class="hero-actions">
                    <a href="/contacto" class="btn btn-primary">Solicitar diagn&oacute;stico</a>
                    <a href="#soluciones" class="btn btn-secondary">Ver soluciones</a>
                </div>
                <div class="pill-row">
                    <span class="pill">Captaci&oacute;n de prospectos</span>
                    <span class="pill">Seguimiento comercial</span>
                    <span class="pill">Procesos conectados</span>
                </div>
            </div>

            <div class="home-flow-visual" data-reveal aria-label="Flujo de captacion de clientes">
                <div class="home-flow-visual__header">
                    <span>Sistema de crecimiento</span>
                    <strong>De visitante a cliente</strong>
                </div>
                <div class="home-flow-stack">
                    <article>
                        <i class="fa-solid fa-share-nodes"></i>
                        <span>Redes sociales</span>
                    </article>
                    <article>
                        <i class="fa-solid fa-globe"></i>
                        <span>Landing / Sitio web</span>
                    </article>
                    <article>
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </article>
                    <article>
                        <i class="fa-solid fa-address-book"></i>
                        <span>Registro de prospectos</span>
                    </article>
                    <article>
                        <i class="fa-solid fa-bell"></i>
                        <span>Seguimiento</span>
                    </article>
                    <article>
                        <i class="fa-solid fa-handshake"></i>
                        <span>Cliente</span>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Problemas que resolvemos</span>
                <h2>Muchos negocios tienen oportunidades entrando, pero no tienen un sistema para aprovecharlas.</h2>
                <p>Si alguno de estos puntos te resulta familiar, probablemente no necesitas solo una p&aacute;gina web. Necesitas un sistema mejor conectado.</p>
            </div>

            <div class="problem-grid">
                <article class="problem-card" data-reveal>
                    <i class="fa-solid fa-mobile-screen-button"></i>
                    <span>Dependen &uacute;nicamente de redes sociales</span>
                </article>
                <article class="problem-card" data-reveal>
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Su p&aacute;gina web no genera contactos</span>
                </article>
                <article class="problem-card" data-reveal>
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>Los prospectos se pierden en WhatsApp</span>
                </article>
                <article class="problem-card" data-reveal>
                    <i class="fa-solid fa-list-check"></i>
                    <span>No existe seguimiento claro</span>
                </article>
                <article class="problem-card" data-reveal>
                    <i class="fa-solid fa-clock"></i>
                    <span>Todo se hace manualmente</span>
                </article>
                <article class="problem-card" data-reveal>
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>No tienen m&eacute;tricas para decidir</span>
                </article>
            </div>
        </div>
    </section>

    <section class="section" id="soluciones">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Qu&eacute; hacemos</span>
                <h2>Soluciones para cada etapa del crecimiento digital.</h2>
                <p>Dise&ntilde;amos presencia, captaci&oacute;n, automatizaci&oacute;n y atenci&oacute;n inteligente para que tu operaci&oacute;n comercial no dependa de esfuerzos sueltos.</p>
            </div>

            <div class="solution-grid">
                <article class="solution-card" id="sitios-web" data-reveal>
                    <div class="solution-card__icon"><i class="fa-solid fa-laptop-code"></i></div>
                    <h3>Sitios Web</h3>
                    <p>Presencia profesional dise&ntilde;ada para generar confianza y facilitar el contacto.</p>
                    <a href="/paquetes">Ver paquetes</a>
                </article>
                <article class="solution-card solution-card--featured" data-reveal>
                    <div class="solution-card__icon"><i class="fa-solid fa-star"></i></div>
                    <h3>&Oacute;rale Lead System Pro</h3>
                    <p>Captaci&oacute;n y seguimiento de prospectos en un solo sistema.</p>
                    <a href="/orale-lead-system-pro">Conocer producto</a>
                </article>
                <article class="solution-card" id="automatizaciones" data-reveal>
                    <div class="solution-card__icon"><i class="fa-solid fa-gears"></i></div>
                    <h3>Automatizaciones</h3>
                    <p>Procesos que reducen tareas manuales y mejoran la operaci&oacute;n.</p>
                    <a href="{{ route('automatizaciones') }}">Conocer automatizaciones</a>
                </article>
                <article class="solution-card" id="ia-para-negocios" data-reveal>
                    <div class="solution-card__icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h3>IA para Negocios</h3>
                    <p>Asistentes inteligentes para atenci&oacute;n, orientaci&oacute;n y seguimiento.</p>
                    <a href="{{ route('ia-para-negocios') }}">Conocer asistentes inteligentes</a>
                </article>
            </div>
        </div>
    </section>

    <section class="section lead-system-section">
        <div class="shell">
            <div class="lead-system-card" data-reveal>
                <div class="lead-system-glow lead-system-glow--one"></div>
                <div class="lead-system-glow lead-system-glow--two"></div>

                <div class="lead-system-grid">
                    <div class="lead-system-copy">
                        <span class="eyebrow lead-system-eyebrow">Producto destacado</span>
                        <h2>Muchos negocios pierden prospectos todos los d&iacute;as sin darse cuenta</h2>
                        <p><strong>&iexcl;&Oacute;rale Lead System Pro!</strong> conecta tu sitio web, WhatsApp y herramientas de seguimiento para ayudarte a registrar cada oportunidad y facilitar el proceso comercial.</p>

                        <div class="lead-system-actions">
                            <a href="/orale-lead-system-pro" class="btn btn-primary">Conocer &Oacute;rale Lead System Pro</a>
                            <a href="/contacto" class="btn btn-light-outline">Solicitar diagn&oacute;stico</a>
                        </div>

                        <div class="lead-system-proof">
                            <article>
                                <strong>Landing optimizada</strong>
                                <span>Mensaje claro, contacto r&aacute;pido y estructura para convertir.</span>
                            </article>
                            <article>
                                <strong>WhatsApp integrado</strong>
                                <span>El prospecto llega al canal donde tu equipo puede responder.</span>
                            </article>
                            <article>
                                <strong>M&eacute;tricas y seguimiento</strong>
                                <span>Registro, avisos y visibilidad para no perder oportunidades.</span>
                            </article>
                        </div>
                    </div>

                    <div class="lead-system-visual" aria-label="Vista visual de Orale Lead System Pro">
                        <div class="lead-device">
                            <div class="lead-device__top">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div class="lead-device__hero">
                                <span class="lead-device__tag">Landing activa</span>
                                <h3>Nuevo prospecto listo para seguimiento</h3>
                                <p>Formulario, WhatsApp, registro y notificaci&oacute;n conectados.</p>
                            </div>

                            <div class="lead-device__form">
                                <div></div>
                                <div></div>
                                <div></div>
                                <button type="button">Solicitar informaci&oacute;n</button>
                            </div>
                        </div>

                        <div class="lead-flow-card lead-flow-card--whatsapp">
                            <i class="fa-brands fa-whatsapp"></i>
                            <div>
                                <strong>WhatsApp</strong>
                                <span>Conversaci&oacute;n iniciada</span>
                            </div>
                        </div>

                        <div class="lead-flow-card lead-flow-card--sheet">
                            <i class="fa-solid fa-table"></i>
                            <div>
                                <strong>Registro autom&aacute;tico</strong>
                                <span>Google Sheets, CRM o herramienta externa</span>
                            </div>
                        </div>

                        <div class="lead-flow-card lead-flow-card--notify">
                            <i class="fa-solid fa-bell"></i>
                            <div>
                                <strong>Seguimiento</strong>
                                <span>Tu equipo recibe aviso y responde a tiempo</span>
                            </div>
                        </div>

                        <div class="lead-orbit lead-orbit--one"></div>
                        <div class="lead-orbit lead-orbit--two"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">C&oacute;mo funciona</span>
                <h2>Del primer clic al seguimiento.</h2>
                <p>Convertimos puntos sueltos de contacto en un flujo comercial m&aacute;s claro, medible y f&aacute;cil de operar.</p>
            </div>

            <div class="process-flow">
                <article data-reveal>
                    <div class="process-flow__top">
                        <span class="process-flow__icon"><i class="fa-solid fa-magnet" aria-hidden="true"></i></span>
                        <span class="process-flow__number">01</span>
                    </div>
                    <h3>Atracci&oacute;n</h3>
                    <p>El visitante llega desde Google, redes sociales o una campa&ntilde;a.</p>
                </article>
                <article data-reveal>
                    <div class="process-flow__top">
                        <span class="process-flow__icon"><i class="fa-solid fa-comments" aria-hidden="true"></i></span>
                        <span class="process-flow__number">02</span>
                    </div>
                    <h3>Contacto</h3>
                    <p>Solicita informaci&oacute;n desde una landing, formulario o WhatsApp.</p>
                </article>
                <article data-reveal>
                    <div class="process-flow__top">
                        <span class="process-flow__icon"><i class="fa-solid fa-address-card" aria-hidden="true"></i></span>
                        <span class="process-flow__number">03</span>
                    </div>
                    <h3>Registro</h3>
                    <p>Sus datos se guardan autom&aacute;ticamente en la herramienta correcta.</p>
                </article>
                <article data-reveal>
                    <div class="process-flow__top">
                        <span class="process-flow__icon"><i class="fa-solid fa-bell" aria-hidden="true"></i></span>
                        <span class="process-flow__number">04</span>
                    </div>
                    <h3>Aviso</h3>
                    <p>Recibes una notificaci&oacute;n para responder sin dejarlo enfriar.</p>
                </article>
                <article data-reveal>
                    <div class="process-flow__top">
                        <span class="process-flow__icon"><i class="fa-solid fa-list-check" aria-hidden="true"></i></span>
                        <span class="process-flow__number">05</span>
                    </div>
                    <h3>Seguimiento</h3>
                    <p>Tu equipo sabe qu&eacute; hacer y cu&aacute;ndo volver a contactar.</p>
                </article>
                <article data-reveal>
                    <div class="process-flow__top">
                        <span class="process-flow__icon"><i class="fa-solid fa-chart-line" aria-hidden="true"></i></span>
                        <span class="process-flow__number">06</span>
                    </div>
                    <h3>Medici&oacute;n</h3>
                    <p>Identificas qu&eacute; funciona y d&oacute;nde ajustar la estrategia.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="comparison-panel" data-reveal>
                <div class="section-intro">
                    <span class="eyebrow">Por qu&eacute; somos diferentes</span>
                    <h2>No solo entregamos p&aacute;ginas web.</h2>
                    <p>Dise&ntilde;amos soluciones digitales conectadas a objetivos comerciales, seguimiento y crecimiento real.</p>
                </div>

                <div class="comparison-table">
                    <div class="comparison-table__head">
                        <span>Agencia tradicional</span>
                        <span>&iexcl;&Oacute;rale Web!</span>
                    </div>
                    <div><span>Dise&ntilde;a p&aacute;ginas</span><strong>Dise&ntilde;a soluciones</strong></div>
                    <div><span>Entrega el proyecto</span><strong>Acompa&ntilde;a el crecimiento</strong></div>
                    <div><span>Formularios simples</span><strong>Captaci&oacute;n conectada</strong></div>
                    <div><span>Sin seguimiento</span><strong>Automatizaci&oacute;n comercial</strong></div>
                    <div><span>Sin m&eacute;tricas</span><strong>Datos y visibilidad</strong></div>
                    <div><span>Dise&ntilde;o primero</span><strong>Objetivos primero</strong></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="casos-de-exito">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Casos de uso</span>
                <h2>Soluciones para distintos tipos de negocio.</h2>
                <p>La estructura se adapta a cl&iacute;nicas, veterinarias, est&eacute;ticas, escuelas, restaurantes, consultores, servicios t&eacute;cnicos y negocios locales.</p>
            </div>

            <div class="use-case-grid" data-reveal>
                <span><i class="fa-solid fa-hospital"></i> Cl&iacute;nicas</span>
                <span><i class="fa-solid fa-paw"></i> Veterinarias</span>
                <span><i class="fa-solid fa-spa"></i> Est&eacute;ticas</span>
                <span><i class="fa-solid fa-graduation-cap"></i> Escuelas</span>
                <span><i class="fa-solid fa-utensils"></i> Restaurantes</span>
                <span><i class="fa-solid fa-briefcase"></i> Consultores</span>
                <span><i class="fa-solid fa-screwdriver-wrench"></i> Servicios t&eacute;cnicos</span>
                <span><i class="fa-solid fa-store"></i> Negocios locales</span>
            </div>

            <div class="card-grid grid-3 home-demo-grid">
                @forelse ($demos->take(3) as $demo)
                    @php
                        $demoImage = $demo->imagen_url;
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
                                Ver ejemplo
                            </button>
                        </div>
                    </article>
                @empty
                    <p data-reveal>Aun no hay demos disponibles.</p>
                @endforelse
            </div>

            <div class="dual-actions" style="margin-top: 2.8rem;" data-reveal>
                <a href="{{ route('casos-de-exito') }}" class="btn btn-dark">Ver proyectos y soluciones</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell band-card" data-reveal>
            <div class="two-col-grid">
                <div>
                    <span class="eyebrow">Nuestro proceso</span>
                    <h2>As&iacute; trabajamos para que tu soluci&oacute;n avance con orden.</h2>
                </div>
                <div class="timeline-list">
                    <article class="timeline-card">
                        <span class="timeline-card__step">1</span>
                        <h3>Diagn&oacute;stico</h3>
                        <p>Entendemos tu situaci&oacute;n, objetivos, canales y problemas actuales.</p>
                    </article>
                    <article class="timeline-card">
                        <span class="timeline-card__step">2</span>
                        <h3>Estrategia</h3>
                        <p>Definimos la mejor soluci&oacute;n digital seg&uacute;n etapa y presupuesto.</p>
                    </article>
                    <article class="timeline-card">
                        <span class="timeline-card__step">3</span>
                        <h3>Desarrollo</h3>
                        <p>Construimos el sitio, landing, automatizaci&oacute;n o sistema necesario.</p>
                    </article>
                    <article class="timeline-card">
                        <span class="timeline-card__step">4</span>
                        <h3>Implementaci&oacute;n</h3>
                        <p>Conectamos herramientas, probamos el flujo y documentamos la entrega.</p>
                    </article>
                    <article class="timeline-card">
                        <span class="timeline-card__step">5</span>
                        <h3>Capacitaci&oacute;n y soporte</h3>
                        <p>Te ense&ntilde;amos a utilizarlo y te acompa&ntilde;amos despu&eacute;s de publicar.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Paquetes</span>
                <h2>Elige la opci&oacute;n adecuada para tu negocio.</h2>
            </div>

            <div class="pricing-grid">
                <article class="pricing-card" data-reveal>
                    <span class="pricing-card__tag">B&aacute;sico</span>
                    <div>
                        <p class="pricing-card__price">$3,500 <span>+ IVA</span></p>
                        <p>Una base clara para negocios que necesitan validarse r&aacute;pido con una presencia profesional.</p>
                    </div>
                    <ul class="feature-list">
                        <li>One page con hasta 5 secciones</li>
                        <li>Responsive y formulario de contacto</li>
                        <li>Alta en Google My Business</li>
                    </ul>
                    <a href="/paquetes" class="btn btn-secondary">Comparar paquetes</a>
                </article>

                <article class="pricing-card is-featured" data-reveal>
                    <span class="pricing-card__tag">Profesional</span>
                    <div>
                        <p class="pricing-card__price">$5,500 <span>+ IVA</span></p>
                        <p>Para marcas que necesitan una web m&aacute;s robusta, elegante y lista para crecer.</p>
                    </div>
                    <ul class="feature-list">
                        <li>Hasta 5 p&aacute;ginas independientes</li>
                        <li>Blog, redes y correos corporativos</li>
                        <li>2 meses de mantenimiento incluidos</li>
                    </ul>
                    <a href="/paquetes" class="btn btn-primary">Comparar paquetes</a>
                </article>

                <article class="pricing-card" data-reveal>
                    <span class="pricing-card__tag">Personalizado</span>
                    <div>
                        <p class="pricing-card__price">A medida</p>
                        <p>Cotizaci&oacute;n seg&uacute;n alcance para procesos, integraciones o necesidades especiales.</p>
                    </div>
                    <ul class="feature-list">
                        <li>Arquitectura y alcance a la medida</li>
                        <li>Automatizaciones o sistemas especiales</li>
                        <li>Escalabilidad seg&uacute;n objetivos</li>
                    </ul>
                    <a href="/paquetes" class="btn btn-secondary">Comparar paquetes</a>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell trust-grid">
            <div class="trust-card trust-card--positive" data-reveal>
                <span class="eyebrow">Transparencia</span>
                <h2>Lo que s&iacute; encontrar&aacute;s con nosotros.</h2>
                <ul class="feature-list">
                    <li>Alcances claros</li>
                    <li>Costos transparentes</li>
                    <li>Capacitaci&oacute;n inicial</li>
                    <li>Entrega documentada</li>
                    <li>Soporte posterior</li>
                    <li>Comunicaci&oacute;n constante</li>
                </ul>
            </div>
            <div class="trust-card trust-card--avoid" data-reveal>
                <span class="eyebrow">Lo que evitamos</span>
                <h2>Sin letras chiquitas ni promesas irreales.</h2>
                <ul class="avoid-list">
                    <li>Costos ocultos</li>
                    <li>Promesas irreales</li>
                    <li>Permanencias obligatorias</li>
                    <li>Proyectos sin documentaci&oacute;n</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="diagnostic-panel" data-reveal>
                <div>
                    <span class="eyebrow">Diagn&oacute;stico r&aacute;pido</span>
                    <h2>&iquest;Necesitas una p&aacute;gina web o una soluci&oacute;n m&aacute;s completa?</h2>
                    <p>Responde algunas preguntas y descubre si te conviene una landing, sitio profesional, &Oacute;rale Lead System Pro, automatizaci&oacute;n o sistema personalizado.</p>
                </div>
                <a href="/contacto" class="btn btn-primary">Solicitar diagn&oacute;stico</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell faq-home-grid">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Preguntas frecuentes</span>
                <h2>Dudas comunes antes de empezar.</h2>
                <p>Estas respuestas ayudan a dimensionar el proyecto, el presupuesto y el tipo de soluci&oacute;n que puede convenirte.</p>
                <a href="/faq" class="btn btn-secondary">Ver FAQ completa</a>
            </div>

            <div class="faq-list-home">
                <article data-reveal>
                    <h3>&iquest;Cu&aacute;nto cuesta?</h3>
                    <p>Depende del alcance. Tenemos paquetes desde $3,500 + IVA y proyectos personalizados seg&uacute;n integraciones.</p>
                </article>
                <article data-reveal>
                    <h3>&iquest;Cu&aacute;nto tarda?</h3>
                    <p>Un sitio base puede avanzar en pocos d&iacute;as; soluciones con automatizaci&oacute;n requieren diagn&oacute;stico y pruebas.</p>
                </article>
                <article data-reveal>
                    <h3>&iquest;Incluye WhatsApp?</h3>
                    <p>Podemos integrar WhatsApp como canal de contacto y conectarlo al flujo comercial cuando el proyecto lo requiere.</p>
                </article>
                <article data-reveal>
                    <h3>&iquest;Trabajan con IA?</h3>
                    <p>S&iacute;. Creamos asistentes y flujos inteligentes para orientaci&oacute;n, atenci&oacute;n y seguimiento de prospectos.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell cta-panel" data-reveal>
            <span class="eyebrow">Hablemos de tu proyecto</span>
            <h2>Cu&eacute;ntanos qu&eacute; necesitas y te ayudaremos a identificar la mejor soluci&oacute;n para tu negocio.</h2>
            <p>Podemos empezar por una web, una landing, un sistema de captaci&oacute;n, una automatizaci&oacute;n o una soluci&oacute;n a medida.</p>
            <div class="dual-actions">
                <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer" class="btn btn-primary">WhatsApp</a>
                <a href="/contacto" class="btn btn-secondary">Agendar videollamada</a>
                <a href="/contacto" class="btn btn-dark">Solicitar diagn&oacute;stico</a>
            </div>
        </div>
    </section>
@endsection

@push('page-overlays')
    @include('partials.demo-modal')
@endpush
