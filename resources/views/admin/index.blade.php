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
            <button class="btn-primario" type="button">Nueva entrada</button>
        </div>
    </header>

    <main class="admin-content">
        <div class="admin-cards">
            <article class="admin-card">
                <p class="admin-card__label">Visitas</p>
                <h3 class="admin-card__value">12,420</h3>
                <span class="admin-card__meta">+8.4% vs. semana pasada</span>
            </article>
            <article class="admin-card">
                <p class="admin-card__label">Leads</p>
                <h3 class="admin-card__value">312</h3>
                <span class="admin-card__meta">+3.1% vs. semana pasada</span>
            </article>
            <article class="admin-card">
                <p class="admin-card__label">Tickets</p>
                <h3 class="admin-card__value">19</h3>
                <span class="admin-card__meta">2 pendientes hoy</span>
            </article>
        </div>

        <section class="admin-panel">
            <div class="admin-panel__header">
                <h2>Actividad reciente</h2>
                <button class="admin-link" type="button">Ver todo</button>
            </div>
            <div class="admin-panel__body">
                <div class="admin-activity">
                    <p class="admin-activity__title">Nueva publicaci&oacute;n creada</p>
                    <span class="admin-activity__meta">Hace 2 horas</span>
                </div>
                <div class="admin-activity">
                    <p class="admin-activity__title">3 nuevos mensajes en contacto</p>
                    <span class="admin-activity__meta">Hace 5 horas</span>
                </div>
                <div class="admin-activity">
                    <p class="admin-activity__title">Actualizaci&oacute;n de paquete profesional</p>
                    <span class="admin-activity__meta">Ayer</span>
                </div>
            </div>
        </section>
    </main>
@endsection
