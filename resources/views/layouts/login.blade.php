<!doctype html>
<html lang="es">

<head>
    @php
        $pageTitle = trim($__env->yieldContent('titulo'));
        $fullTitle = $pageTitle ? "Orale Web | {$pageTitle}" : 'Orale Web';
    @endphp
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $fullTitle }}</title>
    <meta name="theme-color" content="#0f0f1a" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('page-styles')
    @stack('head-extra')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="{{ asset('img/LogoBlanco.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/LogoBlanco.png') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <main id="main-content">
        @yield('content')
    </main>
</body>

</html>
