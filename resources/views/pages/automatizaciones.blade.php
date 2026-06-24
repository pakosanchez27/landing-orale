@extends('layouts.app')

@section('titulo', 'Automatizaciones para negocios')
@section('meta_description', 'Automatizamos tareas repetitivas, seguimiento de prospectos, registros y reportes para que tu negocio ahorre tiempo, reduzca errores y responda más rápido.')

@push('page-styles')
    @vite('resources/css/automatizaciones.css')
@endpush

@push('structured-data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Automatización de procesos para negocios',
            'provider' => ['@type' => 'Organization', 'name' => 'Orale Web'],
            'areaServed' => 'MX',
            'description' => 'Automatización de captación, seguimiento comercial, procesos administrativos, reportes e integración de herramientas.',
            'offers' => ['@type' => 'Offer', 'price' => '4500', 'priceCurrency' => 'MXN'],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="auto-hero">
        <div class="shell auto-hero__grid">
            <div class="auto-hero__copy" data-reveal>
                <span class="eyebrow">Automatización para negocios</span>
                <h1>Reduce tareas repetitivas y dedica más tiempo a <span class="gradient-text">hacer crecer tu negocio.</span></h1>
                <p>Automatizamos procesos para ayudarte a ahorrar tiempo, mejorar el seguimiento de clientes y reducir tareas manuales que consumen recursos todos los días.</p>
                <div class="dual-actions">
                    <a href="/contacto?servicio=automatizaciones" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="#ejemplos" class="btn btn-secondary">Ver ejemplos</a>
                </div>
                <div class="auto-hero__proof">
                    <span><i class="fa-regular fa-clock"></i> Ahorra tiempo</span>
                    <span><i class="fa-solid fa-shield-halved"></i> Reduce errores</span>
                    <span><i class="fa-solid fa-bolt"></i> Responde más rápido</span>
                </div>
            </div>

            <div class="auto-flow-visual" data-reveal aria-label="Ejemplo de flujo automatizado">
                @foreach ([
                    ['fa-rectangle-list', 'Formulario', 'Nuevo contacto'],
                    ['fa-whatsapp', 'WhatsApp', 'Respuesta inmediata', 'brands'],
                    ['fa-database', 'Registro', 'Información centralizada'],
                    ['fa-bell', 'Notificación', 'El equipo se entera'],
                    ['fa-list-check', 'Seguimiento', 'Nada se queda atrás'],
                ] as $index => $item)
                    <div class="auto-flow-node">
                        <i class="fa-{{ ($item[3] ?? null) === 'brands' ? 'brands' : 'solid' }} {{ $item[0] }}"></i>
                        <span><strong>{{ $item[1] }}</strong><small>{{ $item[2] }}</small></span>
                    </div>
                    @if (!$loop->last)<div class="auto-flow-line"><span></span><i class="fa-solid fa-chevron-down"></i></div>@endif
                @endforeach
                <div class="auto-flow-status"><span></span> Flujo activo</div>
            </div>
        </div>
    </section>

    <section class="section" id="problema">
        <div class="shell">
            <div class="section-intro auto-intro" data-reveal>
                <span class="eyebrow">Trabajo que no se ve</span>
                <h2>Muchas empresas siguen haciendo procesos que podrían ejecutarse automáticamente.</h2>
                <p>Cada día se pierden horas copiando datos, respondiendo mensajes, actualizando hojas de cálculo o moviendo información entre sistemas.</p>
            </div>
            <div class="auto-problem-grid">
                @foreach ([
                    ['fa-clock', 'Tareas repetitivas', 'Horas del equipo se van en acciones que se repiten igual cada día.'],
                    ['fa-copy', 'Información duplicada', 'Los mismos datos se capturan varias veces y en distintos lugares.'],
                    ['fa-user-clock', 'Seguimiento manual', 'Cada prospecto depende de que alguien recuerde el siguiente paso.'],
                    ['fa-comment-dots', 'Respuestas tardías', 'Las oportunidades se enfrían mientras esperan una respuesta.'],
                    ['fa-chart-column', 'Reportes lentos', 'Preparar información útil toma horas o incluso días.'],
                    ['fa-arrow-trend-up', 'Difícil de escalar', 'Más clientes significan más carga operativa y más posibilidades de error.'],
                ] as [$icon, $title, $text])
                    <article class="auto-problem-card" data-reveal><i class="fa-solid {{ $icon }}"></i><div><h3>{{ $title }}</h3><p>{{ $text }}</p></div></article>
                @endforeach
            </div>
            <p class="auto-closing" data-reveal>La automatización permite que tu equipo dedique menos tiempo a tareas operativas y más a actividades que generan valor.</p>
        </div>
    </section>

    <section class="section" id="soluciones">
        <div class="shell">
            <div class="section-intro auto-intro" data-reveal>
                <span class="eyebrow">¿Qué podemos automatizar?</span>
                <h2>Soluciones adaptadas a las necesidades de tu negocio.</h2>
                <p>No empezamos por una herramienta. Empezamos por la tarea que hoy te quita tiempo, genera errores o frena una oportunidad.</p>
            </div>
            <div class="auto-services-grid">
                @foreach ([
                    ['fa-magnet', 'Captación de prospectos', 'Recibe y organiza nuevos contactos sin copiar información manualmente.', ['Formularios', 'Landing pages', 'WhatsApp', 'CRM']],
                    ['fa-route', 'Seguimiento comercial', 'Haz que cada prospecto reciba atención y tenga un siguiente paso.', ['Recordatorios', 'Notificaciones', 'Asignación', 'Alertas']],
                    ['fa-clipboard-check', 'Procesos administrativos', 'Reduce tareas de captura y mantén tu información actualizada.', ['Registros', 'Bases de datos', 'Actualizaciones', 'Validaciones']],
                    ['fa-chart-pie', 'Reportes automáticos', 'Consulta información importante sin construir reportes a mano.', ['Ventas', 'Prospectos', 'Conversión', 'Rendimiento']],
                    ['fa-plug-circle-bolt', 'Integración de herramientas', 'Conecta plataformas que hoy trabajan por separado.', ['WhatsApp', 'Google Sheets', 'Airtable', 'CRM']],
                ] as $index => [$icon, $title, $text, $items])
                    <article class="auto-service-card {{ $index === 4 ? 'auto-service-card--wide' : '' }}" data-reveal>
                        <div class="auto-service-card__top"><span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span><i class="fa-solid {{ $icon }}"></i></div>
                        <h3>{{ $title }}</h3><p>{{ $text }}</p>
                        <ul>@foreach ($items as $item)<li><i class="fa-solid fa-check"></i>{{ $item }}</li>@endforeach</ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell auto-benefits" data-reveal>
            <div class="auto-benefits__copy"><span class="eyebrow">Beneficios</span><h2>¿Qué obtienes al automatizar?</h2><p>Una operación más ordenada no solo trabaja más rápido: también puede atender mejor y crecer con menos fricción.</p></div>
            <div class="auto-benefits__grid">
                @foreach ([['fa-clock','Menos tareas repetitivas'],['fa-clipboard-list','Procesos organizados'],['fa-mobile-screen','Mejor seguimiento'],['fa-database','Información centralizada'],['fa-bell-slash','Menos olvidos y errores'],['fa-arrow-trend-up','Mayor capacidad de crecimiento']] as [$icon,$label])
                    <div><i class="fa-solid {{ $icon }}"></i><span>{{ $label }}</span></div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" id="ejemplos">
        <div class="shell">
            <div class="section-intro auto-intro" data-reveal><span class="eyebrow">Casos de uso</span><h2>Automatizaciones para negocios reales.</h2><p>Ejemplos sencillos de cómo una solicitud puede convertirse en un proceso ordenado, sin depender de copiar y pegar.</p></div>
            <div class="use-cases-grid">
                @foreach ([
                    ['fa-tooth', 'Clínica dental', ['El paciente solicita información', 'Se registra automáticamente', 'El personal recibe una alerta', 'Se agenda el seguimiento']],
                    ['fa-paw', 'Veterinaria', ['Se recibe una consulta', 'Los datos quedan registrados', 'Se generan recordatorios', 'El seguimiento queda organizado']],
                    ['fa-briefcase', 'Consultoría', ['El prospecto llega por la landing', 'Entra al CRM', 'Se clasifica por interés', 'Se programa el contacto']],
                    ['fa-graduation-cap', 'Escuela', ['Se completa la inscripción', 'El registro se crea', 'El equipo recibe una notificación', 'Inicia el seguimiento']],
                ] as [$icon, $title, $steps])
                    <article class="use-case-card" data-reveal>
                        <div class="use-case-card__head"><i class="fa-solid {{ $icon }}"></i><h3>{{ $title }}</h3></div>
                        <ol>@foreach ($steps as $step)<li><span>{{ $loop->iteration }}</span>{{ $step }}</li>@endforeach</ol>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" id="calculadora">
        <div class="shell auto-calculator" data-reveal>
            <div class="auto-calculator__copy">
                <span class="eyebrow">Calculadora de tiempo perdido</span>
                <h2>¿Cuánto te está costando no automatizar?</h2>
                <p>Haz una estimación rápida del tiempo que tu equipo invierte cada mes en responder y registrar nuevos prospectos.</p>
                <div class="auto-calculator__note"><i class="fa-solid fa-circle-info"></i><span>Esta estimación es orientativa. En el diagnóstico revisamos el proceso real y qué porcentaje puede automatizarse de forma responsable.</span></div>
            </div>
            <form class="time-calculator" id="time-calculator">
                <label>¿Cuántos prospectos recibes al mes?<span><input type="number" id="calc-prospects" min="1" max="10000" value="120" inputmode="numeric"> prospectos</span></label>
                <label>¿Cuántos minutos dedicas a responder y registrar cada uno?<span><input type="number" id="calc-minutes" min="1" max="480" value="15" inputmode="numeric"> minutos</span></label>
                <label>¿Cuántas personas participan en el proceso?<span><input type="number" id="calc-people" min="1" max="100" value="1" inputmode="numeric"> personas</span></label>
                <div class="time-calculator__result" aria-live="polite">
                    <small>Tiempo potencialmente recuperable</small>
                    <strong><span id="calc-hours">20</span> horas <em>al mes</em></strong>
                    <p>Equivale aproximadamente a <b id="calc-days">2.5</b> jornadas laborales.</p>
                </div>
            </form>
        </div>
    </section>

    <section class="section" id="integraciones">
        <div class="shell">
            <div class="section-intro auto-intro auto-intro--center" data-reveal><span class="eyebrow">Integraciones</span><h2>Trabajamos con herramientas que probablemente ya utilizas.</h2><p>Podemos adaptar la automatización a las plataformas que ya forman parte de tu operación.</p></div>
            <div class="integration-cloud" data-reveal>
                @foreach ([['fa-whatsapp','WhatsApp','brands'],['fa-table','Google Sheets'],['fa-a','Airtable'],['fa-n','Notion'],['fa-hubspot','HubSpot','brands'],['fa-comments','Kommo'],['fa-chart-line','Pipedrive'],['fa-z','Zoho'],['fa-calendar-check','Monday'],['fa-envelope','Gmail'],['fa-calendar-days','Google Calendar']] as $tool)
                    <span><i class="fa-{{ ($tool[2] ?? null) === 'brands' ? 'brands' : 'solid' }} {{ $tool[0] }}"></i>{{ $tool[1] }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" id="proceso">
        <div class="shell">
            <div class="section-intro auto-intro" data-reveal><span class="eyebrow">Nuestro proceso</span><h2>Cómo implementamos una automatización.</h2><p>Mapeamos, probamos y documentamos antes de poner un flujo en operación.</p></div>
            <ol class="auto-process">
                @foreach ([['Diagnóstico','Identificamos tareas repetitivas y oportunidades.'],['Diseño del flujo','Definimos cómo funcionará el proceso.'],['Implementación','Configuramos integraciones y automatizaciones.'],['Pruebas','Validamos escenarios y excepciones reales.'],['Capacitación','Explicamos cómo utilizar la solución.'],['Soporte','Acompañamos la puesta en marcha.']] as $step => [$title,$text])
                    <li data-reveal><span>{{ str_pad($step + 1, 2, '0', STR_PAD_LEFT) }}</span><div><h3>{{ $title }}</h3><p>{{ $text }}</p></div></li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="section">
        <div class="shell auto-next-level" data-reveal>
            <div><span class="eyebrow">Cuando automatizar no basta</span><h2>Algunas veces una tarea es solo una parte del problema.</h2><p>El diagnóstico también permite detectar cuándo necesitas una solución más completa para centralizar información, gestionar prospectos o atender clientes.</p><a href="/contacto?motivo=diagnostico-automatizacion" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a></div>
            <div class="auto-next-level__options">
                <a href="/orale-lead-system-pro"><i class="fa-solid fa-star"></i><span><strong>Órale Lead System Pro</strong><small>Captación y seguimiento integral</small></span><i class="fa-solid fa-arrow-right"></i></a>
                <a href="{{ route('sitios-web') }}#soluciones"><i class="fa-solid fa-code"></i><span><strong>Sistema personalizado</strong><small>Procesos y funciones a medida</small></span><i class="fa-solid fa-arrow-right"></i></a>
                <span><i class="fa-solid fa-address-book"></i><span><strong>CRM</strong><small>Información comercial centralizada</small></span></span>
                <span><i class="fa-solid fa-robot"></i><span><strong>Asistente con IA</strong><small>Atención y apoyo inteligente</small></span></span>
            </div>
        </div>
    </section>

    <section class="section" id="inversion">
        <div class="shell auto-investment" data-reveal>
            <div class="auto-investment__copy"><span class="eyebrow">Inversión</span><h2>Cada proceso es diferente.</h2><p>La cotización depende de la complejidad, integraciones requeridas, número de procesos y herramientas involucradas.</p><ul><li>Complejidad del flujo</li><li>Integraciones necesarias</li><li>Número de procesos</li><li>Herramientas involucradas</li></ul></div>
            <div class="auto-investment__price"><span>Automatizaciones simples</span><small>Desde</small><strong>$4,500</strong><p>MXN + IVA</p><a href="/contacto?servicio=automatizacion&tipo=cotizacion" class="btn btn-primary btn-block">Solicitar cotización</a></div>
        </div>
    </section>

    <section class="section" id="preguntas">
        <div class="shell auto-faq-layout">
            <div class="section-intro" data-reveal><span class="eyebrow">Preguntas frecuentes</span><h2>Resolvamos las dudas más comunes.</h2><p>No necesitas saber de tecnología para comenzar. Nosotros traducimos tu proceso a una solución clara.</p></div>
            <div class="auto-faqs" data-reveal>
                @foreach ([
                    ['¿Qué es una automatización?', 'Es un proceso que permite que ciertas tareas se ejecuten automáticamente sin intervención manual constante.'],
                    ['¿Necesito cambiar mis herramientas?', 'No necesariamente. Primero revisamos las herramientas actuales y sus posibilidades de integración.'],
                    ['¿Pueden integrarse con mi CRM?', 'Sí, siempre que el CRM permita integración mediante sus funciones disponibles.'],
                    ['¿Necesito conocimientos técnicos?', 'No. Entregamos una solución operable y te capacitamos para utilizarla.'],
                    ['¿Puedo automatizar WhatsApp?', 'Sí, dependiendo del alcance, el tipo de cuenta y las herramientas utilizadas.'],
                    ['¿Incluye soporte?', 'Sí. Se contempla soporte inicial posterior a la implementación.'],
                ] as [$question,$answer])
                    <details><summary>{{ $question }}<i class="fa-solid fa-plus"></i></summary><p>{{ $answer }}</p></details>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell auto-final-cta" data-reveal>
            <span class="eyebrow">Empieza por una oportunidad real</span><h2>Descubre cuánto tiempo podrías ahorrar automatizando tus procesos.</h2><p>Solicita un diagnóstico y te ayudaremos a identificar oportunidades útiles para tu negocio.</p>
            <div class="dual-actions"><a href="/contacto?servicio=automatizaciones" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a><a href="https://wa.me/525512480210?text=Hola%2C%20quiero%20identificar%20oportunidades%20de%20automatizaci%C3%B3n%20en%20mi%20negocio" target="_blank" rel="noopener noreferrer" class="btn auto-whatsapp"><i class="fa-brands fa-whatsapp"></i> Hablar por WhatsApp</a></div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script>
        (() => {
            const form = document.getElementById('time-calculator');
            if (!form) return;
            const prospects = document.getElementById('calc-prospects');
            const minutes = document.getElementById('calc-minutes');
            const people = document.getElementById('calc-people');
            const hoursOutput = document.getElementById('calc-hours');
            const daysOutput = document.getElementById('calc-days');

            const calculate = () => {
                const monthlyProspects = Math.max(0, Number(prospects.value) || 0);
                const minutesPerProspect = Math.max(0, Number(minutes.value) || 0);
                const peopleInvolved = Math.max(1, Number(people.value) || 1);
                const recoverableHours = monthlyProspects * minutesPerProspect * peopleInvolved / 60 * 0.65;
                const roundedHours = Math.round(recoverableHours * 10) / 10;
                hoursOutput.textContent = new Intl.NumberFormat('es-MX', { maximumFractionDigits: 1 }).format(roundedHours);
                daysOutput.textContent = new Intl.NumberFormat('es-MX', { maximumFractionDigits: 1 }).format(roundedHours / 8);
            };

            form.addEventListener('input', calculate);
            calculate();
        })();
    </script>
@endpush
