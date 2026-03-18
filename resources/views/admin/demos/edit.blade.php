@extends('layouts.app-admin')

@section('titulo')
    Editar Demo
@endsection

@section('content')
    <header class="admin-topbar">
        <a class="mobile-toggle" id="mobile-toggle" type="button" aria-label="Abrir sidebar">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </a>
        <div>
            <p class="admin-topbar__eyebrow">Demos > edit</p>
            <h1 class="admin-topbar__title">Actualiza los detalles del demo</h1>
        </div>
    </header>

    <main class="admin-content">
        <div class="w-full rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <form class="w-full" novalidate method="POST" action="{{ route('demos.update', $demo->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-full grid grid-cols-1 gap-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="flex flex-col gap-2">
                            <label class=" font-semibold text-slate-700" for="titulo">Titulo</label>
                            <input id="titulo" type="text" name="titulo"
                                value="{{ old('titulo', $demo->titulo) }}"
                                class="w-full rounded-md border border-slate-300 px-4 py-3 text-sm focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200"
                                placeholder="Titulo del demo" />
                            @error('titulo')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class=" font-semibold text-slate-700" for="industria">Industria</label>
                            <select id="industria" name="industria"
                                class="w-full rounded-md border border-slate-300 px-4 py-3 text-sm focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200">
                                <option value="">Selecciona una industria</option>
                                @foreach ($industrias as $industria)
                                    <option value="{{ $industria->id }}" @selected(old('industria', $demo->id_industria) == $industria->id)>
                                        {{ $industria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('industria')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class=" font-semibold text-slate-700" for="descripcion">Descripcion</label>
                        <textarea id="descripcion" name="descripcion" rows="5"
                            class="w-full rounded-md border border-slate-300 px-4 py-3 text-sm focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200"
                            placeholder="Describe el demo">{{ old('descripcion', $demo->descripcion) }}</textarea>
                        @error('descripcion')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class=" font-semibold text-slate-700" for="link">Link</label>
                        <input id="link" type="url" name="link"
                            value="{{ old('link', $demo->link) }}"
                            class="w-full rounded-md border border-slate-300 px-4 py-3 text-sm focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200"
                            placeholder="https://example.com" />
                        @error('link')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="flex flex-col gap-2">
                            <label class=" font-semibold text-slate-700" for="imagen-input">Imagen</label>
                            <input type="file" name="imagen" id="imagen-input" accept="image/*"
                                class="w-full rounded-md border border-slate-300 px-4 py-2 text-sm file:mr-4 file:rounded-md file:border-0 file:bg-slate-800 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-slate-700" />
                            @error('imagen')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class=" font-semibold text-slate-700" for="imagen-preview">Preview</label>
                            <div class="w-full overflow-hidden rounded-md border border-slate-200 bg-slate-50">
                                <img id="imagen-preview" src="{{ asset($demo->imagen) }}"
                                    alt="Preview de la imagen" class="h-48 w-full object-cover" />
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-primario">Guardar cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('page-scripts')
    <script>
        const imagenInput = document.getElementById("imagen-input");
        const imagenPreview = document.getElementById("imagen-preview");

        if (imagenInput && imagenPreview) {
            imagenInput.addEventListener("change", (event) => {
                const file = event.target.files && event.target.files[0];
                if (!file) {
                    imagenPreview.src = "{{ asset($demo->imagen) }}";
                    return;
                }
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagenPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
@endpush
