@extends('layouts.app')

@section('titulo', 'Demos')

@push('page-styles')
    @vite(['resources/css/home.css', 'resources/css/demos.css'])
@endpush

@section('content')

    <div class="hero-demos section" style="--hero-demos-bg: url('{{ asset('img/demos-hero.png') }}');">
        <section class="section contenido-centrado flex flex-col items-center text-center gap-6 justify-end h-full mt-32">

            <h1 class="w-full lg:w-4/6 mx-auto text-center">Explora cómo se vería <span class="text-gradient">tu negocio en
                    internet</span> </h1>
            <p class="w-full lg:w-4/6 mx-auto text-center">Estas demos son ejemplos de cómo podríamos presentar tu negocio en
                línea. Cada una está diseñada para mostrar diferentes estilos y enfoques, pero todas pueden ser
                personalizadas para reflejar la identidad única de tu marca.</p>
        </section>
    </div>



    <div class="section flex flex-col items-start text-left gap-8">
        <form class="filtro" action="#" method="GET">
            <label for="industria" class="filtro__label">Filtrar por</label>
            <div class="filtro__select-wrap">
                <select name="industria" id="industria" class="filtro__select">
                    <option value="" selected>Todos</option>
                    <option value="hospitalidad-alimentos">Hospitalidad y Alimentos</option>
                    <option value="inmobiliarias">Inmobiliarias</option>
                    <option value="medica">M&eacute;dica</option>
                    <option value="turismo">Turismo</option>
                    <option value="profesional-freelancer">Profesional y Freelancer</option>
                </select>
            </div>
        </form>

        <div class="card-demos grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
            <div class="card-demo ">
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">Médica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">Médica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">Médica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">Médica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">Médica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">Médica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">Médica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">Médica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
            <div class="card-demo ">
                <img src="{{ asset('img/demo.png') }}" alt="imagen demo" class="w-full object-cover" />
                <div class="card-demo-texto">
                    <h3>Dental Landing Page</h3>
                    <span class="badge badge-azul">Médica</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                    </p>

                    <button class="btn-primario uppercase mt-4 w-full">Ver Demo</button>
                </div>
            </div>
        </div>
        <nav class="paginador-demos" aria-label="Paginación de demos"></nav>
    </div>
@endsection
