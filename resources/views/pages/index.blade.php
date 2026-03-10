@extends('layouts.app')

@section('titulo')
    Inicio
@endsection

@section('meta_description', 'Agencia de diseno y desarrollo web en Mexico. Creamos sitios modernos, rapidos y orientados a resultados para negocios, emprendedores y PyMEs.')
@section('og_image', asset('img/hero.png'))

@push('head-extra')
    <link rel="preload" as="image" href="{{ asset('img/hero.png') }}">
@endpush

@push('page-styles')
    @vite(['resources/css/home.css'])
@endpush

@section('content')
    <section
        class="hero section contenido-centrado n grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-0 flex flex-col justify-center items-center lg:flex-row lg:justify-between">
        <div class="hero_contenido flex flex-col justify-center items-center text-center lg:items-start lg:text-start gap-4">
            <h1 class="text-center font-semibold lg:text-start">
                <span class="text-gradient">Tu negocio necesita una p&aacute;gina web</span>
                que te ayude a crecer
            </h1>
            <p class="text-center lg:text-start mb-8">
                Somos una agencia especializada en crear sitios modernos,
                r&aacute;pidos y estrat&eacute;gicos que convierten visitas en
                oportunidades reales de venta.
            </p>
            <a href="/contacto" class="btn-primario text-2xl uppercase flex m-auto lg:m-0 mb-7">
                Quiero mi Web
            </a>
        </div>
        <div class="hero_imagen flex justify-center">
            
                <img src="{{ asset('img/hero.png') }}" alt="Imagen de presentaci&oacute;n de &Oacute;rale Web" loading="eager" fetchpriority="high" decoding="async" />
        </div>
    </section>

    <section class="section cintillo uppercase">
        <div class="cintillo__track">
            <div class="cintillo__grupo">
                <p class="cintillo-sin-relleno">Confianza</p>
                <p>Profesionalismo</p>
                <p class="cintillo-sin-relleno">M&aacute;s Clientes</p>
                <p>M&aacute;s Ventas</p>
                <p class="cintillo-sin-relleno">Crecimiento</p>
            </div>
            <div class="cintillo__grupo" aria-hidden="true">
                <p>Confianza</p>
                <p class="cintillo-sin-relleno">Profesionalismo</p>
                <p>M&aacute;s Clientes</p>
                <p class="cintillo-sin-relleno">M&aacute;s Ventas</p>
                <p>Crecimiento</p>
            </div>
            <div class="cintillo__grupo" aria-hidden="true">
                <p class="cintillo-sin-relleno">Confianza</p>
                <p>Profesionalismo</p>
                <p class="cintillo-sin-relleno">M&aacute;s Clientes</p>
                <p>M&aacute;s Ventas</p>
                <p class="cintillo-sin-relleno">Crecimiento</p>
            </div>
            <div class="cintillo__grupo" aria-hidden="true">
                <p>Confianza</p>
                <p class="cintillo-sin-relleno">Profesionalismo</p>
                <p>M&aacute;s Clientes</p>
                <p class="cintillo-sin-relleno">M&aacute;s Ventas</p>
                <p>Crecimiento</p>
            </div>
            <div class="card-paquete flex flex-col items-start p-8 ">
                <h3 class="font-medium text-gradient mt-4 mb-2">Profesional</h3>
                <p class="precio">$5,500 <span>+ IVA</span></p>
                <p class="descripcion">
                    Para empresas que buscan el siguiente nivel de autoridad.
                </p>
                <ul>
                    <li>Hasta 5 p&aacute;ginas independientes</li>
                    <li>Estrategia de blog: Espacio listo para publicar contenido</li>
                    <li>Integraci&oacute;n con redes sociales y 5 correos corporativos.</li>
                    <li>Incluye 2 meses de mantenimiento web sin costo extra.</li>
                </ul>
                <a href="/paquetes#profesional" class="btn-primario uppercase mt-4 w-full">Ver M&aacute;s</a>
            </div>
        </div>
    </section>

    <section
        class="section contenido-centrado seccion-detalle n grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-0 flex flex-col justify-center items-center lg:flex-row lg:justify-between">
        <div class="text-center lg:text-start mb-12">
            <h2 class="text-center font-semibold mb-12 lg:text-start">
                Tu negocio puede ser bueno.
                <span class="text-gradient">Tu web debe demostrarlo.</span>
            </h2>
            <p class="text-center lg:text-start">
                Hoy tus clientes te buscan en Google antes de escribirte. Si no
                conf&iacute;an en lo que ven, simplemente se van. Tu web es tu primera
                validaci&oacute;n.
            </p>
        </div>
        <div class="imagen-con-blur flex justify-center">
            
                <img src="{{ asset('img/img-2.png') }}" alt="Imagen de ejemplo de &Oacute;rale Web" loading="lazy" />
        </div>
    </section>

    <section class="section contenido-centrado">
        <h2 class="text-center font-bold mb-12 w-full md:w-3/6 m-auto flex flex-col justify-center items-center text-center ">
            Lo que obtienes con una
            <span class="text-gradient">p&aacute;gina web profesional</span>
        </h2>
        <div class="container-cards grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="card-beneficio  p-8">
                <div class="icono flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-16">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                </div>
                <h3 class="font-medium text-gradient mt-4 mb-2">Dise&ntilde;o moderno</h3>
                <p>
                    Tu sitio web se ver&aacute; incre&iacute;ble en cualquier dispositivo, desde
                    computadoras hasta tel&eacute;fonos m&oacute;viles.
                </p>
            </div>
            <div class="card-beneficio  p-8">
                <div class="icono flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-16">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                    </svg>
                </div>
                <h3 class="font-medium text-gradient mt-4 mb-2">
                    Proyecta profesionalismo
                </h3>
                <p>
                    Haz que tu negocio se vea s&oacute;lido y confiable desde el primer
                    segundo.
                </p>
            </div>
            <div class="card-beneficio  p-8">
                <div class="icono flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-16">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                    </svg>
                </div>
                <h3 class="font-medium text-gradient mt-4 mb-2">
                    Crece con estructura
                </h3>
                <p>Deja de improvisar y empieza a posicionarse estrat&eacute;gicamente.</p>
            </div>
            <div class="card-beneficio  p-8">
                <div class="icono flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-16">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <h3 class="font-medium text-gradient mt-4 mb-2">Dise&ntilde;o moderno</h3>
                <p>
                    Tu sitio web se ver&aacute; incre&iacute;ble en cualquier dispositivo, desde
                    computadoras hasta tel&eacute;fonos m&oacute;viles.
                </p>
            </div>
        </div>
    </section>

    <section class="section contenido-centrado text-center flex flex-col justify-center items-center gap-8 ">
        <h2 class="w-full lg:w-2/6 mx-auto font-bold ">
            As&iacute; puede verse tu <span class="text-gradient">p&aacute;gina web</span>
        </h2>
        <p class="w-full lg:w-3/6 mx-auto ">
            Estos son ejemplos de p&aacute;ginas desarrolladas con estructura estrat&eacute;gica,
            dise&ntilde;o moderno y enfoque en conversi&oacute;n.
        </p>

        <div class="badges flex justify-center gap-8 mt-8 mb-16 flex-wrap">
            <span class="badge badge-morado">Hospitalidad y Alimentos</span>
            <span class="badge badge-azul">M&eacute;dica</span>
            <span class="badge badge-marino">Educativa</span>
            <span class="badge badge-naranja">Inmobiliaria</span>
            <span class="badge badge-verde">Tur&iacute;stica</span>
            <span class="badge badge-rosa">Profesional y Freelancer</span>
        </div>

        <div class="card-demos grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
            <div class="card-demo ">
                
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" loading="lazy" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">M&eacute;dica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" loading="lazy" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">M&eacute;dica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" loading="lazy" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">M&eacute;dica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" loading="lazy" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">M&eacute;dica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" loading="lazy" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">M&eacute;dica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" loading="lazy" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">M&eacute;dica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" loading="lazy" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">M&eacute;dica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" loading="lazy" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">M&eacute;dica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" loading="lazy" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">M&eacute;dica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
        </div>
        <nav class="paginador-demos" aria-label="Paginaci&oacute;n de demos"></nav>
    </section>

    <section class="section text-center contenido-centrado">
        <h2 class="w-full md:w-3/6 mx-auto flex flex-col justify-center items-center text-center font-bold mb-12">
            Selecciona el plan que se
            <span class="text-gradient">adapte a tu negocio</span>
        </h2>
        <p>
            Todos nuestros sitios est&aacute;n enfocados en resultados, profesionalismo y
            velocidad de entrega.
        </p>

        <div class="card-paquetes grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center mt-12">
            <div class="card-paquete  fondo-secundario">
                <div class="flex flex-col items-start justify-between gap-5 card-profesional">
                    <h3 class="font-medium mt-4 mb-2 text-morado">Profesional</h3>
                    <div class="">
                        <p class="precio">$5,500 <span>+ IVA</span></p>
                        <p class="descripcion">
                            Para empresas que buscan el siguiente nivel de autoridad.
                        </p>
                    </div>
                    <ul>
                        <li>Hasta 5 p&aacute;ginas independientes</li>
                        <li>Estrategia de blog: Espacio listo para publicar contenido</li>
                        <li>Integraci&oacute;n con redes sociales y 5 correos corporativos.</li>
                        <li>Incluye 2 meses de mantenimiento web sin costo extra.</li>
                    </ul>
                </div>
                <a href="/paquetes#profesional" class="btn-paquete fondo-morado uppercase mt-4 w-full">Ver M&aacute;s</a>
            </div>

            <div class="card-paquete  fondo-secundario">
                <div class="flex flex-col items-start justify-between gap-5 card-profesional">
                    <h3 class="font-medium mt-4 mb-2 text-morado-claro">B&aacute;sico</h3>
                    <div class="">
                        <p class="precio">$3,500 <span>+ IVA</span></p>
                        <p class="descripcion">
                            Para emprendedores que necesitan validaci&oacute;n inmediata.
                        </p>
                    </div>
                    <ul>
                        <li>Estructura One-page con hasta 5 secciones</li>
                        <li>Tu sitio se ver&aacute; perfecto en cualquier celular o tablet.</li>
                        <li>Formulario de contacto listo para recibir prospectos.</li>
                        <li>Alta en Google My Business para mejorar tu visibilidad.</li>
                    </ul>
                </div>
                <a href="/paquetes#basico" class="btn-paquete fondo-morado-claro uppercase mt-4 w-full">Ver M&aacute;s</a>
            </div>

            <div class="card-paquete  fondo-secundario">
                <div class="flex flex-col items-start justify-between gap-5 card-profesional">
                    <h3 class="font-medium mt-4 mb-2 text-azul">Personalizado</h3>
                    <div class="">
                        <p class="precio">A cotizar</p>
                        <p class="descripcion">
                            Cotizaci&oacute;n personalizada para negocios con necesidades
                            espec&iacute;ficas o funcionalidades complejas
                        </p>
                    </div>
                    <ul>
                        <li>
                            Desde sistemas de reserva complejos hasta integraciones con
                            herramientas externas.
                        </li>
                        <li>
                            Estilo visual &uacute;nico adaptado totalmente a los valores de tu
                            marca.
                        </li>
                        <li>
                            Evaluamos la complejidad de tu proyecto para ofrecerte un precio
                            justo y resultados reales.
                        </li>
                    </ul>
                </div>
                <a href="/paquetes#personalizado" class="btn-paquete fondo-azul uppercase mt-4 w-full">Ver M&aacute;s</a>
            </div>
        </div>
    </section>

    <section class="section text-center contenido-centrado">
        <h2 class="w-3/6 mx-auto font-bold text-gradient">Proceso de Trabajo</h2>
        <div class="cards-proceso grid grid-cols-1 md:grid-cols-2  gap-8 justify-center mt-12">
            <div class="card-proceso ">
                <div class="paso flex items-center justify-center gap-6 mb-4">
                    <span>01</span>
                    <h3>Definici&oacute;n de objetivos</h3>
                </div>
                <p>
                    Entendemos a fondo las necesidades de tu negocio y lo que quieres
                    resolver, ya sea generar leads o vender servicios.
                </p>
            </div>
            <div class="card-proceso ">
                <div class="paso flex items-center justify-center gap-6 mb-4">
                    <span>02</span>
                    <h3>Estructura y Navegaci&oacute;n</h3>
                </div>
                <p>
                    Creamos los diagramas de navegaci&oacute;n y el contenido estrat&eacute;gico para que tu sitio sea f&aacute;cil de usar y
                    gu&iacute;e al cliente hacia la acci&oacute;n.
                </p>
            </div>
            <div class="card-proceso ">
                <div class="paso flex items-center justify-center gap-6 mb-4">
                    <span>03</span>
                    <h3>Dise&ntilde;o Visual </h3>
                </div>
                <p>
                    Desarrollamos una propuesta visual moderna y minimalista basada en tu identidad de marca para que
                    apruebes el estilo antes de programar.
                </p>
            </div>
            <div class="card-proceso ">
                <div class="paso flex items-center justify-center gap-6 mb-4">
                    <span>04</span>
                    <h3>Desarrollo y Pruebas</h3>
                </div>
                <p>
                    Construimos el sitio web asegurando que funcione perfectamente en todos los dispositivos y que cada
                    bot&oacute;n cumpla su funci&oacute;n.
                </p>
            </div>
            <div class="card-proceso ">
                <div class="paso flex items-center justify-center gap-6 mb-4">
                    <span>05</span>
                    <h3>Entrega Final</h3>
                </div>
                <p>
                    Te presentamos el proyecto terminado para los &uacute;ltimos ajustes y realizamos el lanzamiento oficial de tu
                    marca en internet.
                </p>
            </div>
        </div>
    </section>


    <section class="gancho flex flex-col md:flex-row justify-center items-center"
        style="--gancho-bg: url('{{ asset('img/imgen-gancho.png') }}');">
        <div class="contenido-gancho fondo-morado-claro p-8 flex flex-col h-full justify-center items-center text-center">
            <h3 class="font-bold">Dise&ntilde;amos con estrategia, desarrollamos con precisi&oacute;n y entregamos con resultados.</h3>
            <p>Tu negocio merece algo m&aacute;s que presencia digital. Merece estructura, credibilidad y crecimiento.</p>
        </div>
        <div class="imagen-gancho">

        </div>
    </section>

    <section class="section text-center flex flex-col justify-center items-center gap-8 contenido-centrado">
        <h2 class="w-full md:w-4/6 mx-auto font-bold ">No permitas que un mal dise&ntilde;o o la falta de una <span
                class="text-gradient">p&aacute;gina web te sigan costando clientes.</span></h2>
        <p class="w-full md:w-3/6 mx-auto mt-16">
            Cont&aacute;ctanos hoy mismo para una consulta gratuita y descubre c&oacute;mo podemos ayudarte a crear una p&aacute;gina web que no
            solo se vea incre&iacute;ble, sino que tambi&eacute;n convierta visitantes en clientes.
        </p>
        <a href="/contacto" class="btn-primario uppercase mt-8 text-2xl">Quiero mi p&aacute;gina web</a>

    </section>
@endsection


