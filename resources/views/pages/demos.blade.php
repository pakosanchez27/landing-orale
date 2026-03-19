@extends('layouts.app')

@section('titulo', 'Demos')
@section('meta_description', 'Explora demos de sitios web profesionales para diferentes industrias y descubre como podria verse tu negocio en internet.')
@section('og_image', asset('img/demos-hero.png'))

@push('page-styles')
    @vite(['resources/css/home.css', 'resources/css/demos.css'])
@endpush

@section('content')

    <div class="hero-demos section shadow-lg" style="--hero-demos-bg: url('{{ asset('img/demos-hero.png') }}');">
        <section class="section contenido-centrado flex flex-col items-center text-center gap-6 justify-end h-full mt-32">

            <h1 class="w-full lg:w-4/6 mx-auto text-center">Explora c&oacute;mo se ver&iacute;a <span class="text-gradient">tu negocio en
                    internet</span> </h1>
            <p class="w-full lg:w-4/6 mx-auto text-center">Estas demos son ejemplos de c&oacute;mo podr&iacute;amos presentar tu negocio en
                l&iacute;nea. Cada una est&aacute; dise&ntilde;ada para mostrar diferentes estilos y enfoques, pero todas pueden ser
                personalizadas para reflejar la identidad &uacute;nica de tu marca.</p>
        </section>
    </div>



    <div class="section flex flex-col items-start text-left gap-8">
        <form class="filtro" action="{{ url('/demos') }}" method="GET">
            <label for="industria" class="filtro__label">Filtrar por</label>
            <div class="filtro__select-wrap">
                <select name="industria" id="industria" class="filtro__select" onchange="this.form.submit()">
                    <option value="">Todos</option>
                    @foreach ($industriasConDemos as $industria)
                        <option value="{{ $industria->id }}" @selected((string) $industriaSeleccionada === (string) $industria->id)>
                            {{ $industria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <div class="card-demos grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
            @forelse ($demos as $demo)
                <div class="card-demo ">
                    <img src="{{ asset($demo->imagen) }}" alt="{{ $demo->titulo }}" class="w-full object-cover" loading="lazy" />
                    <div class="card-demo-texto">
                        <h3>{{ $demo->titulo }}</h3>
                        @if ($demo->industria)
                            <span class="badge" style="background-color: {{ $demo->industria->color ?: '#8c5cff' }};">
                                {{ $demo->industria->nombre }}
                            </span>
                        @endif
                        <p>{{ \Illuminate\Support\Str::limit($demo->descripcion, 110) }}</p>

                        <button
                            type="button"
                            class="btn-primario uppercase mt-4 w-full inline-flex justify-center js-demo-modal-trigger"
                            data-demo-title="{{ $demo->titulo }}"
                            data-demo-image="{{ asset($demo->imagen) }}"
                            data-demo-description="{{ $demo->descripcion }}"
                            data-demo-link="{{ $demo->link }}"
                            data-demo-industry="{{ $demo->industria?->nombre }}"
                            data-demo-color="{{ $demo->industria?->color ?: '#8c5cff' }}">
                            Ver más
                        </button>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center">No se encontraron demos para esta industria.</p>
            @endforelse
        </div>

        @if ($demos->hasPages())
            <div class="w-full demos-pagination">
                {{ $demos->links() }}
            </div>
        @endif
    </div>

@endsection

@push('page-overlays')
    <div class="demo-modal" id="demo-modal" hidden>
        <div class="demo-modal__backdrop" data-demo-modal-close></div>
        <div class="demo-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="demo-modal-title">
            <button type="button" class="demo-modal__close" id="demo-modal-close" aria-label="Cerrar modal">
                &times;
            </button>
            <div class="demo-modal__media">
                <img id="demo-modal-image" src="" alt="" loading="lazy" />
            </div>
            <div class="demo-modal__body">
                <p class="demo-modal__eyebrow">Vista previa del demo</p>
                <h3 id="demo-modal-title"></h3>
                <span class="badge demo-modal__badge" id="demo-modal-industry" hidden></span>
                <div class="demo-modal__description-wrap">
                    <p id="demo-modal-description"></p>
                </div>
                <a id="demo-modal-link" href="#" target="_blank" rel="noopener noreferrer"
                    class="btn-primario demo-modal__action uppercase inline-flex justify-center">
                    Ir al demo
                </a>
            </div>
        </div>
    </div>
@endpush

@push('page-scripts')
    <script>
        (() => {
            const modal = document.getElementById('demo-modal');
            const closeButton = document.getElementById('demo-modal-close');
            const modalTitle = document.getElementById('demo-modal-title');
            const modalImage = document.getElementById('demo-modal-image');
            const modalDescription = document.getElementById('demo-modal-description');
            const modalLink = document.getElementById('demo-modal-link');
            const modalIndustry = document.getElementById('demo-modal-industry');
            const triggers = document.querySelectorAll('.js-demo-modal-trigger');
            let previousActiveElement = null;

            if (!modal || !closeButton || !modalTitle || !modalImage || !modalDescription || !modalLink || !modalIndustry) {
                return;
            }

            const closeModal = () => {
                modal.hidden = true;
                document.body.classList.remove('demo-modal-open');
                if (previousActiveElement instanceof HTMLElement) {
                    previousActiveElement.focus();
                }
            };

            const openModal = (trigger) => {
                previousActiveElement = trigger;
                modalTitle.textContent = trigger.dataset.demoTitle || 'Demo';
                modalImage.src = trigger.dataset.demoImage || '';
                modalImage.alt = trigger.dataset.demoTitle || 'Imagen del demo';
                modalDescription.textContent = trigger.dataset.demoDescription || '';
                modalLink.href = trigger.dataset.demoLink || '#';

                if (trigger.dataset.demoIndustry) {
                    modalIndustry.hidden = false;
                    modalIndustry.textContent = trigger.dataset.demoIndustry;
                    modalIndustry.style.backgroundColor = trigger.dataset.demoColor || '#8c5cff';
                } else {
                    modalIndustry.hidden = true;
                    modalIndustry.textContent = '';
                }

                modal.hidden = false;
                document.body.classList.add('demo-modal-open');
                closeButton.focus();
            };

            triggers.forEach((trigger) => {
                trigger.addEventListener('click', () => openModal(trigger));
            });

            closeButton.addEventListener('click', closeModal);

            modal.querySelectorAll('[data-demo-modal-close]').forEach((element) => {
                element.addEventListener('click', closeModal);
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && !modal.hidden) {
                    closeModal();
                }
            });
        })();
    </script>
@endpush
