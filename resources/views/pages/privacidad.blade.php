@extends('layouts.app')

@section('titulo', 'Aviso de Privacidad')
@section('meta_description', 'Consulta el aviso de privacidad de Orale Web y conoce como tratamos los datos personales recabados a traves de nuestro sitio web.')
@section('og_image', asset('img/hero.png'))

@section('content')
    <section class="page-hero">
        <div class="shell page-hero__card" data-reveal>
            <span class="eyebrow">Privacidad</span>
            <h1>Aviso de Privacidad</h1>
            <p>Conoce qu&eacute; datos recabamos, para qu&eacute; los usamos y c&oacute;mo puedes ejercer tus derechos relacionados con el tratamiento de tu informaci&oacute;n personal.</p>
        </div>
    </section>

    <section class="section">
        <div class="shell two-col-grid">
            <aside class="contact-card" data-reveal>
                <div class="section-intro" style="margin-bottom: 2rem;">
                    <span class="eyebrow">Resumen</span>
                    <h2>Tratamos tus datos con un uso claro, limitado y enfocado en atender tu solicitud.</h2>
                    <p>Este aviso aplica a la informaci&oacute;n que compartes con Orale Web a trav&eacute;s de su formulario de contacto y canales relacionados.</p>
                </div>

                <div class="contact-links">
                    <a href="/contacto">Volver al formulario de contacto</a>
                    <a href="mailto:contacto@oraleweb.com">contacto@oraleweb.com</a>
                    <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer">WhatsApp +52 55 1248 0210</a>
                </div>
            </aside>

            <article class="contact-card" data-reveal>
                <div class="section-intro" style="margin-bottom: 2rem;">
                    <span class="eyebrow">Documento integral</span>
                    <h2>AVISO DE PRIVACIDAD</h2>
                </div>

                <div class="article-content">
                    <div>
                        <h3>1. Identidad y Domicilio del Responsable</h3>
                        <p>Orale Web, con domicilio en Nezahualc&oacute;yotl, Estado de M&eacute;xico, es el responsable del tratamiento de sus datos personales.</p>
                    </div>

                    <div>
                        <h3>2. Datos Personales Recabados</h3>
                        <p>Para las finalidades se&ntilde;aladas en este aviso, recabamos: nombre completo, n&uacute;mero de WhatsApp, correo electr&oacute;nico, industria de pertenencia e intereses comerciales.</p>
                    </div>

                    <div>
                        <h3>3. Finalidades del Tratamiento</h3>
                        <ul>
                            <li>Proveer informaci&oacute;n sobre los servicios solicitados.</li>
                            <li>Gesti&oacute;n de clientes en nuestro sistema CRM.</li>
                            <li>Seguimiento comercial v&iacute;a WhatsApp y correo electr&oacute;nico.</li>
                            <li>Personalizaci&oacute;n de propuestas basadas en su industria.</li>
                        </ul>
                    </div>

                    <div>
                        <h3>4. Derechos ARCO</h3>
                        <p>Usted tiene derecho a conocer qu&eacute; datos tenemos de usted (Acceso), solicitar su correcci&oacute;n (Rectificaci&oacute;n), eliminarlos de nuestras bases de datos (Cancelaci&oacute;n) u oponerse al uso de los mismos (Oposici&oacute;n). Para ejercer estos derechos, puede enviar un correo a <a href="mailto:contacto@oraleweb.com">contacto@oraleweb.com</a>.</p>
                    </div>

                    <div>
                        <h3>5. Transferencia de Datos</h3>
                        <p>Le informamos que sus datos no ser&aacute;n compartidos con terceros, salvo para el cumplimiento de obligaciones legales o para el uso de herramientas de procesamiento de datos necesarias para nuestra operaci&oacute;n, como almacenamiento en la nube o servicios de mensajer&iacute;a.</p>
                    </div>

                    <div>
                        <h3>6. Cambios al Aviso de Privacidad</h3>
                        <p>Nos reservamos el derecho de realizar modificaciones en cualquier momento, las cuales estar&aacute;n disponibles en este mismo sitio web.</p>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
