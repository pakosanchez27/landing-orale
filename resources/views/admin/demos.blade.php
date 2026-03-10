@extends('layouts.app-admin')

@section('titulo')
    Demos
@endsection

@section('content')
    <header class="admin-topbar">
        <button class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
        <div>
            <p class="admin-topbar__eyebrow">Demos</p>
            <h1 class="admin-topbar__title">Catalgo de Plantillas</h1>
        </div>
        <div class="admin-topbar__actions">
            <button class="btn-primario" type="button">Crear nuevo demo</button>
        </div>
    </header>

    <main class="admin-content">

    </main>
@endsection
