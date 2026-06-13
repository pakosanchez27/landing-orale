@extends('layouts.app')

@section('titulo', 'Órale Lead System Pro')
@section('meta_description',
    'Landing profesional con formulario inteligente, registro automático de prospectos y
    seguimiento por WhatsApp para negocios, comercios y servicios.')
@section('og_image', asset('img/hero.png'))

@push('page-styles')
     @vite(['resources/css/lead-system-pro.css'])
@endpush

@section('content')

    <section class="product-hero product-hero--lead-system">
        <div class="shell product-hero-grid">
            <div class="product-hero-copy" data-reveal>
                <span class="eyebrow">Nuevo producto</span>

                <h1>
                    Una landing que no solo se ve bien:
                    <span class="gradient-text">capta prospectos y activa seguimiento.</span>
                </h1>

                <p>
                    <strong>&iexcl;&Oacute;rale Lead System Pro!</strong> es una landing profesional con formulario
                    inteligente,
                    registro autom&aacute;tico de prospectos, correo de respuesta al cliente y seguimiento por WhatsApp
                    para que cualquier comercio pueda recibir datos, ordenar oportunidades y responder m&aacute;s
                    r&aacute;pido.
                </p>

                <div class="hero-actions">
                    <a href="/contacto" class="btn btn-primary">Quiero mi sistema de captaci&oacute;n</a>
                    <a href="#como-funciona" class="btn btn-secondary">Ver c&oacute;mo funciona</a>
                </div>

                <div class="pill-row">
                    <span class="pill">Landing de conversi&oacute;n</span>
                    <span class="pill">Formulario inteligente</span>
                    <span class="pill">Registro autom&aacute;tico</span>
                    <span class="pill">Correo autom&aacute;tico</span>
                    <span class="pill">Seguimiento por WhatsApp</span>
                </div>
            </div>

            <div class="product-hero-visual" data-reveal>
                <div class="lead-system-dashboard">
                    <div class="lead-system-dashboard__top">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="lead-system-dashboard__hero">
                        <span>Formulario enviado</span>
                        <h2>Nuevo prospecto registrado</h2>
                        <p>El sistema captur&oacute; los datos, guard&oacute; el lead y activ&oacute; el flujo de
                            seguimiento.</p>
                    </div>

                    <div class="lead-system-dashboard__grid">
                        <article>
                            <strong>Formulario</strong>
                            <span>Datos recibidos</span>
                        </article>
                        <article>
                            <strong>Registro</strong>
                            <span>Lead guardado</span>
                        </article>
                        <article>
                            <strong>Correo</strong>
                            <span>Respuesta enviada</span>
                        </article>
                        <article>
                            <strong>Equipo</strong>
                            <span>Notificado</span>
                        </article>
                    </div>
                </div>

                <div class="product-floating-card product-floating-card--one">
                    <i class="fa-solid fa-list-check"></i>
                    <div>
                        <strong>Formulario inteligente</strong>
                        <span>Captura los datos clave antes de iniciar el seguimiento.</span>
                    </div>
                </div>

                <div class="product-floating-card product-floating-card--two">
                    <i class="fa-solid fa-robot"></i>
                    <div>
                        <strong>Automatizaci&oacute;n activa</strong>
                        <span>Registro y notificaci&oacute;n sin hacerlo manual.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro section-intro--center" data-reveal>
                <span class="eyebrow">El problema</span>
                <h2>Muchos negocios reciben interesados, pero pierden oportunidades por falta de seguimiento.</h2>
                <p>
                    Redes sociales y WhatsApp ayudan a generar conversaciones, pero si no existe un punto claro
                    para capturar datos, el negocio termina respondiendo tarde, olvidando prospectos o sin saber
                    de d&oacute;nde llegaron sus oportunidades.
                </p>
            </div>

            <div class="card-grid grid-3">
                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <h3>Mensajes desordenados</h3>
                    <p>El cliente pregunta por varios canales, pero la informaci&oacute;n queda repartida entre
                        conversaciones.</p>
                </article>

                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-solid fa-user-clock"></i>
                    </div>
                    <h3>Seguimiento lento</h3>
                    <p>Cuando el equipo responde tarde o sin contexto, el prospecto puede irse con otra opci&oacute;n.</p>
                </article>

                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                    <h3>Sin registro claro</h3>
                    <p>Si no hay una base de datos de prospectos, es dif&iacute;cil medir, ordenar y mejorar el proceso
                        comercial.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section product-solution-section">
        <div class="shell">
            <div class="product-solution-card" data-reveal>
                <div class="two-col-grid">
                    <div class="section-intro">
                        <span class="eyebrow">La soluci&oacute;n</span>
                        <h2>Una landing conectada a un sistema ligero de captaci&oacute;n.</h2>
                        <p>
                            No es solo una p&aacute;gina web. Es una experiencia dise&ntilde;ada para explicar tu oferta,
                            generar confianza, capturar datos y facilitar que tu equipo contin&uacute;e la
                            conversaci&oacute;n
                            por WhatsApp con mejor contexto.
                        </p>

                        <ul class="detail-list">
                            <li>El visitante entiende r&aacute;pido qu&eacute; ofreces.</li>
                            <li>Deja sus datos en un formulario corto y claro.</li>
                            <li>El prospecto queda registrado autom&aacute;ticamente.</li>
                            <li>El cliente recibe un correo de respuesta o confirmaci&oacute;n.</li>
                            <li>Tu equipo recibe la informaci&oacute;n para responder mejor.</li>
                            <li>La conversaci&oacute;n puede continuar por WhatsApp.</li>
                        </ul>
                    </div>

                    <div class="solution-stack">
                        <article>
                            <span>01</span>
                            <strong>Landing profesional</strong>
                            <p>Dise&ntilde;ada para cualquier comercio: servicios, beneficios, horarios, ubicaci&oacute;n y
                                llamadas a la acci&oacute;n.</p>
                        </article>

                        <article>
                            <span>02</span>
                            <strong>Formulario inteligente</strong>
                            <p>Captura nombre, WhatsApp, servicio de inter&eacute;s y mensaje para registrar el lead
                                correctamente.</p>
                        </article>

                        <article>
                            <span>03</span>
                            <strong>Correo autom&aacute;tico</strong>
                            <p>El prospecto recibe una respuesta inicial con confirmaci&oacute;n, informaci&oacute;n
                                b&aacute;sica o siguiente paso.</p>
                        </article>

                        <article>
                            <span>04</span>
                            <strong>Automatizaci&oacute;n</strong>
                            <p>Flujo con n8n para guardar datos, notificar al negocio y activar el seguimiento comercial.
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <section class="section process-section" id="como-funciona">
    <div class="shell">
        <div class="process-panel" data-reveal>
            <div class="section-intro section-intro--center process-intro">
                <span class="eyebrow">C&oacute;mo funciona</span>
                <h2>Del primer clic al seguimiento por WhatsApp, todo queda conectado.</h2>
                <p>
                    Primero capturamos los datos del prospecto con un formulario inteligente.
                    Despu&eacute;s, el sistema registra la informaci&oacute;n, env&iacute;a una respuesta autom&aacute;tica
                    y facilita que tu equipo contin&uacute;e el seguimiento.
                </p>
            </div>

            <div class="process-layout">
                <div class="process-timeline">
                    <article class="process-step" data-reveal>
                        <div class="process-step__marker">
                            <span>01</span>
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>

                        <div class="process-step__content">
                            <h3>El cliente llega a tu landing</h3>
                            <p>
                                Puede venir desde redes sociales, Google, anuncios, c&oacute;digos QR o recomendaciones.
                            </p>
                        </div>
                    </article>

                    <article class="process-step" data-reveal>
                        <div class="process-step__marker">
                            <span>02</span>
                            <i class="fa-solid fa-window-maximize"></i>
                        </div>

                        <div class="process-step__content">
                            <h3>Conoce tu oferta</h3>
                            <p>
                                La landing muestra servicios, beneficios, ubicaci&oacute;n, horarios, preguntas frecuentes
                                y razones para confiar.
                            </p>
                        </div>
                    </article>

                    <article class="process-step" data-reveal>
                        <div class="process-step__marker">
                            <span>03</span>
                            <i class="fa-solid fa-list-check"></i>
                        </div>

                        <div class="process-step__content">
                            <h3>Deja sus datos en el formulario</h3>
                            <p>
                                El prospecto comparte nombre, WhatsApp, servicio de inter&eacute;s y el mensaje o necesidad
                                que quiere resolver.
                            </p>
                        </div>
                    </article>

                    <article class="process-step" data-reveal>
                        <div class="process-step__marker">
                            <span>04</span>
                            <i class="fa-solid fa-database"></i>
                        </div>

                        <div class="process-step__content">
                            <h3>El sistema registra el lead</h3>
                            <p>
                                La automatizaci&oacute;n guarda la informaci&oacute;n en Google Sheets, Airtable, Notion,
                                HubSpot, Pipedrive, Kommo, Zoho, Monday u otra herramienta externa.
                            </p>
                        </div>
                    </article>

                    <article class="process-step" data-reveal>
                        <div class="process-step__marker">
                            <span>05</span>
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>

                        <div class="process-step__content">
                            <h3>El cliente recibe un correo autom&aacute;tico</h3>
                            <p>
                                Despu&eacute;s de enviar el formulario, recibe una respuesta inicial con confirmaci&oacute;n,
                                informaci&oacute;n importante o el siguiente paso.
                            </p>
                        </div>
                    </article>

                    <article class="process-step" data-reveal>
                        <div class="process-step__marker">
                            <span>06</span>
                            <i class="fa-solid fa-bell"></i>
                        </div>

                        <div class="process-step__content">
                            <h3>Tu equipo recibe aviso</h3>
                            <p>
                                El negocio recibe una notificaci&oacute;n con los datos del prospecto para responder m&aacute;s
                                r&aacute;pido y con mejor contexto.
                            </p>
                        </div>
                    </article>

                    <article class="process-step" data-reveal>
                        <div class="process-step__marker">
                            <span>07</span>
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>

                        <div class="process-step__content">
                            <h3>Contin&uacute;a el seguimiento por WhatsApp</h3>
                            <p>
                                Con el lead ya registrado, tu equipo puede continuar la conversaci&oacute;n sin perder
                                la informaci&oacute;n inicial.
                            </p>
                        </div>
                    </article>
                </div>

                <aside class="process-summary-card" data-reveal>
                    <span class="process-summary-card__label">Resultado del flujo</span>

                    <div class="process-summary-card__screen">
                        <div class="process-summary-card__top">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <div class="process-summary-card__status">
                            <i class="fa-solid fa-check"></i>
                            <div>
                                <strong>Lead registrado</strong>
                                <p>El sistema captur&oacute; los datos correctamente.</p>
                            </div>
                        </div>

                        <div class="process-summary-card__list">
                            <article>
                                <span>Nombre</span>
                                <strong>Prospecto nuevo</strong>
                            </article>

                            <article>
                                <span>Servicio de inter&eacute;s</span>
                                <strong>Cotizaci&oacute;n / Informaci&oacute;n</strong>
                            </article>

                            <article>
                                <span>Respuesta autom&aacute;tica</span>
                                <strong>Correo enviado</strong>
                            </article>

                            <article>
                                <span>Siguiente paso</span>
                                <strong>Seguimiento por WhatsApp</strong>
                            </article>
                        </div>
                    </div>

                    <div class="process-summary-card__actions">
                        <div>
                            <i class="fa-solid fa-database"></i>
                            <span>Registro en CRM externo</span>
                        </div>

                        <div>
                            <i class="fa-solid fa-envelope-open-text"></i>
                            <span>Correo de respuesta</span>
                        </div>

                        <div>
                            <i class="fa-brands fa-whatsapp"></i>
                            <span>Conversaci&oacute;n lista</span>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

    <section class="section">
        <div class="shell">
            <div class="flow-panel" data-reveal>
                <div class="section-intro section-intro--center">
                    <span class="eyebrow">Flujo del sistema</span>
                    <h2>Una ruta simple para captar datos antes de continuar la conversaci&oacute;n.</h2>
                </div>

                <div class="flow-map flow-map--six">
                    <article>
                        <i class="fa-solid fa-bullhorn"></i>
                        <strong>Redes / anuncios</strong>
                        <span>El cliente descubre tu negocio.</span>
                    </article>

                    <article>
                        <i class="fa-solid fa-window-maximize"></i>
                        <strong>Landing</strong>
                        <span>Conoce tus servicios y beneficios.</span>
                    </article>

                    <article>
                        <i class="fa-solid fa-list-check"></i>
                        <strong>Formulario</strong>
                        <span>Deja sus datos de contacto.</span>
                    </article>

                    <article>
                        <i class="fa-solid fa-gears"></i>
                        <strong>Automatizaci&oacute;n</strong>
                        <span>Se registra el prospecto.</span>
                    </article>

                    <article>
                        <i class="fa-solid fa-envelope-open-text"></i>
                        <strong>Correo autom&aacute;tico</strong>
                        <span>El cliente recibe confirmaci&oacute;n.</span>
                    </article>

                    <article>
                        <i class="fa-brands fa-whatsapp"></i>
                        <strong>WhatsApp</strong>
                        <span>Tu equipo da seguimiento.</span>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section " data-reveal>
                <span class="eyebrow">Qu&eacute; incluye</span>
                <h2 class="pt-5">Todo lo necesario para lanzar un sistema de captaci&oacute;n claro, profesional y operable.</h2>
                <p>
                    El producto est&aacute; dise&ntilde;ado para ser adaptable a cualquier comercio, pero con una estructura
                    suficientemente s&oacute;lida para vender, ordenar y dar seguimiento.
                </p>
            </div>

            <div class="card-grid grid-3">
                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-solid fa-palette"></i>
                    </div>
                    <h3>Dise&ntilde;o de landing</h3>
                    <p>Una p&aacute;gina visualmente profesional, responsive y enfocada en conversi&oacute;n.</p>
                </article>

                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-solid fa-pen-nib"></i>
                    </div>
                    <h3>Copy comercial</h3>
                    <p>Textos claros para explicar servicios, beneficios, confianza y llamada a la acci&oacute;n.</p>
                </article>

                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                    <h3>Formulario inteligente</h3>
                    <p>Campos pensados para capturar datos &uacute;tiles sin hacer pesado el proceso para el cliente.</p>
                </article>

                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <h3>Correo autom&aacute;tico</h3>
                    <p>Respuesta inicial para confirmar al prospecto que sus datos fueron recibidos correctamente.</p>
                </article>
                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <h3>Seguimiento por WhatsApp</h3>
                    <p>Despu&eacute;s del registro, tu equipo puede continuar la conversaci&oacute;n con mayor contexto.</p>
                </article>

                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-solid fa-diagram-project"></i>
                    </div>
                    <h3>Automatizaci&oacute;n con n8n</h3>
                    <p>Flujo configurado para recibir, registrar y enviar la informaci&oacute;n del prospecto.</p>
                </article>

                <article class="feature-card" data-reveal>
                    <div class="feature-card__icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3>Capacitaci&oacute;n b&aacute;sica</h3>
                    <p>Te explicamos c&oacute;mo revisar tus prospectos y c&oacute;mo dar seguimiento desde tu herramienta.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell two-col-grid">
            <div class="split-visual tool-visual-card tool-visual-card--image" data-reveal>
                <img src="{{ asset('img/conexion-n8n.png') }}"
                    alt="Diagrama visual de n8n conectado con Google Sheets, Airtable, CRM externo y notificaciones"
                    loading="lazy" />
            </div>

            <div class="section-intro" data-reveal>
                <span class="eyebrow">Integraciones</span>
                <h2>Conectamos el formulario a herramientas externas, sin obligarte a usar un CRM propio.</h2>
                <p>
                    &Oacute;rale Lead System Pro no incluye un CRM propio. En su lugar, conectamos la captura de prospectos
                    con herramientas que el negocio ya use o con una opci&oacute;n sencilla para empezar.
                </p>

                <ul class="detail-list">
                    <li>Google Sheets para registro simple y r&aacute;pido.</li>
                    <li>Airtable o Notion para bases m&aacute;s visuales.</li>
                    <li>HubSpot, Pipedrive, Kommo, Zoho o Monday seg&uacute;n el alcance.</li>
                    <li>Notificaciones internas para avisar al equipo comercial.</li>
                    <li>Redirecci&oacute;n o seguimiento por WhatsApp despu&eacute;s del registro.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro section-intro--center" data-reveal>
                <span class="eyebrow">Para qui&eacute;n es</span>
                <h2>Funciona para comercios que necesitan convertir inter&eacute;s en conversaciones reales.</h2>
                <p>
                    Su estructura es gen&eacute;rica, pero personalizable. Cambian textos, servicios, fotos, colores
                    secundarios
                    y campos del formulario; el sistema base se mantiene.
                </p>
            </div>

            <div class="industry-grid">
                <article data-reveal>
                    <i class="fa-solid fa-tooth"></i>
                    <span>Cl&iacute;nicas dentales</span>
                </article>

                <article data-reveal>
                    <i class="fa-solid fa-paw"></i>
                    <span>Veterinarias</span>
                </article>

                <article data-reveal>
                    <i class="fa-solid fa-scissors"></i>
                    <span>Est&eacute;ticas y barber&iacute;as</span>
                </article>

                <article data-reveal>
                    <i class="fa-solid fa-utensils"></i>
                    <span>Restaurantes</span>
                </article>

                <article data-reveal>
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span>Servicios t&eacute;cnicos</span>
                </article>

                <article data-reveal>
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <span>Escuelas y cursos</span>
                </article>

                <article data-reveal>
                    <i class="fa-solid fa-user-tie"></i>
                    <span>Consultores</span>
                </article>

                <article data-reveal>
                    <i class="fa-solid fa-store"></i>
                    <span>Negocios locales</span>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="pricing-feature-card" data-reveal>
                <div>
                    <span class="eyebrow">Inversi&oacute;n</span>
                    <h2>Un sistema listo para captar prospectos, no solo una p&aacute;gina publicada.</h2>
                    <p>
                        Creamos la landing, configuramos el formulario, conectamos la automatizaci&oacute;n y dejamos
                        una base operativa para que el negocio pueda responder mejor y dar seguimiento por WhatsApp.
                    </p>
                </div>

                <div class="pricing-feature-box">
                    <span>Implementaci&oacute;n desde</span>
                    <strong>$9,500 <small>+ IVA</small></strong>
                    <p>Landing + formulario inteligente + registro autom&aacute;tico + correo de respuesta + seguimiento por
                        WhatsApp.</p>
                    <hr>

                    <span>Mensualidad operativa desde</span>
                    <strong>$1,500 <small>+ IVA</small></strong>
                    <p>Operaci&oacute;n, monitoreo, mantenimiento b&aacute;sico y soporte.</p>

                    <a href="/contacto" class="btn btn-primary">Solicitar diagn&oacute;stico</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section faq-accordion-section">
        <div class="shell">
            <div class="section-intro section-intro--center" data-reveal>
                <span class="eyebrow">Preguntas frecuentes</span>
                <h2>Lo que normalmente pregunta un negocio antes de contratarlo.</h2>
                <p>
                    Resolvemos las dudas principales antes de implementar tu sistema de captaci&oacute;n,
                    automatizaci&oacute;n y seguimiento de prospectos.
                </p>
            </div>

            <div class="faq-accordion" data-reveal>
                <article class="faq-accordion__item is-open">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="true">
                        <span>&iquest;Esto es una landing page o un sistema?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <div class="faq-accordion__content">
                        <p>
                            Es una landing page conectada a un sistema de captaci&oacute;n. La p&aacute;gina atrae,
                            explica y genera confianza; el formulario captura los datos y la automatizaci&oacute;n
                            registra los prospectos para facilitar el seguimiento.
                        </p>
                    </div>
                </article>

                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Sirve para cualquier negocio?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <div class="faq-accordion__content">
                        <p>
                            S&iacute;. La estructura est&aacute; pensada para comercios, servicios profesionales,
                            cl&iacute;nicas, cursos, restaurantes, talleres, consultorios y negocios locales.
                            Cambia el contenido, pero el sistema base se mantiene.
                        </p>
                    </div>
                </article>

                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;C&oacute;mo se registra el prospecto?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <div class="faq-accordion__content">
                        <p>
                            El prospecto se registra cuando llena el formulario inteligente. Ese formulario env&iacute;a
                            los datos a la automatizaci&oacute;n, y la automatizaci&oacute;n los guarda en la herramienta
                            externa definida para el negocio.
                        </p>
                    </div>
                </article>

                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Qu&eacute; pasa si el cliente escribe directo por WhatsApp?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <div class="faq-accordion__content">
                        <p>
                            En la versi&oacute;n base, el registro autom&aacute;tico ocurre cuando el prospecto llena
                            el formulario. WhatsApp funciona como canal de seguimiento y conversaci&oacute;n. Si el negocio
                            necesita registrar conversaciones iniciadas directamente desde WhatsApp, se puede cotizar
                            una integraci&oacute;n avanzada con WhatsApp API.
                        </p>
                    </div>
                </article>

                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Incluye CRM propio?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <div class="faq-accordion__content">
                        <p>
                            No incluye CRM propio. El sistema se conecta con herramientas externas como
                            Google Sheets, Airtable, Notion, HubSpot, Pipedrive, Kommo, Zoho o Monday,
                            seg&uacute;n las necesidades y el alcance del proyecto.
                        </p>
                    </div>
                </article>

                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;La mensualidad es obligatoria?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <div class="faq-accordion__content">
                        <p>
                            S&iacute;, si quieres que &iexcl;&Oacute;rale Web! mantenga operando, monitoreando
                            y ajustando la automatizaci&oacute;n. La mensualidad cubre operaci&oacute;n,
                            soporte, mantenimiento b&aacute;sico y supervisi&oacute;n del sistema.
                        </p>
                    </div>
                </article>

                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Puedo usarlo con anuncios?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <div class="faq-accordion__content">
                        <p>
                            S&iacute;. De hecho, es ideal para enviar tr&aacute;fico desde Facebook Ads,
                            Instagram Ads, Google Ads, TikTok, campa&ntilde;as con c&oacute;digo QR
                            o publicaciones org&aacute;nicas.
                        </p>
                    </div>
                </article>

                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;Qu&eacute; necesita el cliente para empezar?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <div class="faq-accordion__content">
                        <p>
                            Se necesita la informaci&oacute;n principal del negocio: servicios, datos de contacto,
                            horarios, ubicaci&oacute;n, im&aacute;genes, redes sociales y claridad sobre c&oacute;mo
                            quiere recibir y dar seguimiento a sus prospectos.
                        </p>
                    </div>
                </article>

                <article class="faq-accordion__item">
                    <button class="faq-accordion__trigger" type="button" aria-expanded="false">
                        <span>&iquest;El cliente recibe alguna respuesta despu&eacute;s de llenar el formulario?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <div class="faq-accordion__content">
                        <p>
                            S&iacute;. Podemos configurar un correo autom&aacute;tico para confirmar que recibimos su
                            solicitud,
                            compartir informaci&oacute;n inicial o indicar el siguiente paso. Esto ayuda a que el prospecto
                            no sienta que envi&oacute; sus datos a una caja negra digital.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell cta-panel" data-reveal>
            <span class="eyebrow">Siguiente paso</span>
            <h2>Deja de recibir prospectos sueltos. Empieza a captarlos con estructura.</h2>
            <p>
                Creamos tu landing, configuramos el formulario, activamos el registro autom&aacute;tico
                y dejamos listo el seguimiento por WhatsApp para que tu negocio responda m&aacute;s r&aacute;pido
                y venda mejor.
            </p>
            <div class="dual-actions">
                <a href="/contacto" class="btn btn-primary">Quiero mi Lead System Pro</a>
                <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer"
                    class="btn btn-secondary">Hablar por WhatsApp</a>
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
