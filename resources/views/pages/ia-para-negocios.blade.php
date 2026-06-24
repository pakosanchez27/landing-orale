@extends('layouts.app')

@section('titulo', 'Asistentes inteligentes para negocios')
@section('meta_description', 'Implementamos asistentes y soluciones de inteligencia artificial para responder consultas, organizar información y reducir tareas repetitivas en tu negocio.')

@push('page-styles')
    @vite('resources/css/ia-para-negocios.css')
@endpush

@push('structured-data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Asistentes inteligentes para negocios',
            'provider' => ['@type' => 'Organization', 'name' => 'Orale Web'],
            'areaServed' => 'MX',
            'description' => 'Implementación responsable de asistentes de IA, bases de conocimiento y automatizaciones inteligentes para negocios.',
            'offers' => ['@type' => 'Offer', 'price' => '5000', 'priceCurrency' => 'MXN'],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="ai-hero">
        <div class="shell ai-hero__grid">
            <div class="ai-hero__copy" data-reveal>
                <span class="eyebrow">Inteligencia artificial para negocios</span>
                <h1>Asistentes inteligentes que ayudan a tu negocio a <span class="gradient-text">responder, organizar y avanzar.</span></h1>
                <p>Implementamos soluciones de inteligencia artificial para atender consultas, organizar información, asistir procesos y reducir tareas repetitivas, siempre adaptadas a necesidades reales.</p>
                <div class="dual-actions">
                    <a href="/contacto?servicio=ia-para-negocios" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="#casos" class="btn btn-secondary">Ver casos de uso</a>
                </div>
                <div class="ai-hero__trust">
                    <span><i class="fa-solid fa-user-shield"></i> Con supervisión humana</span>
                    <span><i class="fa-solid fa-bullseye"></i> Objetivos claros</span>
                    <span><i class="fa-solid fa-puzzle-piece"></i> Adaptado a tu negocio</span>
                </div>
            </div>

            <div class="ai-assistant" data-reveal aria-label="Ejemplo de atención con un asistente inteligente">
                <div class="ai-assistant__top"><span class="ai-avatar"><i class="fa-solid fa-wand-magic-sparkles"></i></span><div><strong>Asistente de tu negocio</strong><small><i></i> Disponible para orientar</small></div><span class="ai-assistant__dots">•••</span></div>
                <div class="ai-assistant__chat">
                    <div class="ai-message ai-message--client"><small>Cliente</small><p>Hola, ¿qué servicios ofrecen y cómo puedo agendar?</p></div>
                    <div class="ai-message ai-message--bot"><small>Asistente</small><p>Con gusto. Puedo mostrarte los servicios y recopilar tus datos para que el equipo dé seguimiento.</p></div>
                    <div class="ai-assistant__actions"><span><i class="fa-solid fa-list"></i> Ver servicios</span><span><i class="fa-regular fa-calendar"></i> Solicitar cita</span></div>
                    <div class="ai-handoff"><i class="fa-solid fa-arrow-right-arrow-left"></i><span><strong>Transferencia inteligente</strong><small>El equipo recibe el contexto completo</small></span><i class="fa-solid fa-user-check"></i></div>
                </div>
                <div class="ai-assistant__badge"><i class="fa-solid fa-brain"></i><span><b>Información del negocio</b>Respuestas basadas en contenido aprobado</span></div>
            </div>
        </div>
    </section>

    <section class="section" id="problema">
        <div class="shell">
            <div class="section-intro ai-intro" data-reveal><span class="eyebrow">El punto de partida</span><h2>Muchos negocios quieren usar IA, pero no saben por dónde empezar.</h2><p>Implementarla sin estrategia suele generar frustración, costos innecesarios y expectativas poco realistas.</p></div>
            <div class="ai-problem-grid">
                @foreach ([
                    ['fa-mobile-screen', 'Atender mensajes consume tiempo', 'El equipo responde las mismas consultas una y otra vez.'],
                    ['fa-folder-tree', 'La información está dispersa', 'Documentos, respuestas y procesos viven en lugares diferentes.'],
                    ['fa-comments', 'Las preguntas se repiten', 'Horarios, servicios y requisitos ocupan gran parte de la atención.'],
                    ['fa-calendar-xmark', 'Se pierden oportunidades', 'Una respuesta tardía puede enfriar el interés de un prospecto.'],
                    ['fa-people-group', 'El equipo carga con lo operativo', 'Queda menos tiempo para decisiones y atención especializada.'],
                    ['fa-book-open', 'No hay una base de conocimiento', 'Las respuestas cambian según quién atiende o dónde busca.'],
                ] as [$icon,$title,$text])
                    <article class="ai-problem-card" data-reveal><i class="fa-solid {{ $icon }}"></i><div><h3>{{ $title }}</h3><p>{{ $text }}</p></div></article>
                @endforeach
            </div>
            <div class="ai-principle" data-reveal><i class="fa-solid fa-quote-left"></i><p>La IA no sustituye tu negocio. Puede ayudar a tu equipo a trabajar de forma más eficiente.</p></div>
        </div>
    </section>

    <section class="section" id="aplicaciones">
        <div class="shell">
            <div class="section-intro ai-intro" data-reveal><span class="eyebrow">Aplicaciones prácticas</span><h2>¿Qué podemos hacer con inteligencia artificial?</h2><p>Partimos de una necesidad concreta y diseñamos una solución que tenga sentido dentro de tu operación.</p></div>
            <div class="ai-applications">
                @foreach ([
                    ['fa-whatsapp', 'Asistentes para WhatsApp', 'Responden consultas frecuentes, recopilan información y facilitan el primer contacto.', ['Horarios', 'Servicios', 'Ubicación', 'Calificación inicial'], 'brands'],
                    ['fa-user-plus', 'Atención de prospectos', 'Recopilan información útil antes de que intervenga una persona.', ['Solicitudes', 'Cotizaciones iniciales', 'Captura de datos', 'Contexto del prospecto']],
                    ['fa-book-atlas', 'Base de conocimiento inteligente', 'Consulta documentos y contenido aprobado para responder de forma consistente.', ['Manuales', 'Políticas', 'Servicios', 'Catálogos']],
                    ['fa-gears', 'Automatización inteligente', 'Combina IA con procesos para clasificar, resumir y mover información.', ['Clasificación de leads', 'Respuestas iniciales', 'Resúmenes', 'Procesamiento de datos']],
                ] as $index => $item)
                    <article class="ai-application-card" data-reveal>
                        <div class="ai-application-card__head"><span>0{{ $index + 1 }}</span><i class="fa-{{ ($item[4] ?? null) === 'brands' ? 'brands' : 'solid' }} {{ $item[0] }}"></i></div>
                        <h3>{{ $item[1] }}</h3><p>{{ $item[2] }}</p>
                        <ul>@foreach ($item[3] as $case)<li><i class="fa-solid fa-check"></i>{{ $case }}</li>@endforeach</ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" id="limites">
        <div class="shell ai-reality" data-reveal>
            <div class="ai-reality__heading"><span class="eyebrow">IA sin humo</span><h2>Lo que la IA sí hace y lo que no.</h2><p>Una implementación responsable empieza por definir capacidades, límites y momentos donde debe intervenir una persona.</p></div>
            <div class="ai-reality__columns">
                <div class="ai-reality__yes"><h3><i class="fa-solid fa-circle-check"></i> Sí puede ayudar a</h3><ul><li>Responder consultas frecuentes</li><li>Organizar información</li><li>Clasificar solicitudes</li><li>Generar contenido inicial</li><li>Facilitar tareas repetitivas</li></ul></div>
                <div class="ai-reality__no"><h3><i class="fa-solid fa-circle-xmark"></i> No puede garantizar</h3><ul><li>Ventas automáticas</li><li>Reemplazar completamente al equipo</li><li>Comprender todos los contextos</li><li>Resolver cualquier situación sin supervisión</li><li>Operar sin revisión ni mejora</li></ul></div>
            </div>
            <p class="ai-reality__statement"><i class="fa-solid fa-shield-heart"></i> Creemos en implementar inteligencia artificial de forma responsable y enfocada en resultados reales.</p>
        </div>
    </section>

    <section class="section" id="soluciones">
        <div class="shell">
            <div class="section-intro ai-intro" data-reveal><span class="eyebrow">Soluciones disponibles</span><h2>Una solución para cada nivel de necesidad.</h2><p>Desde una atención inicial bien delimitada hasta una herramienta conectada con varios procesos.</p></div>
            <div class="ai-solutions-grid">
                @foreach ([
                    ['fa-whatsapp','Asistente IA para WhatsApp','Atención inicial, orientación y preguntas frecuentes.','brands'],
                    ['fa-filter-circle-dollar','Agente de captación','Recopila datos y prepara el contexto para el seguimiento.'],
                    ['fa-book-open-reader','Base de conocimiento','Permite consultar información de forma rápida y organizada.'],
                    ['fa-diagram-project','IA + automatización','Conecta decisiones inteligentes con acciones automáticas.'],
                    ['fa-code','Solución personalizada','Diseñada según procesos y necesidades específicas.'],
                ] as $solution)
                    <article class="ai-solution-card" data-reveal><i class="fa-{{ ($solution[3] ?? null) === 'brands' ? 'brands' : 'solid' }} {{ $solution[0] }}"></i><div><h3>{{ $solution[1] }}</h3><p>{{ $solution[2] }}</p></div></article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" id="casos">
        <div class="shell">
            <div class="section-intro ai-intro ai-intro--center" data-reveal><span class="eyebrow">Casos de uso</span><h2>Ejemplos de asistentes en negocios reales.</h2><p>La utilidad está en resolver una necesidad concreta, no en añadir IA porque está de moda.</p></div>
            <div class="ai-use-cases">
                @foreach ([
                    ['fa-tooth','Clínica dental','Responde preguntas frecuentes sobre tratamientos, requisitos y horarios.'],
                    ['fa-paw','Veterinaria','Brinda información sobre servicios y facilita la solicitud de una consulta.'],
                    ['fa-graduation-cap','Escuela','Atiende dudas iniciales y recopila datos de inscripción.'],
                    ['fa-briefcase','Consultoría','Califica prospectos antes de una reunión con el especialista.'],
                    ['fa-store','Negocio local','Responde preguntas comunes y facilita el contacto con una persona.'],
                ] as [$icon,$title,$text])
                    <article data-reveal><i class="fa-solid {{ $icon }}"></i><h3>{{ $title }}</h3><p>{{ $text }}</p><span>Asistente + equipo <i class="fa-solid fa-arrow-right"></i></span></article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" id="integraciones">
        <div class="shell ai-integrations" data-reveal>
            <div><span class="eyebrow">Integraciones</span><h2>La IA puede trabajar con las herramientas que ya utilizas.</h2><p>Conectamos información y procesos para que el asistente no funcione como una pieza aislada.</p></div>
            <div class="ai-tool-cloud">
                @foreach ([['fa-whatsapp','WhatsApp','brands'],['fa-address-book','CRM'],['fa-table','Google Sheets'],['fa-a','Airtable'],['fa-n','Notion'],['fa-hubspot','HubSpot','brands'],['fa-chart-line','Pipedrive'],['fa-envelope','Gmail'],['fa-calendar-days','Google Calendar']] as $tool)
                    <span><i class="fa-{{ ($tool[2] ?? null) === 'brands' ? 'brands' : 'solid' }} {{ $tool[0] }}"></i>{{ $tool[1] }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" id="proceso">
        <div class="shell">
            <div class="section-intro ai-intro" data-reveal><span class="eyebrow">Nuestro proceso</span><h2>Cómo implementamos una solución con IA.</h2><p>La calidad depende tanto de la información y las pruebas como de la tecnología.</p></div>
            <ol class="ai-process">
                @foreach ([['Diagnóstico','Identificamos oportunidades reales.'],['Diseño','Definimos objetivos, límites y alcance.'],['Configuración','Preparamos la información necesaria.'],['Integración','Conectamos herramientas y procesos.'],['Pruebas','Validamos respuestas y distintos escenarios.'],['Capacitación','Explicamos cómo usar y supervisar la solución.'],['Mejora continua','Ajustamos según el uso real.']] as $step => [$title,$text])
                    <li data-reveal><span>{{ str_pad($step + 1, 2, '0', STR_PAD_LEFT) }}</span><div><h3>{{ $title }}</h3><p>{{ $text }}</p></div></li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="section">
        <div class="shell ai-right-tool" data-reveal>
            <div><span class="eyebrow">La herramienta adecuada</span><h2>No todos los problemas se resuelven con inteligencia artificial.</h2><p>En algunos casos una automatización, una landing de captación o un sistema personalizado puede ser una alternativa más simple y efectiva. Nuestro trabajo es ayudarte a identificarlo.</p><a href="/contacto?motivo=diagnostico-ia" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a></div>
            <div class="ai-right-tool__paths">
                <a href="{{ route('automatizaciones') }}"><i class="fa-solid fa-gears"></i><span><strong>Automatización</strong><small>Para tareas y flujos repetitivos</small></span><i class="fa-solid fa-arrow-right"></i></a>
                <a href="{{ route('sitios-web') }}"><i class="fa-solid fa-window-maximize"></i><span><strong>Landing o sitio web</strong><small>Para presencia y captación</small></span><i class="fa-solid fa-arrow-right"></i></a>
                <a href="{{ route('sitios-web') }}#soluciones"><i class="fa-solid fa-code"></i><span><strong>Sistema personalizado</strong><small>Para procesos específicos</small></span><i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <section class="section" id="inversion">
        <div class="shell ai-investment" data-reveal>
            <div><span class="eyebrow">Inversión</span><h2>Cada implementación es diferente.</h2><p>El costo depende del alcance, integraciones, volumen de información, número de procesos y nivel de personalización.</p><ul><li>Alcance y objetivos</li><li>Integraciones necesarias</li><li>Volumen de información</li><li>Número de procesos</li><li>Nivel de personalización</li></ul></div>
            <aside><span>Implementaciones de IA</span><small>Desde</small><strong>$5,000</strong><p>MXN + IVA</p><a href="/contacto?servicio=ia&tipo=cotizacion" class="btn btn-primary btn-block">Solicitar cotización</a></aside>
        </div>
    </section>

    <section class="section" id="preguntas">
        <div class="shell ai-faq-layout">
            <div class="section-intro" data-reveal><span class="eyebrow">Preguntas frecuentes</span><h2>IA explicada sin complicaciones.</h2><p>Te ayudamos a entender qué implica la solución antes de decidir.</p></div>
            <div class="ai-faqs" data-reveal>
                @foreach ([
                    ['¿Necesito conocimientos técnicos?', 'No. Diseñamos la solución para que tu equipo pueda utilizarla y supervisarla con una capacitación clara.'],
                    ['¿La IA reemplazará a mi equipo?', 'No. Está pensada para asistir procesos, reducir carga operativa y entregar contexto a las personas.'],
                    ['¿Funciona con WhatsApp?', 'Sí, dependiendo del alcance, el tipo de cuenta y las herramientas utilizadas.'],
                    ['¿Puede aprender sobre mi negocio?', 'Puede utilizar documentación, preguntas frecuentes y procesos definidos para responder con información aprobada.'],
                    ['¿Puedo conectarla con mi CRM?', 'Sí, siempre que el CRM cuente con opciones de integración compatibles.'],
                    ['¿Tiene costos mensuales?', 'Puede haber costos asociados a herramientas, infraestructura o consumo de modelos de inteligencia artificial. Se explican antes de implementar.'],
                ] as [$question,$answer])
                    <details><summary>{{ $question }}<i class="fa-solid fa-plus"></i></summary><p>{{ $answer }}</p></details>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell ai-final-cta" data-reveal>
            <span class="eyebrow">IA con un propósito claro</span><h2>Descubre cómo un asistente inteligente puede ayudar a tu negocio a trabajar mejor.</h2><p>Solicita un diagnóstico y analizaremos qué oportunidades tienen sentido para tu operación.</p>
            <div class="dual-actions"><a href="/contacto?servicio=ia-para-negocios" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a><a href="https://wa.me/525512480210?text=Hola%2C%20quiero%20saber%20c%C3%B3mo%20un%20asistente%20inteligente%20puede%20ayudar%20a%20mi%20negocio" target="_blank" rel="noopener noreferrer" class="btn ai-whatsapp"><i class="fa-brands fa-whatsapp"></i> Hablar por WhatsApp</a></div>
        </div>
    </section>
@endsection
