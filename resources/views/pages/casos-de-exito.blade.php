@extends('layouts.app')

@section('titulo', 'Casos de éxito y proyectos')
@section('meta_description', 'Conoce proyectos demostrativos y soluciones de Orale Web para sitios web, captación, automatización e inteligencia artificial en distintos tipos de negocio.')

@push('page-styles')
    @vite('resources/css/casos-de-exito.css')
@endpush

@section('content')
    <section class="cases-hero">
        <div class="shell cases-hero__grid">
            <div class="cases-hero__copy" data-reveal>
                <span class="eyebrow">Proyectos y soluciones</span>
                <h1>Conoce cómo planteamos soluciones para <span class="gradient-text">problemas reales de negocio.</span></h1>
                <p>Cada proyecto tiene necesidades diferentes. Diseñamos desde sitios web y landing pages hasta automatizaciones y sistemas personalizados, siempre partiendo del objetivo.</p>
                <div class="dual-actions">
                    <a href="/contacto?motivo=diagnostico" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="#proyectos" class="btn btn-secondary">Explorar proyectos</a>
                </div>
                <div class="cases-hero__formula" aria-label="Nuestro enfoque">
                    <span>Problema</span><i class="fa-solid fa-arrow-right"></i><span>Objetivo</span><i class="fa-solid fa-arrow-right"></i><span>Solución</span><i class="fa-solid fa-arrow-right"></i><span>Beneficio</span>
                </div>
            </div>
            <div class="cases-showcase" data-reveal aria-hidden="true">
                <div class="cases-showcase__main"><img src="{{ asset('img/demos/demo_6a0dd3e0c4c144.78973445.png') }}" alt="" loading="eager"><span><i class="fa-solid fa-tooth"></i> Landing para clínica dental</span></div>
                <div class="cases-showcase__side"><img src="{{ asset('img/demos/demo_69f2bc3dcccdc6.27742894.png') }}" alt="" loading="eager"><span><i class="fa-solid fa-graduation-cap"></i> Sitio para escuela</span></div>
                <div class="cases-showcase__note"><i class="fa-solid fa-compass-drafting"></i><span><strong>Diseño con propósito</strong>Cada bloque responde a un objetivo</span></div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell cases-introduction" data-reveal>
            <div><span class="eyebrow">Más que capturas</span><h2>Buscamos soluciones que generen valor.</h2></div>
            <div><p>Cada caso muestra el problema inicial, el objetivo, la solución propuesta y los beneficios esperados. No se trata solo de crear algo atractivo, sino de construir una herramienta útil para el negocio.</p><p class="cases-disclaimer"><i class="fa-solid fa-circle-info"></i><span><strong>Transparencia ante todo.</strong> Los proyectos publicados actualmente son demostrativos. No atribuimos métricas ni testimonios hasta contar con evidencia autorizada por clientes.</span></p></div>
        </div>
    </section>

    <section class="section" id="proyectos">
        <div class="shell">
            <div class="cases-toolbar" data-reveal>
                <div><span class="eyebrow">Explora por solución</span><h2>Proyectos demostrativos.</h2></div>
                <div class="cases-filters" role="group" aria-label="Filtrar proyectos">
                    <button type="button" class="is-active" data-case-filter="all">Todos</button>
                    <button type="button" data-case-filter="web">Sitios web</button>
                    <button type="button" data-case-filter="landing">Landing pages</button>
                    <button type="button" data-case-filter="automation">Automatizaciones</button>
                    <button type="button" data-case-filter="ai">IA</button>
                    <button type="button" data-case-filter="systems">Sistemas</button>
                </div>
            </div>

            <div class="cases-grid" id="cases-grid">
                <article class="case-card case-card--large" data-case-category="landing" data-reveal>
                    <div class="case-card__image"><img src="{{ asset('img/demos/demo_6a0dd3e0c4c144.78973445.png') }}" alt="Vista del proyecto demostrativo para clínica dental" loading="lazy"><span>Proyecto demostrativo</span></div>
                    <div class="case-card__body">
                        <div class="case-card__meta"><span>Landing page</span><span>Sector salud</span></div><h3>Clínica Dental Luxe</h3>
                        <div class="case-card__story"><div><small>El problema</small><p>La captación dependía de redes sociales y mensajes sin una presentación centralizada.</p></div><i class="fa-solid fa-arrow-right"></i><div><small>La solución</small><p>Landing enfocada en servicios, confianza y solicitud de citas por formulario y WhatsApp.</p></div></div>
                        <ul class="case-card__benefits"><li>Oferta más clara</li><li>Contacto visible</li><li>Experiencia móvil</li></ul>
                        <details class="case-details"><summary>Ver caso completo <i class="fa-solid fa-plus"></i></summary><div class="case-details__content"><section><h4>Objetivos del proyecto</h4><ul><li>Presentar tratamientos con claridad.</li><li>Transmitir confianza profesional.</li><li>Facilitar la solicitud de una valoración.</li><li>Optimizar la experiencia móvil.</li></ul></section><section><h4>Qué se desarrolló</h4><ul><li>Landing page responsive.</li><li>Secciones de servicios y proceso.</li><li>Formulario de contacto.</li><li>Llamadas a la acción y WhatsApp.</li><li>Base de SEO técnico.</li></ul></section></div></details>
                    </div>
                </article>

                <article class="case-card" data-case-category="web" data-reveal>
                    <div class="case-card__image"><img src="{{ asset('img/demos/demo_69f2bc3dcccdc6.27742894.png') }}" alt="Vista de sitio demostrativo para escuela gastronómica" loading="lazy"><span>Proyecto demostrativo</span></div>
                    <div class="case-card__body"><div class="case-card__meta"><span>Sitio web</span><span>Educación</span></div><h3>Escuela Gastronómica</h3><div class="case-card__story"><div><small>El problema</small><p>Los cursos y atributos de la escuela necesitaban una presentación más ordenada.</p></div><div><small>La solución</small><p>Sitio visual para presentar oferta académica, experiencia, galería y contacto.</p></div></div><ul class="case-card__benefits"><li>Información centralizada</li><li>Navegación clara</li><li>Identidad visual</li></ul><details class="case-details"><summary>Ver caso completo <i class="fa-solid fa-plus"></i></summary><div class="case-details__content"><section><h4>Objetivos</h4><ul><li>Presentar cursos y experiencia.</li><li>Ordenar el contenido institucional.</li><li>Facilitar consultas de aspirantes.</li></ul></section><section><h4>Entregables</h4><ul><li>Arquitectura del sitio.</li><li>Diseño responsive.</li><li>Galería y contacto.</li></ul></section></div></details></div>
                </article>

                <article class="case-card" data-case-category="web" data-reveal>
                    <div class="case-card__image"><img src="{{ asset('img/demos/demo_69f2bca66f6e30.28516576.png') }}" alt="Vista de sitio demostrativo para cafetería" loading="lazy"><span>Proyecto demostrativo</span></div>
                    <div class="case-card__body"><div class="case-card__meta"><span>Sitio web</span><span>Restaurante</span></div><h3>La Cafetería</h3><div class="case-card__story"><div><small>El problema</small><p>El negocio requería mostrar su concepto, menú y experiencia en un solo lugar.</p></div><div><small>La solución</small><p>Sitio visual con historia, galería, menú, ubicación y datos de reservación.</p></div></div><ul class="case-card__benefits"><li>Menú accesible</li><li>Concepto reconocible</li><li>Contacto centralizado</li></ul><details class="case-details"><summary>Ver caso completo <i class="fa-solid fa-plus"></i></summary><div class="case-details__content"><section><h4>Objetivos</h4><ul><li>Comunicar el concepto del espacio.</li><li>Mostrar productos y precios.</li><li>Facilitar ubicación y reserva.</li></ul></section><section><h4>Entregables</h4><ul><li>Sitio responsive.</li><li>Galería visual.</li><li>Menú y contacto.</li></ul></section></div></details></div>
                </article>

                <article class="case-card" data-case-category="web" data-reveal>
                    <div class="case-card__image"><img src="{{ asset('img/demos/demo_69f2bd20945dc8.68048521.png') }}" alt="Vista de sitio demostrativo para spa" loading="lazy"><span>Proyecto demostrativo</span></div>
                    <div class="case-card__body"><div class="case-card__meta"><span>Sitio web</span><span>Bienestar</span></div><h3>Carolina Spa Salon</h3><div class="case-card__story"><div><small>El problema</small><p>Los servicios y productos no contaban con un escaparate digital propio.</p></div><div><small>La solución</small><p>Sitio de marca con servicios, productos, presencia social y contacto directo.</p></div></div><ul class="case-card__benefits"><li>Presencia profesional</li><li>Servicios organizados</li><li>Identidad coherente</li></ul><details class="case-details"><summary>Ver caso completo <i class="fa-solid fa-plus"></i></summary><div class="case-details__content"><section><h4>Objetivos</h4><ul><li>Presentar la oferta del spa.</li><li>Reforzar la identidad del negocio.</li><li>Crear un canal de contacto claro.</li></ul></section><section><h4>Entregables</h4><ul><li>Diseño responsive.</li><li>Catálogo de servicios.</li><li>Integración social y contacto.</li></ul></section></div></details></div>
                </article>

                <article class="case-card case-card--concept" data-case-category="automation systems" data-reveal>
                    <div class="case-card__concept-visual"><div><i class="fa-solid fa-rectangle-list"></i><span>Formulario</span></div><b></b><div><i class="fa-solid fa-database"></i><span>Registro</span></div><b></b><div><i class="fa-solid fa-bell"></i><span>Seguimiento</span></div></div>
                    <div class="case-card__body"><div class="case-card__meta"><span>Automatización</span><span>Captación</span></div><h3>Registro automático de prospectos</h3><div class="case-card__story"><div><small>El problema</small><p>Los contactos se copiaban manualmente y el seguimiento dependía de recordatorios.</p></div><div><small>La solución propuesta</small><p>Flujo que registra cada solicitud, notifica al responsable y programa el siguiente paso.</p></div></div><ul class="case-card__benefits"><li>Menos captura manual</li><li>Información ordenada</li><li>Seguimiento visible</li></ul><details class="case-details"><summary>Ver caso completo <i class="fa-solid fa-plus"></i></summary><div class="case-details__content"><section><h4>Objetivos</h4><ul><li>Reducir duplicidad de datos.</li><li>Notificar cada oportunidad.</li><li>Evitar prospectos sin seguimiento.</li></ul></section><section><h4>Componentes</h4><ul><li>Formulario o landing.</li><li>Base centralizada.</li><li>Notificaciones y tareas.</li></ul></section></div></details></div>
                </article>

                <article class="case-card case-card--concept case-card--ai" data-case-category="ai" data-reveal>
                    <div class="case-card__chat"><p>¿Cuáles son sus horarios?</p><p>Atendemos de lunes a sábado. ¿Te ayudo a solicitar una cita?</p><span><i class="fa-solid fa-arrow-right-arrow-left"></i> Transfiere el contexto al equipo</span></div>
                    <div class="case-card__body"><div class="case-card__meta"><span>IA para negocios</span><span>Atención inicial</span></div><h3>Asistente de preguntas frecuentes</h3><div class="case-card__story"><div><small>El problema</small><p>El equipo responde horarios, servicios y requisitos varias veces al día.</p></div><div><small>La solución propuesta</small><p>Asistente basado en información aprobada, con transferencia a una persona cuando es necesario.</p></div></div><ul class="case-card__benefits"><li>Respuesta inicial rápida</li><li>Información consistente</li><li>Supervisión humana</li></ul><details class="case-details"><summary>Ver caso completo <i class="fa-solid fa-plus"></i></summary><div class="case-details__content"><section><h4>Objetivos</h4><ul><li>Atender preguntas repetitivas.</li><li>Recopilar información inicial.</li><li>Escalar casos especiales al equipo.</li></ul></section><section><h4>Componentes</h4><ul><li>Base de conocimiento.</li><li>Asistente conversacional.</li><li>Reglas de transferencia.</li></ul></section></div></details></div>
                </article>
            </div>
            <p class="cases-empty" id="cases-empty" hidden>No hay proyectos publicados en esta categoría todavía.</p>
        </div>
    </section>

    <section class="section">
        <div class="shell solution-choice" data-reveal>
            <div><span class="eyebrow">El diagnóstico primero</span><h2>¿Cómo elegimos la solución adecuada?</h2><p>No todos los proyectos necesitan lo mismo. Algunos negocios requieren únicamente un sitio web; otros necesitan automatización, seguimiento de prospectos o un sistema personalizado.</p></div>
            <ol><li><span>01</span><div><strong>Entendemos el problema</strong><small>Qué sucede hoy y qué está frenando al negocio.</small></div></li><li><span>02</span><div><strong>Definimos el objetivo</strong><small>Qué resultado útil debe facilitar la solución.</small></div></li><li><span>03</span><div><strong>Elegimos el alcance</strong><small>La herramienta necesaria, sin complejidad de más.</small></div></li></ol>
        </div>
    </section>

    <section class="section">
        <div class="shell cases-evidence" data-reveal>
            <div><i class="fa-solid fa-chart-line"></i><span><strong>Resultados verificables</strong><small>Cuando un proyecto cuente con métricas autorizadas, mostraremos el periodo, la fuente y el contexto.</small></span></div>
            <div><i class="fa-solid fa-quote-left"></i><span><strong>Testimonios reales</strong><small>Solo publicaremos opiniones entregadas y autorizadas por clientes.</small></span></div>
            <div><i class="fa-solid fa-eye"></i><span><strong>Sin promesas infladas</strong><small>Diferenciamos beneficios esperados de resultados que ya fueron medidos.</small></span></div>
        </div>
    </section>

    <section class="section">
        <div class="shell cases-final-cta" data-reveal><span class="eyebrow">Tu proyecto puede empezar aquí</span><h2>¿Quieres una solución pensada para tu negocio?</h2><p>Cuéntanos el problema que quieres resolver y te ayudaremos a identificar una estrategia realista.</p><div class="dual-actions"><a href="/contacto?motivo=diagnostico" class="btn btn-primary">Solicitar diagnóstico <i class="fa-solid fa-arrow-right"></i></a><a href="https://wa.me/525512480210?text=Hola%2C%20quiero%20hablar%20sobre%20una%20soluci%C3%B3n%20para%20mi%20negocio" target="_blank" rel="noopener noreferrer" class="btn cases-whatsapp"><i class="fa-brands fa-whatsapp"></i> Hablar por WhatsApp</a></div></div>
    </section>
@endsection

@push('page-scripts')
    <script>
        (() => {
            const buttons = document.querySelectorAll('[data-case-filter]');
            const cards = document.querySelectorAll('[data-case-category]');
            const empty = document.getElementById('cases-empty');
            if (!buttons.length || !cards.length) return;

            buttons.forEach((button) => button.addEventListener('click', () => {
                const filter = button.dataset.caseFilter;
                let visible = 0;
                buttons.forEach((item) => {
                    item.classList.toggle('is-active', item === button);
                    item.setAttribute('aria-pressed', item === button ? 'true' : 'false');
                });
                cards.forEach((card) => {
                    const categories = card.dataset.caseCategory.split(' ');
                    const show = filter === 'all' || categories.includes(filter);
                    card.hidden = !show;
                    if (show) visible++;
                });
                empty.hidden = visible > 0;
            }));
        })();
    </script>
@endpush
