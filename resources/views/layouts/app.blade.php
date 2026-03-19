<!doctype html>
<html lang="es">

<head>
    @php
        $pageTitle = trim($__env->yieldContent('titulo'));
        $fullTitle = $pageTitle ? "Orale Web | {$pageTitle}" : 'Orale Web';
        $metaDescription = trim($__env->yieldContent('meta_description')) ?: 'Agencia web en Mexico especializada en diseno y desarrollo de sitios rapidos, estrategicos y orientados a conversion para negocios y PyMEs.';
        $canonicalUrl = trim($__env->yieldContent('canonical_url')) ?: url()->current();
        $robots = trim($__env->yieldContent('meta_robots')) ?: 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1';
        $ogImage = trim($__env->yieldContent('og_image')) ?: asset('img/hero.png');
        $ogType = trim($__env->yieldContent('og_type')) ?: 'website';
        $sameAs = [
            'https://www.tiktok.com/@oraleweb',
            'https://youtube.com/@orale-web?si=r0vxY9H2Rx2uDXEt',
            'https://www.facebook.com/profile.php?id=61573463732776',
            'https://www.instagram.com/orale_web/',
            'https://wa.me/525512480210',
        ];
    @endphp
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $fullTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}" />
    <meta name="robots" content="{{ $robots }}" />
    <link rel="canonical" href="{{ $canonicalUrl }}" />
    <link rel="alternate" hreflang="es-mx" href="{{ $canonicalUrl }}" />
    <meta name="theme-color" content="#0f0f1a" />

    <meta property="og:locale" content="es_MX" />
    <meta property="og:type" content="{{ $ogType }}" />
    <meta property="og:site_name" content="Orale Web" />
    <meta property="og:title" content="{{ $fullTitle }}" />
    <meta property="og:description" content="{{ $metaDescription }}" />
    <meta property="og:url" content="{{ $canonicalUrl }}" />
    <meta property="og:image" content="{{ $ogImage }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $fullTitle }}" />
    <meta name="twitter:description" content="{{ $metaDescription }}" />
    <meta name="twitter:image" content="{{ $ogImage }}" />

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
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" media="print" onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    </noscript>

    <script type="application/ld+json">
        {!! json_encode(
            [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => 'Orale Web',
                'url' => config('app.url'),
                'logo' => asset('img/LogoBlanco.png'),
                'sameAs' => $sameAs,
            ],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
        ) !!}
    </script>
    <script type="application/ld+json">
        {!! json_encode(
            [
                '@context' => 'https://schema.org',
                '@type' => 'WebPage',
                'name' => $fullTitle,
                'description' => $metaDescription,
                'url' => $canonicalUrl,
                'inLanguage' => 'es-MX',
                'isPartOf' => [
                    '@type' => 'WebSite',
                    'name' => 'Orale Web',
                    'url' => config('app.url'),
                ],
            ],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
        ) !!}
    </script>
    @stack('structured-data')
</head>

<body>
    <header class="header">
        <div class="navegacion flex items-center justify-between">
            <a href="#" class="logo">
                <img src="{{ asset('img/LogoBlanco.png') }}" alt="Logo de &Oacute;rale Web" class="w-32 lg:w-36 object-contain" />
            </a>
            <nav class="hidden lg:flex">
                <ul class="menu flex space-x-8 text-white">
                    <li><a href="/" class="font-bold {{ request()->is('/') || request()->is('') ? 'active' : '' }}">Inicio</a></li>
                    <li><a href="/nosotros" class="font-bold {{ request()->is('nosotros*') ? 'active' : '' }}">Nosotros</a></li>
                    <li><a href="/demos" class="font-bold {{ request()->is('demos*') ? 'active' : '' }}">Demos</a></li>
                    <li><a href="/blog" class="font-bold {{ request()->is('blog*') ? 'active' : '' }}">Blog</a></li>
                    <li><a href="/faq" class="font-bold {{ request()->is('faq*') ? 'active' : '' }}">FAQ'S</a></li>
                    <li><a href="/contacto" class="font-bold {{ request()->is('contacto*') ? 'active' : '' }}">Contacto</a></li>
                </ul>
            </nav>
            <a href="/contacto" class="btn-primario hidden lg:flex uppercase">
                Cotizar Ahora
            </a>
            <button type="button" class="mobile-menu-btn lg:hidden" id="mobile-menu-btn" aria-label="Abrir menu"
                aria-expanded="false" aria-controls="mobile-menu-panel">
                <span class="mobile-menu-btn__line"></span>
                <span class="mobile-menu-btn__line"></span>
                <span class="mobile-menu-btn__line"></span>
            </button>
        </div>

        <div class="mobile-menu-overlay" id="mobile-menu-overlay" hidden></div>
        <nav class="mobile-menu-panel lg:hidden" id="mobile-menu-panel" aria-label="Menu movil" hidden>
            <ul class="mobile-menu-list">
                <li><a href="/" class="{{ request()->is('/') || request()->is('') ? 'active' : '' }}">Inicio</a></li>
                <li><a href="/nosotros" class="{{ request()->is('nosotros*') ? 'active' : '' }}">Nosotros</a></li>
                <li><a href="/demos" class="{{ request()->is('demos*') ? 'active' : '' }}">Demos</a></li>
                <li><a href="/blog" class="{{ request()->is('blog*') ? 'active' : '' }}">Blog</a></li>
                <li><a href="/faq" class="{{ request()->is('faq*') ? 'active' : '' }}">FAQ'S</a></li>
                <li><a href="/contacto" class="{{ request()->is('contacto*') ? 'active' : '' }}">Contacto</a></li>
            </ul>
            <a href="/contacto" class="btn-primario mobile-menu-cta uppercase">Cotizar Ahora</a>
        </nav>
    </header>

    <main id="main-content">
        @yield('content')
    </main>

    <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer" class="whatsapp-float" aria-label="WhatsApp">
        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
    </a>

    <footer class="footer">
        <div class="footer__inner contenido-centrado">
            <div class="footer__brand">
                <a href="/" aria-label="Ir al inicio de Orale Web">
                    <img src="{{ asset('img/LogoBlanco.png') }}" alt="Logo de &Oacute;rale Web" class="footer__logo" loading="lazy" />
                </a>
                <div class="footer-social">
                    <a href="https://www.tiktok.com/@oraleweb" target="_blank" rel="noopener noreferrer" class="footer-social__link" aria-label="TikTok"><i class="fa-brands fa-tiktok"
                            aria-hidden="true"></i></a>
                    <a href="https://youtube.com/@orale-web?si=r0vxY9H2Rx2uDXEt" target="_blank" rel="noopener noreferrer" class="footer-social__link" aria-label="YouTube"><i class="fa-brands fa-youtube"
                            aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=61573463732776" target="_blank" rel="noopener noreferrer" class="footer-social__link" aria-label="Facebook"><i
                            class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/orale_web/" target="_blank" rel="noopener noreferrer" class="footer-social__link" aria-label="Instagram"><i
                            class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer" class="footer-social__link" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"
                            aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="footer__col">
                <h4>Men&uacute;</h4>
                <ul>
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/nosotros">Nosotros</a></li>
                    <li><a href="/demos">Demos</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/faq">FAQ'S</a></li>
                    <li><a href="/contacto">Contacto</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h4>Industrias</h4>
                <ul>
                    <li><a href="#">Hospitalidad y Alimentos</a></li>
                    <li><a href="#">Inmobiliarias</a></li>
                    <li><a href="#">M&eacute;dica</a></li>
                    <li><a href="#">Turismo</a></li>
                    <li><a href="#">Profesional y Freelancer</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h4>Contacto</h4>
                <ul>
                    <li><a href="mailto:contacto@oraleweb.com">contacto@oraleweb.com</a></li>
                    <li><a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer">Whatsapp +52 55
                            1248 0210</a></li>
                    <li><a href="#">Aviso de privacidad</a></li>
                </ul>
            </div>
        </div>
        <p class="footer__legend">Derechos Reservados &iexcl;&Oacute;rale web! 2026</p>
    </footer>

    @stack('page-scripts')
</body>

</html>
