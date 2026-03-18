    @extends('layouts.app-admin')

    @section('titulo')
        Demos
    @endsection

    @section('content')
        <div class="admin-topbar">
            <a class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
                <i class="fa-solid fa-bars" aria-hidden="true"></i>
            </a>
            <div>
                <p class="admin-topbar__eyebrow">Demos</p>
                <h1 class="admin-topbar__title">Catalgo de Demo</h1>
            </div>
            <div class="admin-topbar__actions">
                <a href="{{ route('demos.create') }}" class="btn-primario" type="button">Nuevo Demo</a>
            </div>
        </div>

        <main class="admin-content">
            <section class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <form method="GET" action="{{ route('demos') }}" class="flex flex-col gap-4" id="demos-filter-form">
                    <div class="flex w-full max-w-xs flex-col gap-2">
                        <label for="industria" class="text-sm font-semibold text-slate-700">Filtrar por industria</label>
                        <select id="industria" name="industria"
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-[16px] focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200">
                            <option value="">Todas las industrias</option>
                            @foreach ($industrias as $industria)
                                <option value="{{ $industria->id }}" @selected((string) $industriaId === (string) $industria->id)>
                                    {{ $industria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </section>

            <section class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @forelse ($demos as $demo)
                    <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm ">
                        <div class="aspect-[16/10] overflow-hidden bg-slate-100">
                            <img src="{{ asset($demo->imagen) }}" alt="{{ $demo->titulo }}" class="h-full w-full object-cover" />
                        </div>
                        <div class="flex flex-col gap-4 p-6 ">
                            <div>
                                <h3 class="mb-2 text-2xl font-semibold text-slate-900">{{ $demo->titulo }}</h2>
                                <div class="mb-3 flex flex-wrap gap-2 text-xs font-semibold">
                                    <span class="rounded-full px-3 py-1 text-xl text-white"
                                        style="background-color: {{ $demo->industria?->color ?: '#94a3b8' }};">
                                        {{ $demo->industria?->nombre ?? 'Sin industria' }}
                                    </span>
                                    <span class="rounded-full bg-sky-100 px-3 py-1 text-sky-700 text-xl">
                                        Creado por: {{ $demo->usuario?->name ?? 'Sin asignar' }}
                                    </span>
                                </div>
                                @php
                                    $descripcionCompleta = $demo->descripcion ?? '';
                                    $descripcionCorta = \Illuminate\Support\Str::limit($descripcionCompleta, 150, '');
                                    $requiereToggle = \Illuminate\Support\Str::length($descripcionCompleta) > 150;
                                @endphp

                                <p class="text-sm leading-6 text-slate-600">
                                    <span class="demo-description" data-expanded="false"
                                        data-short="{{ $descripcionCorta }}"
                                        data-full="{{ $descripcionCompleta }}">{{ $requiereToggle ? $descripcionCorta . '...' : $descripcionCompleta }}</span>
                                    @if ($requiereToggle)
                                        <button type="button" class="ml-1 font-semibold text-sky-700 hover:text-sky-900 demo-description-toggle">
                                            Ver mas
                                        </button>
                                    @endif
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                <a href="{{ $demo->link }}" target="_blank" rel="noopener noreferrer" class="btn-action btn-blue" title="Ver demo">
                                    <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                </a>
                                @if ((int) auth()->user()->role_id === 0 || (int) auth()->id() === (int) $demo->id_usuario)
                                    <a href="{{ route('demos.edit', $demo->id) }}" class="btn-action" title="Editar demo">
                                        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('demos.destroy', $demo->id) }}" method="POST" class="admin-inline-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-danger js-delete-demo" title="Eliminar demo">
                                            <i class="fa-solid fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center text-slate-500 md:col-span-2 xl:col-span-3">
                        Aun no hay demos registrados.
                    </div>
                @endforelse
            </section>
        </main>
    @endsection

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.demo-description-toggle').forEach((button) => {
                button.addEventListener('click', () => {
                    const description = button.parentElement.querySelector('.demo-description');
                    const isExpanded = description.dataset.expanded === 'true';

                    if (isExpanded) {
                        description.textContent = description.dataset.short + '...';
                        description.dataset.expanded = 'false';
                        button.textContent = 'Ver mas';
                        return;
                    }

                    description.textContent = description.dataset.full;
                    description.dataset.expanded = 'true';
                    button.textContent = 'Ver menos';
                });
            });

            document.querySelectorAll('.js-delete-demo').forEach((button) => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();

                    const form = button.closest('form');
                    if (!form) {
                        return;
                    }

                    if (!window.Swal) {
                        form.submit();
                        return;
                    }

                    window.Swal.fire({
                        icon: 'warning',
                        title: 'Eliminar demo',
                        text: 'Esta accion eliminara la tarjeta seleccionada.',
                        showCancelButton: true,
                        confirmButtonText: 'Si, eliminar',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            const demosFilterForm = document.getElementById('demos-filter-form');
            const industriaFilter = document.getElementById('industria');

            if (demosFilterForm && industriaFilter) {
                industriaFilter.addEventListener('change', function () {
                    demosFilterForm.submit();
                });
            }

            @if (session('status'))
                if (window.Swal) {
                    window.Swal.fire({
                        icon: 'success',
                        title: '{{ session('status') }}',
                        text: 'La tarjeta de demo se guardo correctamente.',
                        confirmButtonText: 'Aceptar'
                    });
                }
            @endif
        });
    </script>
@endpush
