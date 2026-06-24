@extends('layouts.app')

@section('titulo', '&Oacute;rale Lead System Pro')
@section('meta_description', 'Orale Lead System Pro conecta landing page, WhatsApp y registro de prospectos para captar, organizar y dar seguimiento a oportunidades comerciales.')
@section('og_image', asset('img/hero.png'))

@push('page-styles')
    @vite(['resources/css/lead-system-pro.css'])
@endpush

@section('content')
    <section class="lead-product-hero">
        <div class="shell lead-product-hero__grid">
            <div class="lead-product-hero__copy" data-reveal>
                <span class="eyebrow">Producto estrella de &iexcl;&Oacute;rale Web!</span>
                <h1>Convierte m&aacute;s visitantes en prospectos y deja de perder oportunidades por falta de seguimiento</h1>
                <p>&Oacute;rale Lead System Pro conecta tu landing page, WhatsApp y registro de prospectos para que cada contacto quede organizado desde el primer mensaje.</p>
                <div class="hero-actions">
                    <a href="/contacto" class="btn btn-primary">Solicitar diagn&oacute;stico</a>
                    <a href="#como-funciona" class="btn btn-secondary">Ver c&oacute;mo funciona</a>
                </div>
                <div class="pill-row">
                    <span class="pill">Landing de conversi&oacute;n</span>
                    <span class="pill">WhatsApp conectado</span>
                    <span class="pill">Registro autom&aacute;tico</span>
                    <span class="pill">Seguimiento b&aacute;sico</span>
                </div>
            </div>

            <div class="lead-product-visual" data-reveal aria-label="Flujo visual de Orale Lead System Pro">
                <div class="lead-product-dashboard">
                    <div class="lead-product-dashboard__top">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="lead-product-dashboard__hero">
                        <span>Nuevo prospecto</span>
                        <h2>Solicitud registrada</h2>
                        <p>Landing, WhatsApp, registro y notificaci&oacute;n trabajando en el mismo flujo.</p>
                    </div>
                    <div class="lead-product-dashboard__grid">
                        <article>
                            <strong>Origen</strong>
                            <span>Instagram Ads</span>
                        </article>
                        <article>
                            <strong>Contacto</strong>
                            <span>WhatsApp listo</span>
                        </article>
                        <article>
                            <strong>Estado</strong>
                            <span>Pendiente de respuesta</span>
                        </article>
                        <article>
                            <strong>Acci&oacute;n</strong>
                            <span>Seguimiento hoy</span>
                        </article>
                    </div>
                </div>

                <div class="lead-product-chip lead-product-chip--whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    <div>
                        <strong>WhatsApp</strong>
                        <span>Mensaje preparado</span>
                    </div>
                </div>
                <div class="lead-product-chip lead-product-chip--notify">
                    <i class="fa-solid fa-bell"></i>
                    <div>
                        <strong>Notificaci&oacute;n</strong>
                        <span>Equipo avisado</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro section-intro--center" data-reveal>
                <span class="eyebrow">El problema</span>
                <h2>Muchos negocios pierden prospectos sin darse cuenta.</h2>
                <p>El cliente escribe, pregunta por WhatsApp, llena un formulario o llega desde redes, pero si nadie lo registra, responde o da seguimiento, esa oportunidad se puede enfriar r&aacute;pido.</p>
            </div>

            <div class="lead-problem-grid">
                <article data-reveal><i class="fa-brands fa-whatsapp"></i><span>Los mensajes se pierden en WhatsApp.</span></article>
                <article data-reveal><i class="fa-solid fa-chart-simple"></i><span>No sabes cu&aacute;ntos prospectos llegaron.</span></article>
                <article data-reveal><i class="fa-solid fa-list-check"></i><span>No tienes registro de seguimiento.</span></article>
                <article data-reveal><i class="fa-solid fa-bullhorn"></i><span>Inviertes en publicidad sin medir resultados.</span></article>
                <article data-reveal><i class="fa-solid fa-hand"></i><span>Dependencia total de respuestas manuales.</span></article>
                <article data-reveal><i class="fa-solid fa-route"></i><span>No sabes qu&eacute; canal genera mejores contactos.</span></article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell lead-definition-panel" data-reveal>
            <div class="section-intro">
                <span class="eyebrow">Qu&eacute; es</span>
                <h2>Una landing conectada a un sistema de seguimiento.</h2>
                <p>No es solo una p&aacute;gina web. Es una soluci&oacute;n pensada para captar prospectos, registrar su informaci&oacute;n y ayudarte a dar seguimiento de forma m&aacute;s ordenada.</p>
            </div>

            <div class="lead-include-grid">
                <span><i class="fa-solid fa-window-maximize"></i> Landing de conversi&oacute;n</span>
                <span><i class="fa-solid fa-clipboard-list"></i> Formulario de contacto</span>
                <span><i class="fa-brands fa-whatsapp"></i> Bot&oacute;n de WhatsApp</span>
                <span><i class="fa-solid fa-database"></i> Registro autom&aacute;tico</span>
                <span><i class="fa-solid fa-bell"></i> Notificaciones internas</span>
                <span><i class="fa-solid fa-user-check"></i> Seguimiento b&aacute;sico</span>
                <span><i class="fa-solid fa-chart-pie"></i> M&eacute;tricas iniciales</span>
            </div>
        </div>
    </section>

    <section class="section" id="como-funciona">
        <div class="shell">
            <div class="section-intro section-intro--center" data-reveal>
                <span class="eyebrow">C&oacute;mo funciona</span>
                <h2>Del primer clic al seguimiento, todo conectado.</h2>
                <p>El sistema une la captaci&oacute;n, el registro y el aviso al equipo para que cada oportunidad tenga un siguiente paso claro.</p>
            </div>

            <div class="lead-process-flow">
                <article data-reveal>
                    <span>1</span>
                    <h3>Llega el prospecto</h3>
                    <p>Desde redes, Google, anuncios o una recomendaci&oacute;n.</p>
                </article>
                <article data-reveal>
                    <span>2</span>
                    <h3>Visita tu landing</h3>
                    <p>Encuentra la informaci&oacute;n clave para decidir.</p>
                </article>
                <article data-reveal>
                    <span>3</span>
                    <h3>Solicita informaci&oacute;n</h3>
                    <p>Por formulario o WhatsApp, seg&uacute;n el flujo definido.</p>
                </article>
                <article data-reveal>
                    <span>4</span>
                    <h3>Queda registrado</h3>
                    <p>Sus datos se guardan autom&aacute;ticamente.</p>
                </article>
                <article data-reveal>
                    <span>5</span>
                    <h3>Recibes aviso</h3>
                    <p>Tu equipo sabe que debe dar seguimiento.</p>
                </article>
                <article data-reveal>
                    <span>6</span>
                    <h3>Mides resultados</h3>
                    <p>Revisas cu&aacute;ntos prospectos llegaron y desde d&oacute;nde.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell before-after-grid">
            <div class="before-after-card before-after-card--before" data-reveal>
                <span class="eyebrow">Antes</span>
                <h2>Prospectos dispersos.</h2>
                <ul>
                    <li>Mensajes sin seguimiento</li>
                    <li>Sin m&eacute;tricas claras</li>
                    <li>Respuesta lenta</li>
                    <li>Informaci&oacute;n desordenada</li>
                </ul>
            </div>
            <div class="before-after-card before-after-card--after" data-reveal>
                <span class="eyebrow">Despu&eacute;s</span>
                <h2>Oportunidades organizadas.</h2>
                <ul>
                    <li>Prospectos registrados</li>
                    <li>Seguimiento m&aacute;s ordenado</li>
                    <li>WhatsApp conectado</li>
                    <li>M&aacute;s visibilidad comercial</li>
                    <li>Mejor control de oportunidades</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Qu&eacute; incluye</span>
                <h2>Todo lo necesario para comenzar a captar y organizar prospectos.</h2>
            </div>

            <div class="lead-feature-grid">
                <article data-reveal>
                    <i class="fa-solid fa-laptop-code"></i>
                    <h3>Landing de conversi&oacute;n</h3>
                    <p>Dise&ntilde;o profesional, responsive y enfocado en que el visitante entienda tu oferta y tome acci&oacute;n.</p>
                </article>
                <article data-reveal>
                    <i class="fa-solid fa-clipboard-question"></i>
                    <h3>Formulario inteligente</h3>
                    <p>Captura los datos necesarios sin hacer pesado el proceso.</p>
                </article>
                <article data-reveal>
                    <i class="fa-brands fa-whatsapp"></i>
                    <h3>WhatsApp integrado</h3>
                    <p>Botones y mensajes preparados para facilitar el contacto.</p>
                </article>
                <article data-reveal>
                    <i class="fa-solid fa-gears"></i>
                    <h3>Automatizaci&oacute;n inicial</h3>
                    <p>Cada prospecto puede registrarse autom&aacute;ticamente en una herramienta externa.</p>
                </article>
                <article data-reveal>
                    <i class="fa-solid fa-address-book"></i>
                    <h3>Registro de prospectos</h3>
                    <p>Google Sheets, Airtable, Notion, HubSpot, Pipedrive, Kommo, Zoho o Monday.</p>
                </article>
                <article data-reveal>
                    <i class="fa-solid fa-bell"></i>
                    <h3>Notificaciones</h3>
                    <p>Tu equipo recibe aviso cuando entra una nueva oportunidad.</p>
                </article>
                <article data-reveal>
                    <i class="fa-solid fa-chart-pie"></i>
                    <h3>M&eacute;tricas b&aacute;sicas</h3>
                    <p>Visibilidad sobre contactos generados, canal de origen y seguimiento inicial.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell target-panel" data-reveal>
            <div class="section-intro">
                <span class="eyebrow">Para qui&eacute;n es</span>
                <h2>Ideal para negocios que atienden prospectos por WhatsApp.</h2>
                <p>Funciona especialmente bien para negocios que venden servicios, reciben preguntas frecuentes y necesitan responder r&aacute;pido.</p>
            </div>
            <div class="target-grid">
                <span><i class="fa-solid fa-tooth"></i> Cl&iacute;nicas dentales</span>
                <span><i class="fa-solid fa-paw"></i> Veterinarias</span>
                <span><i class="fa-solid fa-spa"></i> Est&eacute;ticas</span>
                <span><i class="fa-solid fa-scissors"></i> Barber&iacute;as</span>
                <span><i class="fa-solid fa-graduation-cap"></i> Escuelas y cursos</span>
                <span><i class="fa-solid fa-user-tie"></i> Consultores</span>
                <span><i class="fa-solid fa-screwdriver-wrench"></i> Servicios t&eacute;cnicos</span>
                <span><i class="fa-solid fa-utensils"></i> Restaurantes</span>
                <span><i class="fa-solid fa-store"></i> Negocios locales</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell lead-comparison-panel" data-reveal>
            <div class="section-intro">
                <span class="eyebrow">Comparativa</span>
                <h2>Landing tradicional vs &Oacute;rale Lead System Pro.</h2>
            </div>
            <div class="lead-comparison-table">
                <div class="lead-comparison-table__head">
                    <span>Landing tradicional</span>
                    <span>&Oacute;rale Lead System Pro</span>
                </div>
                <div><span>Solo muestra informaci&oacute;n</span><strong>Capta y registra prospectos</strong></div>
                <div><span>Bot&oacute;n de WhatsApp b&aacute;sico</span><strong>WhatsApp conectado al flujo</strong></div>
                <div><span>Formulario sin seguimiento</span><strong>Registro autom&aacute;tico</strong></div>
                <div><span>Sin visibilidad clara</span><strong>M&eacute;tricas iniciales</strong></div>
                <div><span>Entrega una p&aacute;gina</span><strong>Entrega un sistema comercial</strong></div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell integrations-grid">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Integraciones</span>
                <h2>Se adapta a las herramientas que ya usas.</h2>
                <p>Podemos conectar el registro de prospectos con herramientas simples o CRMs m&aacute;s completos, seg&uacute;n el nivel de operaci&oacute;n de tu negocio.</p>
            </div>
            <div class="integration-list" data-reveal>
                <span>Google Sheets</span>
                <span>Airtable</span>
                <span>Notion</span>
                <span>HubSpot</span>
                <span>Pipedrive</span>
                <span>Kommo</span>
                <span>Zoho</span>
                <span>Monday</span>
                <span>WhatsApp</span>
                <span>n8n</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell investment-card" data-reveal>
            <div>
                <span class="eyebrow">Inversi&oacute;n</span>
                <h2>Inversi&oacute;n clara desde el inicio.</h2>
                <p>El costo final depende del alcance, integraciones, n&uacute;mero de automatizaciones y herramientas que necesite tu negocio.</p>
            </div>
            <div class="investment-box">
                <span>Implementaci&oacute;n desde</span>
                <strong>$9,500 <small>MXN + IVA</small></strong>
                <p>Landing de captaci&oacute;n, formulario, WhatsApp, automatizaci&oacute;n inicial, registro de prospectos y capacitaci&oacute;n b&aacute;sica.</p>
                <a href="/contacto" class="btn btn-primary">Solicitar diagn&oacute;stico</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell scope-grid">
            <article data-reveal>
                <span class="eyebrow">Incluye</span>
                <ul class="detail-list">
                    <li>Landing de captaci&oacute;n</li>
                    <li>Formulario</li>
                    <li>WhatsApp</li>
                    <li>Automatizaci&oacute;n inicial</li>
                    <li>Registro de prospectos</li>
                    <li>Capacitaci&oacute;n b&aacute;sica</li>
                </ul>
            </article>
            <article data-reveal>
                <span class="eyebrow">No incluye</span>
                <ul class="avoid-list">
                    <li>Campa&ntilde;as publicitarias</li>
                    <li>CRM empresarial de pago</li>
                    <li>Costos de herramientas externas</li>
                    <li>IA avanzada</li>
                    <li>Desarrollo de sistema a medida</li>
                </ul>
            </article>
        </div>
    </section>

    <section class="section">
        <div class="shell transparency-panel" data-reveal>
            <span class="eyebrow">Garant&iacute;as y transparencia</span>
            <h2>Sin humo, sin costos sorpresa y sin entregas en caja negra.</h2>
            <p>Antes de iniciar definimos el alcance, herramientas, tiempos y entregables para que sepas exactamente qu&eacute; est&aacute;s contratando.</p>
            <div class="transparency-grid">
                <span>Alcance definido por escrito</span>
                <span>Entrega documentada</span>
                <span>Capacitaci&oacute;n inicial</span>
                <span>Soporte posterior</span>
                <span>Costos claros</span>
                <span>Herramientas a nombre del cliente cuando aplique</span>
            </div>
        </div>
    </section>

    <section class="section faq-accordion-section">
        <div class="shell">
            <div class="section-intro section-intro--center" data-reveal>
                <span class="eyebrow">FAQ</span>
                <h2>Preguntas frecuentes antes de implementarlo.</h2>
            </div>

            <div class="faq-accordion" data-reveal>
                <article class="faq-accordion__item is-open">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="true">
                        <span>&iquest;Necesito tener p&aacute;gina web?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-accordion__content">
                        <p>No necesariamente. Podemos crear la landing como parte del sistema.</p>
                    </div>
                </article>
                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Funciona con mi WhatsApp actual?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-accordion__content">
                        <p>S&iacute;, se puede integrar el contacto por WhatsApp. Algunas automatizaciones avanzadas pueden requerir herramientas adicionales.</p>
                    </div>
                </article>
                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Necesito contratar un CRM?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-accordion__content">
                        <p>No siempre. Puedes iniciar con Google Sheets, Airtable o Notion.</p>
                    </div>
                </article>
                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Puedo conectar HubSpot, Kommo o Pipedrive?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-accordion__content">
                        <p>S&iacute;, siempre que la herramienta permita integraci&oacute;n y el alcance lo contemple.</p>
                    </div>
                </article>
                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Incluye publicidad?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-accordion__content">
                        <p>No. La publicidad se puede cotizar por separado.</p>
                    </div>
                </article>
                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Cu&aacute;nto tarda?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-accordion__content">
                        <p>Depende del alcance, pero normalmente es m&aacute;s r&aacute;pido que un sistema personalizado completo.</p>
                    </div>
                </article>
                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Tiene mensualidad?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-accordion__content">
                        <p>Puede tener mensualidad si requiere mantenimiento, herramientas, soporte o monitoreo.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell cta-panel" data-reveal>
            <span class="eyebrow">Siguiente paso</span>
            <h2>&iquest;Cu&aacute;ntos prospectos est&aacute;s dejando ir por falta de seguimiento?</h2>
            <p>Solicita un diagn&oacute;stico y descubre si &Oacute;rale Lead System Pro es la soluci&oacute;n adecuada para ordenar tu captaci&oacute;n de clientes.</p>
            <div class="dual-actions">
                <a href="/contacto" class="btn btn-primary">Solicitar diagn&oacute;stico</a>
                <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">Hablar por WhatsApp</a>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const accordionItems = document.querySelectorAll('.faq-accordion__item');

            accordionItems.forEach((item) => {
                const trigger = item.querySelector('.faq-accordion__trigger');

                trigger.addEventListener('click', () => {
                    const isOpen = item.classList.contains('is-open');

                    accordionItems.forEach((currentItem) => {
                        currentItem.classList.remove('is-open');
                        currentItem
                            .querySelector('.faq-accordion__trigger')
                            .setAttribute('aria-expanded', 'false');
                    });

                    if (!isOpen) {
                        item.classList.add('is-open');
                        trigger.setAttribute('aria-expanded', 'true');
                    }
                });
            });
        });
    </script>
@endpush
