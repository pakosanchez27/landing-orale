@extends('layouts.app')

@section('titulo', 'Demos')
@section('meta_description', 'Explora demos de sitios web profesionales para diferentes industrias y descubre como podria verse tu negocio en internet.')
@section('og_image', asset('img/demos-hero.png'))

@section('content')
    <section class="page-hero">
        <div class="shell page-hero__card" data-reveal>
            <span class="eyebrow">Demos</span>
            <h1>Explora c&oacute;mo puede verse tu negocio con una direcci&oacute;n visual <span class="gradient-text">mas premium y actual</span>.</h1>
            <p>Cada demo es una base adaptable. El objetivo no es clonar una plantilla, sino mostrar el tipo de experiencia que podemos construir para tu industria.</p>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            @if ($industriasConDemos->isNotEmpty())
                <form class="demo-filter" action="{{ url('/demos') }}" method="GET" data-reveal>
                    <label for="industria">Filtrar por industria</label>
                    <select name="industria" id="industria" onchange="this.form.submit()">
                        <option value="">Todas las industrias</option>
                        @foreach ($industriasConDemos as $industria)
                            <option value="{{ $industria->id }}" @selected((string) $industriaSeleccionada === (string) $industria->id)>
                                {{ $industria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </form>
            @endif

            @if ($demos->count() > 0)
                <div class="card-grid grid-3">
                    @foreach ($demos as $demo)
                        @php
                            $demoImage = \Illuminate\Support\Str::startsWith($demo->imagen, ['http://', 'https://']) ? $demo->imagen : asset($demo->imagen);
                        @endphp
                        <article class="portfolio-card" data-reveal>
                            <img src="{{ $demoImage }}" alt="{{ $demo->titulo }}" loading="lazy" />
                            <div class="portfolio-card__body">
                                @if ($demo->industria)
                                    <span class="pill" style="background-color: {{ $demo->industria->color ?: '#5E1ED3' }}1A; color: {{ $demo->industria->color ?: '#5E1ED3' }};">
                                        {{ $demo->industria->nombre }}
                                    </span>
                                @endif
                                <h3>{{ $demo->titulo }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit($demo->descripcion, 130) }}</p>
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-demo-trigger
                                    data-demo-title="{{ $demo->titulo }}"
                                    data-demo-image="{{ $demoImage }}"
                                    data-demo-description="{{ $demo->descripcion }}"
                                    data-demo-link="{{ $demo->link }}"
                                    data-demo-industry="{{ $demo->industria?->nombre }}"
                                    data-demo-color="{{ $demo->industria?->color ?: '#5E1ED3' }}">
                                    Ver demo
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="empty-state surface-card" data-reveal>
                    @php
                        $emptyMessage = $industriaSeleccionada
                            ? 'No hay demos disponibles para esta industria.'
                            : 'No hay demos disponibles por ahora.';
                    @endphp
                    <h3>{{ $emptyMessage }}</h3>
                    <p>Cuando agreguemos nuevos demos apareceran aqui automaticamente.</p>
                </div>
            @endif

            @if ($demos->count() > 0 && $demos->hasPages())
                <div style="margin-top: 3rem;" data-reveal>
                    {{ $demos->links() }}
                </div>
            @endif
        </div>
    </section>

    <section class="section">
        <div class="shell cta-panel" data-reveal>
            <span class="eyebrow">Personalizacion total</span>
            <h2>Lo importante no es el demo: es lo que tu marca puede llegar a comunicar a partir de &eacute;l.</h2>
            <p>Podemos adaptar estructura, colores, tono visual, secciones y llamadas a la acci&oacute;n para que el resultado final se sienta propio.</p>
            <div class="dual-actions">
                <a href="/contacto" class="btn btn-primary">Quiero una propuesta</a>
                <a href="/paquetes" class="btn btn-secondary">Ver paquetes</a>
            </div>
        </div>
    </section>
@endsection

@push('page-overlays')
    @include('partials.demo-modal')
@endpush
