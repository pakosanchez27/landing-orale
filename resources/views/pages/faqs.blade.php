@extends('layouts.app')

@section('titulo')
    FAQ'S
@endsection

@push('page-styles')
    @vite(['resources/css/faqs.css'])
@endpush

@section('content')
    <section class="section w-full">
        <div class="flex justify-center flex-col items-center">
            <h1 class="">Preguntas <span class="text-gradient">Frecuentes</span></h1>
            <p class="text-center w-full md:w-3/6 mx-auto">Estas son algunas de las preguntas m&aacute;s frecuentes. Si tu pregunta no est&aacute; entre las opciones, cont&aacute;ctanos en cualquiera de nuestras redes sociales.</p>
        </div>
    </section>

    <section class="section faqs">
        <div class="faqs__grid">
            <div class="faqs__intro">
                <span class="faqs__badge">Soporte r&aacute;pido</span>
                <h2>Todo claro, sin letras peque&ntilde;as</h2>
                <p>Resolvemos tus dudas sobre el proceso, tiempos y entregables. Si necesitas algo m&aacute;s
                    espec&iacute;fico, podemos agendar una llamada.</p>
            </div>

            <div class="faqs__list" role="list">
                <details class="faq-item" open>
                    <summary>&iquest;Cu&aacute;nto tiempo toma tener mi landing lista?</summary>
                    <div class="faq-item__body">
                        <p>En promedio entre 10 y 15 d&iacute;as h&aacute;biles, dependiendo del contenido y los ajustes
                            solicitados.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary>&iquest;Qu&eacute; incluyen los planes de dise&ntilde;o?</summary>
                    <div class="faq-item__body">
                        <p>Incluyen estructura, dise&ntilde;o visual, adaptaci&oacute;n responsive, optimizaci&oacute;n de
                            carga y configuraci&oacute;n b&aacute;sica de formularios.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary>&iquest;Puedo pedir cambios despu&eacute;s de la entrega?</summary>
                    <div class="faq-item__body">
                        <p>S&iacute;. Incluimos una ronda de ajustes sin costo. Para cambios adicionales te
                            compartimos una cotizaci&oacute;n clara.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary>&iquest;Necesito tener dominio y hosting?</summary>
                    <div class="faq-item__body">
                        <p>No es obligatorio. Podemos asesorarte para contratarlo o usar el que ya tengas.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary>&iquest;Puedo editar el contenido por mi cuenta?</summary>
                    <div class="faq-item__body">
                        <p>S&iacute;. Dejamos el sitio listo para que puedas actualizar textos e im&aacute;genes de forma
                            sencilla.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary>&iquest;Qu&eacute; necesito enviar para iniciar el proyecto?</summary>
                    <div class="faq-item__body">
                        <p>Logo, colores de marca, textos principales, im&aacute;genes y links a redes sociales.</p>
                    </div>
                </details>
            </div>
        </div>
    </section>

    <section class="section faqs-social">
        <div class="faqs-social__card">
            <div class="faqs-social__copy">
                <h2>Con&eacute;ctate con nosotros</h2>
                <p>Te respondemos r&aacute;pido por el canal que prefieras. Nuestro equipo est&aacute; listo para ayudarte.</p>
            </div>
            <div class="faqs-social__links" aria-label="Redes sociales">
                <a href="#" class="faqs-social__link" aria-label="TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="#" class="faqs-social__link" aria-label="YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
                <a href="#" class="faqs-social__link" aria-label="Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="#" class="faqs-social__link" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="#" class="faqs-social__link" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>
@endsection
