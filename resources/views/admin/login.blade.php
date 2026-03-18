@extends('layouts.login')

@section('content')
    <div class="min-h-screen bg-[#f6f7fb] px-4 font-['Poppins']">
        <div class="mx-auto flex min-h-screen max-w-xl flex-col items-center justify-center py-12">
            <div class="mb-8 flex items-center justify-center">
                <img src="{{ asset('img/LogoNegro.png') }}" alt="Logo de Orale Web" class="h-64 w-64 object-contain" />
            </div>

            <h3 class="text-3xl font-semibold text-gray-900 text-center">Iniciar sesion</h3>
            <p class="mt-2 text-center text-2xl text-gray-500">Accede con tus credenciales</p>

            <div class="login-card mt-8 w-full rounded-2xl bg-white p-10 shadow-lg">
                @if (session('status'))
                    <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST" class="space-y-5" novalidate>
                    @csrf

                    <div>
                        <label class="mb-2 block text-xl font-medium text-gray-600">Correo electronico</label>
                        <input type="email" name="email" required
                            class="text-xs w-full rounded-xl border border-gray-200 bg-[#f4f6fb] px-4 py-3 text-gray-800 placeholder-gray-400 outline-none transition focus:border-[#5e1ed3] focus:ring-2 focus:ring-[#5e1ed3]/20"
                            placeholder="tu@ejemplo.com">
                    </div>

                    <div>
                        <label class="mb-2 block text-xl font-medium text-gray-600">Contrasena</label>
                        <div class="relative">
                            <input type="password" name="password" required
                                class="text-xs w-full rounded-xl border border-gray-200 bg-white px-4 py-3 pr-10 text-gray-800 placeholder-gray-400 outline-none transition focus:border-[#5e1ed3] focus:ring-2 focus:ring-[#5e1ed3]/20"
                                placeholder="••••••••">
                            <span class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <i class="fa-regular fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit"
                        class="mt-2 w-full rounded-xl bg-[#5e1ed3] py-3 text-sm font-semibold text-white shadow-md transition hover:bg-[#4a17a7]">
                        Iniciar sesion
                    </button>
                </form>

                <div class="mt-5 text-center">
                    <a href="#" class="text-xs text-gray-400 hover:text-[#5e1ed3]">Olvidaste tu contrasena?</a>
                </div>
            </div>
        </div>
    </div>
@endsection
