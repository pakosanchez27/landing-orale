@extends('layouts.app')

@section('titulo', 'Nosotros')

@push('page-styles')
    @vite(['resources/css/nosotros.css'])
@endpush

@section('content')
    <section class="hero section contenido-centrado nosotros-hero">
        <div class="nosotros-hero__panel flex flex-col items-center text-center">
            <p class="badge badge-morado inline font-bold">Sobre nosotros</p>
            <h1 class="font-bold nosotros-hero__title">Nuestra <span class="text-gradient">Historia</span></h1>
            <p class="nosotros-hero__lead">En &iexcl;&Oacute;rale Web! somos una agencia mexicana de desarrollo web especializada
                en emprendedores, negocios locales y PyMEs. Creamos soluciones digitales estrat&eacute;gicas que combinan
                dise&ntilde;o, funcionalidad y rendimiento para resolver problemas reales y generar crecimiento.</p>

            <div class="nosotros-hero__tags flex flex-wrap justify-center gap-3 mt-6">
                <span>Estrategia digital</span>
                <span>Dise&ntilde;o con enfoque comercial</span>
                <span>Desarrollo optimizado</span>
            </div>

            {{-- <div class="nosotros-hero__stats grid grid-cols-1 sm:grid-cols-2 gap-4 w-full mt-8">
                <article>
                    <p class="nosotros-hero__stat-number">+120</p>
                    <p class="nosotros-hero__stat-text">proyectos digitales ejecutados</p>
                </article>
                <article>
                    <p class="nosotros-hero__stat-number">95%</p>
                    <p class="nosotros-hero__stat-text">de clientes con mejora en su presencia online</p>
                </article>
            </div> --}}
        </div>
    </section>


    <section class="section nosotros-mvv">
        <div class="flex flex-col items-start text-left nosotros-mvv__head">
            <p class="badge badge-morado inline">Misi&oacute;n, Visi&oacute;n y Valores</p>
            <h2 class="w-full">Construimos <span class="text-gradient">crecimiento digital</span></h2>
        </div>

        <div class="flex flex-col lg:flex-row gap-16 nosotros-mvv__grid">
            <div class="lg:w-3/6 ">
                <img src="{{ asset('img/team.jpg') }}" alt="imagen nosotros"
                    class="rounded-lg  w-full  nosotros-mvv__image" />
            </div>
            <div class="flex flex-col w-full lg:w-3/6 gap-16 mb-16 nosotros-mvv__content">
                <div class="flex flex-col gap-2 nosotros-mvv__item">
                    <h3 class="titulo-con-linea">Nuestra Misi&oacute;n</h3>
                    <p class="nosotros-mvv__text">Empoderar a emprendedores, negocios locales y PyMEs con soluciones
                        digitales estrat&eacute;gicas que
                        impulsen su
                        crecimiento, combinando dise&ntilde;o, funcionalidad y rendimiento para resolver problemas reales.
                    </p>
                </div>
                <div class="flex flex-col gap-2 nosotros-mvv__item">
                    <h3 class="titulo-con-linea">Nuestra Visi&oacute;n</h3>
                    <p class="nosotros-mvv__text">Ayudar a negocios y emprendimientos a digitalizarse de forma inteligente
                        mediante dise&ntilde;o web
                        optimizado,
                        desarrollo eficiente y soluciones tecnol&oacute;gicas enfocadas en resultados.</p>
                </div>
            </div>

        </div>

        <div class="flex flex-col gap-2 mt-8">
            <h3 class="titulo-con-linea">Nuestros Valores</h3>
            <div class="cars-valores grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
                <article class="card-valor">
                    <img src="{{ asset('img/icono1.png') }}" alt="icono de estrategia" class="object-contain mb-4" />
                    <h3 class="font-bold text-lg mb-2">Estrategia antes que dise&ntilde;o</h3>
                    <p>No dise&ntilde;amos por est&eacute;tica. Dise&ntilde;amos para que tu p&aacute;gina web funcione,
                        comunique valor y apoye el crecimiento de tu negocio.</p>
                </article>
                <article class="card-valor">
                    <img src="{{ asset('img/icono2.png') }}" alt="icono de resultados" class="object-contain mb-4" />
                    <h3 class="font-bold text-lg mb-2">Enfoque en resultados</h3>
                    <p>Cada decisi&oacute;n de dise&ntilde;o y contenido est&aacute; pensada para atraer, convertir y
                        retener clientes.</p>
                </article>
                <article class="card-valor">
                    <img src="{{ asset('img/icono3.png') }}" alt="icono de transparencia" class="object-contain mb-4" />
                    <h3 class="font-bold text-lg mb-2">Transparencia total</h3>
                    <p>Procesos claros, tiempos definidos y comunicaci&oacute;n directa. Sabes qu&eacute; entregamos,
                        cu&aacute;ndo y por qu&eacute; lo hacemos as&iacute;.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section nosotros-equipo">
        <div class="nosotros-equipo__head flex flex-col items-start text-left gap-4">
            <p class="badge badge-morado inline">Nuestro equipo</p>
            <h2>Personas que convierten ideas en <span class="text-gradient">resultados digitales</span></h2>
            <p>Somos un equipo multidisciplinario enfocado en estrategia, dise&ntilde;o y desarrollo para construir sitios
                web que impulsan negocios reales.</p>
        </div>

        <div class="nosotros-equipo__grid">
            <article class="equipo-card">
                <img src="{{ asset('img/team.jpg') }}" alt="Foto de Mar&iacute;a Ram&iacute;rez, directora de estrategia"
                    class="equipo-card__img" />
                <div class="equipo-card__body">
                    <h3>Mar&iacute;a Ram&iacute;rez</h3>
                    <p class="equipo-card__role">Direcci&oacute;n de Estrategia</p>
                    <p>Define la estructura digital de cada proyecto para que la web comunique valor y convierta visitas en
                        oportunidades.</p>
                </div>
            </article>

            <article class="equipo-card">
                <img src="{{ asset('img/nosotros.jpg') }}" alt="Foto de Carlos M&eacute;ndez, dise&ntilde;ador UI/UX"
                    class="equipo-card__img" />
                <div class="equipo-card__body">
                    <h3>Carlos M&eacute;ndez</h3>
                    <p class="equipo-card__role">Dise&ntilde;o UI/UX</p>
                    <p>Transforma objetivos comerciales en experiencias visuales claras, confiables y adaptadas a cada
                        industria.</p>
                </div>
            </article>

            <article class="equipo-card">
                <img src="{{ asset('img/nosotros.png') }}" alt="Foto de Andrea Torres, desarrollo web"
                    class="equipo-card__img" />
                <div class="equipo-card__body">
                    <h3>Andrea Torres</h3>
                    <p class="equipo-card__role">Desarrollo Web</p>
                    <p>Construye sitios r&aacute;pidos, estables y escalables, cuidando rendimiento, SEO t&eacute;cnico y
                        calidad de implementaci&oacute;n.</p>
                </div>
            </article>
        </div>
    </section>

    <section
        class=" section text-center  ">
        <div class="nosotros-cta px-6 py-10 md:px-10 md:py-14 w-full md:w-4/6 mx-auto flex flex-col items-center gap-8">
            <h2>Tu negocio merece una presencia digital <span class="text-gradient">profesional y efectiva</span></h2>
            <p>Lleva tu presencia digital al siguiente nivel con un sitio web optimizado, estrat&eacute;gico y alineado a
                tus objetivos.</p>
            <a href="/contacto" class="btn-primario uppercase mt-2">Cotizar Ahora</a>
        </div>

    </section>
@endsection
