@extends('layouts.app')

@section('titulo', 'Sitios web profesionales para negocios')
@section('meta_description', 'Creamos sitios web rápidos, modernos y estratégicos que comunican el valor de tu negocio, generan confianza y facilitan el contacto con clientes.')

@push('page-styles')
    @vite('resources/css/sitios-web.css')
@endpush

@push('structured-data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Diseño y desarrollo de sitios web profesionales',
            'provider' => ['@type' => 'Organization', 'name' => 'Orale Web'],
            'areaServed' => 'MX',
            'description' => 'Diseño y desarrollo de landing pages, sitios web profesionales y sistemas web personalizados para negocios.',
            'offers' => [
                ['@type' => 'Offer', 'name' => 'Sitio web Básico', 'price' => '3500', 'priceCurrency' => 'MXN'],
                ['@type' => 'Offer', 'name' => 'Sitio web Profesional', 'price' => '5500', 'priceCurrency' => 'MXN'],
            ],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="web-hero">
        <div class="shell web-hero__grid">
            <div class="web-hero__copy" data-reveal>
                <span class="eyebrow">Soluciones web para negocios</span>
                <h1>Sitios web profesionales diseñados para <span class="gradient-text">generar confianza</span> y facilitar el contacto.</h1>
                <p>Tu sitio web suele ser el primer lugar donde un cliente potencial decide si confiar en tu negocio. Creamos experiencias rápidas, modernas y pensadas para comunicar tu propuesta de valor con claridad.</p>
                <div class="dual-actions">
                    <a href="/contacto?servicio=sitio-web" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="#paquetes" class="btn btn-secondary">Ver paquetes</a>
                </div>
                <div class="web-hero__trust" aria-label="Beneficios incluidos">
                    <span><i class="fa-solid fa-mobile-screen-button"></i> Responsive</span>
                    <span><i class="fa-solid fa-gauge-high"></i> Rápido</span>
                    <span><i class="fa-solid fa-magnifying-glass"></i> SEO técnico</span>
                </div>
            </div>

            <div class="browser-stage" data-reveal aria-hidden="true">
                <div class="browser-card">
                    <div class="browser-card__bar"><span></span><span></span><span></span><small>tu-negocio.mx</small></div>
                    <div class="browser-card__body">
                        <div class="browser-card__nav"><b>Tu marca</b><span></span><span></span><span></span></div>
                        <div class="browser-card__content">
                            <div>
                                <span class="browser-card__pill"></span>
                                <strong>Una propuesta clara desde el primer vistazo.</strong>
                                <p></p><p></p>
                                <button>Hablemos</button>
                            </div>
                            <div class="browser-card__art"><i class="fa-solid fa-arrow-trend-up"></i></div>
                        </div>
                    </div>
                </div>
                <div class="stage-note stage-note--top"><i class="fa-solid fa-bolt"></i><span><b>Carga veloz</b>Experiencia fluida</span></div>
                <div class="stage-note stage-note--bottom"><i class="fa-brands fa-whatsapp"></i><span><b>Contacto visible</b>Menos pasos para conversar</span></div>
            </div>
        </div>
    </section>

    <section class="section" id="problema">
        <div class="shell">
            <div class="section-intro web-intro" data-reveal>
                <span class="eyebrow">El problema</span>
                <h2>Tener una página web no siempre es suficiente.</h2>
                <p>Muchos negocios ya cuentan con una, pero sigue sin ayudarles a comunicar, generar confianza o iniciar conversaciones.</p>
            </div>
            <div class="problem-grid">
                @foreach ([
                    ['fa-chart-line', 'No recibe contactos', 'Las visitas llegan, pero no encuentran un siguiente paso claro.'],
                    ['fa-mobile-screen', 'Falla en celular', 'La experiencia se rompe justo donde navega la mayoría.'],
                    ['fa-hourglass-half', 'Carga demasiado lento', 'Cada segundo de espera aumenta la posibilidad de abandono.'],
                    ['fa-message', 'No explica sus servicios', 'El visitante no entiende rápido qué haces ni por qué elegirte.'],
                    ['fa-phone-slash', 'Dificulta el contacto', 'WhatsApp y formularios están ocultos o piden demasiados datos.'],
                    ['fa-magnifying-glass', 'Tiene poca visibilidad', 'No cuenta con una base técnica adecuada para buscadores.'],
                ] as [$icon, $title, $text])
                    <article class="problem-card" data-reveal>
                        <i class="fa-solid {{ $icon }}"></i>
                        <div><h3>{{ $title }}</h3><p>{{ $text }}</p></div>
                    </article>
                @endforeach
            </div>
            <p class="problem-closing" data-reveal>Una página web debería ayudarte a comunicar mejor tu negocio y facilitar que los clientes den el siguiente paso.</p>
        </div>
    </section>

    <section class="section">
        <div class="shell difference-panel" data-reveal>
            <div class="difference-panel__heading">
                <span class="eyebrow">Nuestra diferencia</span>
                <h2>Más que diseño, construimos sitios pensados para objetivos reales.</h2>
                <p>Cada decisión visual y técnica tiene un propósito dentro de la experiencia del cliente.</p>
            </div>
            <div class="comparison">
                <div class="comparison__column comparison__column--muted">
                    <h3><i class="fa-regular fa-window-maximize"></i> Sitio tradicional</h3>
                    <ul>
                        <li>Solo muestra información</li><li>Diseño genérico</li><li>Sin estrategia</li>
                        <li>Contacto difícil de encontrar</li><li>Sin optimización móvil</li><li>Entrega básica</li>
                    </ul>
                </div>
                <div class="comparison__column comparison__column--brand">
                    <h3><i class="fa-solid fa-wand-magic-sparkles"></i> Sitio por ¡Órale Web!</h3>
                    <ul>
                        <li>Comunica una propuesta clara</li><li>Diseño adaptado al negocio</li><li>Orientado a objetivos</li>
                        <li>WhatsApp y formularios visibles</li><li>Optimizado para móviles</li><li>Capacitación y soporte inicial</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="soluciones">
        <div class="shell">
            <div class="section-intro web-intro" data-reveal>
                <span class="eyebrow">Soluciones web</span>
                <h2>Elige la solución que mejor se adapte a tu negocio.</h2>
                <p>No todos los proyectos necesitan lo mismo. Empezamos por el objetivo y construimos solo lo necesario.</p>
            </div>
            <div class="solutions-grid">
                <article class="solution-card" data-reveal>
                    <div class="solution-card__number">01</div><div class="solution-card__icon"><i class="fa-solid fa-window-maximize"></i></div>
                    <span class="solution-card__label">Presencia enfocada</span><h3>Landing Page</h3>
                    <p>Ideal para negocios que necesitan una presencia profesional enfocada en generar contactos.</p>
                    <ul class="check-list"><li>Diseño personalizado</li><li>Responsive</li><li>Formulario y WhatsApp</li><li>SEO técnico básico</li></ul>
                    <div class="solution-card__result"><small>Resultado esperado</small><strong>Convertir visitantes en contactos.</strong></div>
                </article>
                <article class="solution-card solution-card--featured" data-reveal>
                    <div class="solution-card__number">02</div><div class="solution-card__icon"><i class="fa-solid fa-layer-group"></i></div>
                    <span class="solution-card__label ">Presencia completa</span><h3>Sitio Web Profesional</h3>
                    <p>Ideal para empresas que necesitan presentar información más completa y construir credibilidad.</p>
                    <ul class="check-list"><li>Varias páginas</li><li>Blog administrable</li><li>Formularios avanzados</li><li>Estructura escalable</li></ul>
                    <div class="solution-card__result"><small>Resultado esperado</small><strong>Fortalecer presencia y credibilidad.</strong></div>
                </article>
                <article class="solution-card" data-reveal>
                    <div class="solution-card__number">03</div><div class="solution-card__icon"><i class="fa-solid fa-code"></i></div>
                    <span class="solution-card__label">Solución a medida</span><h3>Sistema Web Personalizado</h3>
                    <p>Para negocios que requieren funciones específicas, procesos internos o herramientas personalizadas.</p>
                    <ul class="check-list"><li>Arquitectura a medida</li><li>Roles y paneles</li><li>Integraciones especiales</li><li>Desarrollo según requerimientos</li></ul>
                    <div class="solution-card__result"><small>Resultado esperado</small><strong>Automatizar y mejorar la operación.</strong></div>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell needs-panel" data-reveal>
            <div>
                <span class="eyebrow">¿No estás seguro?</span>
                <h2>Algunas veces un sitio web es suficiente. Otras veces necesitas algo más.</h2>
                <p>Durante el diagnóstico analizamos tus objetivos y te ayudamos a identificar el alcance correcto, sin venderte complejidad que no necesitas.</p>
                <a href="/contacto?motivo=diagnostico" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="needs-panel__options">
                <span><i class="fa-solid fa-window-maximize"></i> Landing page</span>
                <span><i class="fa-solid fa-globe"></i> Sitio profesional</span>
                <span><i class="fa-solid fa-code"></i> Sistema personalizado</span>
                <a href="{{ route('automatizaciones') }}"><i class="fa-solid fa-gears"></i> Automatizaciones <i class="fa-solid fa-arrow-right"></i></a>
                <a href="/orale-lead-system-pro"><i class="fa-solid fa-star"></i> Órale Lead System Pro <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <section class="section" id="proceso">
        <div class="shell">
            <div class="section-intro web-intro" data-reveal><span class="eyebrow">Nuestro proceso</span><h2>Así desarrollamos tu proyecto.</h2><p>Un proceso claro, acompañado y sin cajas negras.</p></div>
            <ol class="process-grid">
                @foreach ([
                    ['Diagnóstico', 'Conocemos tu negocio y objetivos.'], ['Planeación', 'Definimos estructura y alcance.'],
                    ['Diseño', 'Creamos una propuesta alineada a tu marca.'], ['Desarrollo', 'Construimos y optimizamos el sitio.'],
                    ['Revisión', 'Realizamos ajustes y validaciones.'], ['Entrega', 'Publicamos el proyecto.'],
                    ['Capacitación', 'Te mostramos cómo administrarlo.'], ['Soporte', 'Te acompañamos después de la entrega.'],
                ] as $step => [$title, $text])
                    <li data-reveal><span>{{ str_pad($step + 1, 2, '0', STR_PAD_LEFT) }}</span><div><h3>{{ $title }}</h3><p>{{ $text }}</p></div></li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="section">
        <div class="shell honest-panel" data-reveal>
            <div class="honest-panel__icon"><i class="fa-solid fa-compass"></i></div>
            <div><span class="eyebrow">Expectativas claras</span><h2>¿Qué resultados puedes esperar de un sitio web?</h2><p>Un sitio web por sí solo no garantiza ventas. Sin embargo, puede ayudarte a comunicar mejor tu oferta, generar confianza, facilitar el contacto y servir como base para estrategias de posicionamiento, publicidad y captación de prospectos.</p></div>
        </div>
    </section>

    <section class="section">
        <div class="shell included-panel" data-reveal>
            <div class="included-panel__copy"><span class="eyebrow">La base de cada proyecto</span><h2>Todo proyecto incluye lo esencial para salir bien.</h2><p>No tratamos la experiencia móvil, el contacto o la calidad técnica como extras.</p></div>
            <ul class="included-list">
                <li><i class="fa-solid fa-check"></i> Diseño responsive</li><li><i class="fa-solid fa-check"></i> Optimización para móviles</li>
                <li><i class="fa-solid fa-check"></i> Integración de WhatsApp</li><li><i class="fa-solid fa-check"></i> Formularios de contacto</li>
                <li><i class="fa-solid fa-check"></i> SEO técnico básico</li><li><i class="fa-solid fa-check"></i> Capacitación inicial</li>
                <li><i class="fa-solid fa-check"></i> Soporte posterior a la entrega</li>
            </ul>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro web-intro" data-reveal><span class="eyebrow">Casos ideales</span><h2>Trabajamos con distintos tipos de negocio.</h2></div>
            <div class="industry-list" data-reveal>
                @foreach ([['fa-house-medical','Clínicas'],['fa-paw','Veterinarias'],['fa-scissors','Estéticas'],['fa-scale-balanced','Despachos'],['fa-compass-drafting','Arquitectos'],['fa-graduation-cap','Escuelas'],['fa-utensils','Restaurantes'],['fa-briefcase','Consultores'],['fa-store','Negocios locales']] as [$icon,$label])
                    <span><i class="fa-solid {{ $icon }}"></i>{{ $label }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" id="paquetes">
        <div class="shell">
            <div class="section-intro web-intro web-intro--center" data-reveal><span class="eyebrow">Paquetes</span><h2>Opciones para diferentes etapas de crecimiento.</h2><p>Precios de referencia claros para comenzar la conversación.</p></div>
            <div class="web-pricing-grid">
                <article class="web-price-card" data-reveal><span class="web-price-card__tag">Básico</span><h3>Una presencia profesional para comenzar.</h3><p class="web-price"><small>Desde</small>$3,500 <span>MXN + IVA</span></p><ul class="check-list"><li>One Page</li><li>Hasta 5 secciones</li><li>Diseño responsive</li><li>Formulario y WhatsApp</li><li>SEO técnico básico</li></ul><a href="/contacto?paquete=basico" class="btn btn-secondary btn-block">Elegir Básico</a></article>
                <article class="web-price-card web-price-card--featured" data-reveal><span class="web-price-card__badge">Más completo</span><span class="web-price-card__tag">Profesional</span><h3>Para comunicar más y seguir creciendo.</h3><p class="web-price"><small>Desde</small>$5,500 <span>MXN + IVA</span></p><ul class="check-list"><li>Hasta 5 páginas</li><li>Blog administrable</li><li>Formularios avanzados</li><li>Optimización SEO inicial</li><li>Soporte extendido</li></ul><a href="/contacto?paquete=profesional" class="btn btn-primary btn-block">Elegir Profesional</a></article>
                <article class="web-price-card" data-reveal><span class="web-price-card__tag">Personalizado</span><h3>Cuando tu proyecto necesita algo único.</h3><p class="web-price web-price--quote">Cotización <span>según alcance</span></p><ul class="check-list"><li>Alcance a la medida</li><li>Funciones específicas</li><li>Integraciones especiales</li><li>Procesos internos</li><li>Arquitectura escalable</li></ul><a href="/contacto?paquete=personalizado" class="btn btn-secondary btn-block">Cotizar proyecto</a></article>
            </div>
            <div class="compare-link" data-reveal><span>¿Quieres revisar cada característica?</span><a href="/paquetes">Comparar paquetes <i class="fa-solid fa-arrow-right"></i></a></div>
        </div>
    </section>

    <section class="section" id="preguntas">
        <div class="shell faq-layout">
            <div class="section-intro" data-reveal><span class="eyebrow">Preguntas frecuentes</span><h2>Lo que necesitas saber antes de comenzar.</h2><p>Si tu duda no aparece aquí, escríbenos. Te respondemos con claridad y sin compromiso.</p><a href="/contacto" class="btn btn-secondary">Hacer otra pregunta</a></div>
            <div class="web-faqs" data-reveal>
                @foreach ([
                    ['¿Cuánto tarda un proyecto?', 'Depende del alcance, pero la mayoría de los sitios web se desarrollan entre una y tres semanas.'],
                    ['¿Necesito dominio y hosting?', 'Sí. Si todavía no los tienes, podemos ayudarte a elegirlos y gestionarlos.'],
                    ['¿Incluye diseño?', 'Sí. El diseño se desarrolla de acuerdo con la identidad, los objetivos y las necesidades de tu negocio.'],
                    ['¿Incluye textos?', 'Podemos apoyarte en la generación, estructura y optimización del contenido.'],
                    ['¿Puedo solicitar cambios?', 'Sí. Se contemplan rondas de revisión dentro del alcance acordado al inicio.'],
                    ['¿Puedo pagar por partes?', 'Sí. Manejamos esquemas de pago por etapas, definidos antes de iniciar.'],
                ] as [$question, $answer])
                    <details><summary>{{ $question }}<i class="fa-solid fa-plus"></i></summary><p>{{ $answer }}</p></details>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell web-final-cta" data-reveal>
            <span class="eyebrow">El siguiente paso</span>
            <h2>Cuéntanos qué necesitas y encontraremos la mejor solución para tu negocio.</h2>
            <p>Ya sea una landing page, un sitio profesional o una solución más avanzada, podemos ayudarte a identificar el camino adecuado.</p>
            <div class="dual-actions"><a href="/contacto?motivo=diagnostico" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a><a href="https://wa.me/525512480210?text=Hola%2C%20quiero%20informaci%C3%B3n%20sobre%20un%20sitio%20web" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp"><i class="fa-brands fa-whatsapp"></i> Hablar por WhatsApp</a></div>
        </div>
    </section>
@endsection
