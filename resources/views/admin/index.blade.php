@extends('layouts.app-admin')

@section('titulo')
    Dashboard
@endsection

@section('content')
    <header class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">Resumen</p>
            <h1 class="admin-topbar__title">Panel principal</h1>
        </div>
        <div class="admin-topbar__actions">
            <a href="{{ route('admin.blogs.create') }}" class="btn-primario">Nueva entrada</a>
        </div>
    </header>

    <main class="admin-content">
        <div class="admin-cards">
            <article class="admin-card">
                <p class="admin-card__label">Vistas de blog</p>
                <h3 class="admin-card__value">{{ number_format($metrics['total_views']) }}</h3>
                <span class="admin-card__meta">Total acumulado de lecturas en articulos</span>
            </article>
            <article class="admin-card">
                <p class="admin-card__label">Compartidos</p>
                <h3 class="admin-card__value">{{ number_format($metrics['total_shares']) }}</h3>
                <span class="admin-card__meta">Veces que se compartieron tus entradas</span>
            </article>
            <article class="admin-card">
                <p class="admin-card__label">Posts publicados</p>
                <h3 class="admin-card__value">{{ number_format($metrics['published_posts']) }}</h3>
                <span class="admin-card__meta">Articulos activos visibles al publico</span>
            </article>
        </div>

        <section class="admin-panel">
            <div class="admin-panel__header">
                <h2>Rendimiento destacado</h2>
                <a class="admin-link" href="{{ route('admin.blogs') }}">Ver blogs</a>
            </div>
            <div class="admin-panel__body">
                <div class="admin-activity">
                    <p class="admin-activity__title">Post con mas vistas</p>
                    <span class="admin-activity__meta">{{ $metrics['top_post_title'] }}</span>
                </div>
                <div class="admin-activity">
                    <p class="admin-activity__title">Lecturas del top post</p>
                    <span class="admin-activity__meta">{{ number_format($metrics['top_post_views']) }} vistas</span>
                </div>
                <div class="admin-activity">
                    <p class="admin-activity__title">Interaccion total</p>
                    <span class="admin-activity__meta">{{ number_format($metrics['total_views'] + $metrics['total_shares']) }} acciones entre vistas y compartidos</span>
                </div>
            </div>
        </section>
    </main>
@endsection
