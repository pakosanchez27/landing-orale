@extends('layouts.app')

@section('titulo', 'Paquetes')
@section('meta_description', 'Compara nuestros paquetes de desarrollo web: Basico, Profesional y Personalizado. Elige el plan ideal para impulsar tu negocio.')
@section('og_image', asset('img/hero.png'))

@section('content')
    <section class="page-hero">
        <div class="shell page-hero__card" data-reveal>
            <span class="eyebrow">Paquetes</span>
            <h1>Elige el nivel de presencia digital que tu negocio necesita <span class="gradient-text">ahora</span> y a futuro.</h1>
            <p>Cada paquete conserva la misma direcci&oacute;n visual premium, pero cambia en profundidad, alcance y capacidad de crecimiento.</p>
        </div>
    </section>

    <section class="section">
        <div class="shell pricing-grid">
            <article class="pricing-card" id="basico" data-reveal>
                <span class="pricing-card__tag">Basico</span>
                <div>
                    <p class="pricing-card__price">$3,500 <span>+ IVA</span></p>
                    <p>Perfecto para emprendedores y negocios que necesitan una presencia clara y profesional sin demasiada complejidad.</p>
                </div>
                <ul class="feature-list">
                    <li>One page con hasta 5 secciones</li>
                    <li>Dise&ntilde;o responsive</li>
                    <li>Formulario de contacto</li>
                    <li>Alta en Google My Business</li>
                </ul>
                <a href="/contacto?paquete=basico" class="btn btn-secondary">Elegir plan</a>
            </article>

            <article class="pricing-card is-featured" id="profesional" data-reveal>
                <span class="pricing-card__tag">Profesional</span>
                <div>
                    <p class="pricing-card__price">$5,500 <span>+ IVA</span></p>
                    <p>La mejor opci&oacute;n para empresas que quieren una web m&aacute;s completa, escalable y con una narrativa de marca mejor trabajada.</p>
                </div>
                <ul class="feature-list">
                    <li>Hasta 5 paginas independientes</li>
                    <li>Blog listo para publicar</li>
                    <li>Redes sociales y 5 correos corporativos</li>
                    <li>2 meses de mantenimiento incluidos</li>
                </ul>
                <a href="/contacto?paquete=profesional" class="btn btn-primary">Elegir plan</a>
            </article>

            <article class="pricing-card" id="personalizado" data-reveal>
                <span class="pricing-card__tag">Personalizado</span>
                <div>
                    <p class="pricing-card__price">A cotizar</p>
                    <p>Para proyectos con necesidades visuales, funcionales o comerciales que requieren una soluci&oacute;n a la medida.</p>
                </div>
                <ul class="feature-list">
                    <li>Alcance y arquitectura personalizados</li>
                    <li>Integraciones y funcionalidades especiales</li>
                    <li>Escalabilidad segun complejidad</li>
                    <li>Planeacion orientada a objetivos reales</li>
                </ul>
                <a href="/contacto?paquete=personalizado" class="btn btn-secondary">Solicitar cotizacion</a>
            </article>
        </div>
    </section>

    <section class="section">
        <div class="shell table-shell" data-reveal>
            <table>
                <thead>
                    <tr>
                        <th>Caracteristica</th>
                        <th>Basico</th>
                        <th class="is-highlight">Profesional</th>
                        <th>Personalizado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Ideal para</th>
                        <td>Negocios que necesitan validacion rapida.</td>
                        <td class="is-highlight">Marcas que buscan autoridad y una estructura mas completa.</td>
                        <td>Proyectos complejos o con procesos especiales.</td>
                    </tr>
                    <tr>
                        <th>Paginas / secciones</th>
                        <td>One page con hasta 5 secciones</td>
                        <td class="is-highlight">Hasta 5 paginas independientes</td>
                        <td>Arquitectura definida por alcance</td>
                    </tr>
                    <tr>
                        <th>Dise&ntilde;o responsive</th>
                        <td><span class="mini-pill is-yes">Incluido</span></td>
                        <td class="is-highlight"><span class="mini-pill is-yes">Incluido</span></td>
                        <td><span class="mini-pill is-yes">Incluido</span></td>
                    </tr>
                    <tr>
                        <th>Blog</th>
                        <td><span class="mini-pill">No incluido</span></td>
                        <td class="is-highlight"><span class="mini-pill is-yes">Incluido</span></td>
                        <td><span class="mini-pill is-optional">Opcional</span></td>
                    </tr>
                    <tr>
                        <th>Formulario</th>
                        <td>Estandar</td>
                        <td class="is-highlight">Avanzado con campos personalizados</td>
                        <td>A medida</td>
                    </tr>
                    <tr>
                        <th>Correos corporativos</th>
                        <td>3</td>
                        <td class="is-highlight">5</td>
                        <td>Segun necesidad</td>
                    </tr>
                    <tr>
                        <th>SEO tecnico base</th>
                        <td><span class="mini-pill is-yes">Incluido</span></td>
                        <td class="is-highlight"><span class="mini-pill is-yes">Incluido</span></td>
                        <td><span class="mini-pill is-yes">Incluido</span></td>
                    </tr>
                    <tr>
                        <th>Mantenimiento</th>
                        <td>No incluido</td>
                        <td class="is-highlight">2 meses incluidos</td>
                        <td>Plan opcional</td>
                    </tr>
                    <tr>
                        <th>Entrega estimada</th>
                        <td>5 a 7 dias habiles</td>
                        <td class="is-highlight">7 a 10 dias habiles</td>
                        <td>Segun alcance</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section">
        <div class="shell band-card" data-reveal>
            <div class="section-intro">
                <span class="eyebrow">Que cambia entre planes</span>
                <h2>No es solo una diferencia de precio: cambia la profundidad de la experiencia y la capacidad de crecimiento.</h2>
            </div>
            <div class="card-grid grid-3">
                <article class="feature-card">
                    <div class="feature-card__icon"><i class="fa-solid fa-layer-group"></i></div>
                    <h3>Mas estructura</h3>
                    <p>Los planes superiores permiten comunicar mejor tu marca con mas secciones, paginas y recorridos.</p>
                </article>
                <article class="feature-card">
                    <div class="feature-card__icon"><i class="fa-solid fa-pen-ruler"></i></div>
                    <h3>Mas profundidad visual</h3>
                    <p>A mayor alcance, mayor detalle en narrativa, composicion visual y bloques orientados a conversion.</p>
                </article>
                <article class="feature-card">
                    <div class="feature-card__icon"><i class="fa-solid fa-arrows-up-down-left-right"></i></div>
                    <h3>Mas capacidad de escalar</h3>
                    <p>El plan personalizado permite integrar procesos, automatizaciones y funciones fuera de una estructura estandar.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell cta-panel" data-reveal>
            <span class="eyebrow">Te ayudamos a elegir</span>
            <h2>Si no sabes qu&eacute; paquete te conviene, lo definimos contigo seg&uacute;n tu negocio y tus objetivos.</h2>
            <p>Podemos orientarte para elegir una versi&oacute;n realista hoy, pero con espacio para evolucionar despu&eacute;s.</p>
            <div class="dual-actions">
                <a href="/contacto" class="btn btn-primary">Hablar de mi proyecto</a>
                <a href="/demos" class="btn btn-secondary">Ver demos por industria</a>
            </div>
        </div>
    </section>
@endsection
