@extends('layouts.app-admin')

@section('content')
       <div class="admin-topbar">
        <a class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </a>
        <div>
            <p class="admin-topbar__eyebrow">Usuarios</p>
            <h1 class="admin-topbar__title">Administrador de usuarios</h1>
        </div>
        <div class="admin-topbar__actions">
            <a href="{{route('usuarios.create')}}" class="btn-primario" type="button">Nuevo Usuario</a>
        </div>
    </div>
@endsection
