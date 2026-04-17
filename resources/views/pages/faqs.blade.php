@extends('layouts.app')

@section('titulo', 'FAQ')
@section('meta_description', 'Resuelve tus dudas sobre tiempos, proceso, entregables y mantenimiento de nuestros servicios de diseno y desarrollo web.')
@section('og_image', asset('img/hero.png'))

@section('content')
    @php
        $faqs = [
            [
                'q' => 'Cuanto tiempo toma tener mi landing lista?',
                'a' => 'En promedio entre 10 y 15 dias habiles, dependiendo del contenido, el numero de revisiones y la complejidad del proyecto.',
            ],
            [
                'q' => 'Que incluyen los planes de diseno?',
                'a' => 'Incluyen estructura, diseno visual, adaptacion responsive, optimizacion base de carga y configuracion de formularios.',
            ],
            [
                'q' => 'Puedo pedir cambios despues de la entrega?',
                'a' => 'Si. Incluimos una ronda de ajustes y, si el proyecto necesita trabajo adicional, te compartimos una cotizacion clara.',
            ],
            [
                'q' => 'Necesito tener dominio y hosting?',
                'a' => 'No es obligatorio. Podemos asesorarte para contratarlo o trabajar sobre el servicio que ya tengas.',
            ],
            [
                'q' => 'Puedo editar el contenido por mi cuenta?',
                'a' => 'Si, siempre que el alcance del proyecto lo contemple. Dejamos una estructura clara para futuras actualizaciones.',
            ],
            [
                'q' => 'Que necesito enviar para iniciar?',
                'a' => 'Logo, colores de marca, referencias visuales, textos clave, imagenes disponibles y links a redes sociales.',
            ],
        ];
    @endphp

    <section class="page-hero">
        <div class="shell page-hero__card" data-reveal>
            <span class="eyebrow">Preguntas frecuentes</span>
            <h1>Respuestas claras para que sepas qu&eacute; esperar antes de iniciar tu proyecto.</h1>
            <p>Reunimos las dudas m&aacute;s comunes sobre tiempos, proceso, entregables y mantenimiento para que tomes una decisi&oacute;n con tranquilidad.</p>
        </div>
    </section>

    <section class="section">
        <div class="shell faq-grid">
            <aside class="faq-card" data-reveal>
                <div class="section-intro" style="margin-bottom: 2rem;">
                    <span class="eyebrow">Sin letras peque&ntilde;as</span>
                    <h2>Te explicamos el proceso con la misma claridad con la que dise&ntilde;amos.</h2>
                    <p>Si tu caso necesita una respuesta espec&iacute;fica, podemos revisar tu proyecto y decirte qu&eacute; camino te conviene m&aacute;s.</p>
                </div>
                <div class="contact-links">
                    <a href="/contacto">Ir al formulario de contacto</a>
                    <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer">Hablar por WhatsApp</a>
                    <a href="/paquetes">Comparar paquetes</a>
                </div>
            </aside>

            <div class="faq-list">
                @foreach ($faqs as $index => $faq)
                    <details class="faq-item" @if ($index === 0) open @endif data-reveal>
                        <summary>{{ $faq['q'] }}</summary>
                        <p>{{ $faq['a'] }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell cta-panel" data-reveal>
            <span class="eyebrow">Sigues con dudas</span>
            <h2>Podemos revisar tu caso, aterrizar el alcance y proponerte una ruta realista.</h2>
            <p>No necesitas llegar con todo definido. Tambi&eacute;n te ayudamos a traducir una idea suelta en un proyecto bien planteado.</p>
            <div class="dual-actions">
                <a href="/contacto" class="btn btn-primary">Hablar de mi proyecto</a>
                <a href="/demos" class="btn btn-secondary">Ver ejemplos</a>
            </div>
        </div>
    </section>
@endsection
