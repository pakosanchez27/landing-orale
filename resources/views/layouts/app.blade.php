<!doctype html>
<html lang="es" class="scroll-smooth">

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
    <meta name="theme-color" content="#f5f7fb" />

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

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="{{ asset('img/LogoBlanco.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/LogoBlanco.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet" />
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" media="print" onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    </noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('page-styles')
    @stack('head-extra')

    <script type="application/ld+json">
        {!! json_encode(
            [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => 'Orale Web',
                'url' => config('app.url'),
                'logo' => asset('img/LogoNegro.png'),
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

<body class="site-body">
    <div class="site-background" aria-hidden="true"></div>

    <header class="site-header">
        <div class="shell">
            <div class="header-bar">
                <a href="/" class="brand-mark" aria-label="Ir al inicio de Orale Web">
                    <img src="{{ asset('img/LogoNegro.png') }}" alt="Logo de Orale Web" class="brand-mark__logo" />
                </a>

                <nav class="desktop-nav" aria-label="Principal">
                    <a href="/" class="{{ request()->is('/') || request()->is('') ? 'is-active' : '' }}">Inicio</a>
                    <a href="/nosotros" class="{{ request()->is('nosotros*') ? 'is-active' : '' }}">Nosotros</a>
                    <a href="/demos" class="{{ request()->is('demos*') ? 'is-active' : '' }}">Demos</a>
                    <a href="/paquetes" class="{{ request()->is('paquetes*') ? 'is-active' : '' }}">Paquetes</a>
                    <a href="/blog" class="{{ request()->is('blog*') ? 'is-active' : '' }}">Blog</a>
                    <a href="/faq" class="{{ request()->is('faq*') ? 'is-active' : '' }}">FAQ</a>
                </nav>

                <div class="header-actions">
                    <a href="/contacto" class="btn btn-primary header-cta">Agenda una llamada</a>
                    <button type="button" class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Abrir menu"
                        aria-expanded="false" aria-controls="mobile-menu-panel">
                        <span class="mobile-menu-btn__line"></span>
                        <span class="mobile-menu-btn__line"></span>
                        <span class="mobile-menu-btn__line"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="mobile-menu-overlay" id="mobile-menu-overlay" hidden></div>
        <nav class="mobile-menu-panel" id="mobile-menu-panel" aria-label="Menu movil" hidden>
            <div class="mobile-menu-panel__top">
                <span class="mobile-menu-panel__label">Navegacion</span>
                <a href="/contacto" class="btn btn-primary">Cotizar proyecto</a>
            </div>
            <div class="mobile-menu-list">
                <a href="/" class="{{ request()->is('/') || request()->is('') ? 'is-active' : '' }}">Inicio</a>
                <a href="/nosotros" class="{{ request()->is('nosotros*') ? 'is-active' : '' }}">Nosotros</a>
                <a href="/demos" class="{{ request()->is('demos*') ? 'is-active' : '' }}">Demos</a>
                <a href="/paquetes" class="{{ request()->is('paquetes*') ? 'is-active' : '' }}">Paquetes</a>
                <a href="/blog" class="{{ request()->is('blog*') ? 'is-active' : '' }}">Blog</a>
                <a href="/faq" class="{{ request()->is('faq*') ? 'is-active' : '' }}">FAQ</a>
                <a href="/contacto" class="{{ request()->is('contacto*') ? 'is-active' : '' }}">Contacto</a>
            </div>
        </nav>
    </header>

    <main id="main-content">
        @yield('content')
    </main>

    <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer" class="whatsapp-float" aria-label="Escribir por WhatsApp">
        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
    </a>

    <footer class="site-footer">
        <div class="shell footer-grid">
            <div class="footer-brand">
                <p class="eyebrow">Orale Web</p>
                <img src="{{ asset('img/LogoNegro.png') }}" alt="Logo de Orale Web" class="footer-brand__logo" />
                <h2>Sitios web y landing pages dise&ntilde;adas para convertir atenci&oacute;n en oportunidades reales.</h2>
                <p>Combinamos estrategia, dise&ntilde;o y desarrollo para construir experiencias digitales que se ven premium y venden mejor.</p>
                <div class="footer-social">
                    <a href="https://www.instagram.com/orale_web/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=61573463732776" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.tiktok.com/@oraleweb" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://youtube.com/@orale-web?si=r0vxY9H2Rx2uDXEt" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <div>
                <h3 class="footer-title">Mapa del sitio</h3>
                <div class="footer-links">
                    <a href="/">Inicio</a>
                    <a href="/nosotros">Nosotros</a>
                    <a href="/demos">Demos</a>
                    <a href="/paquetes">Paquetes</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                </div>
            </div>

            <div>
                <h3 class="footer-title">Servicios</h3>
                <div class="footer-links">
                    <a href="/paquetes">Sitios corporativos</a>
                    <a href="/paquetes">Landing pages</a>
                    <a href="/demos">Demos por industria</a>
                    <a href="/contacto">Consultoria digital</a>
                </div>
            </div>

            <div>
                <h3 class="footer-title">Contacto</h3>
                <div class="footer-links">
                    <a href="mailto:contacto@oraleweb.com">contacto@oraleweb.com</a>
                    <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer">WhatsApp +52 55 1248 0210</a>
                    <a href="/faq">Preguntas frecuentes</a>
                </div>
            </div>
        </div>
        <div class="shell footer-bottom">
            <p>&copy; 2026 Orale Web. Todos los derechos reservados.</p>
            <p>Dise&ntilde;o estrat&eacute;gico, desarrollo veloz y presencia digital con car&aacute;cter.</p>
        </div>
    </footer>

    @stack('page-overlays')
    @stack('page-scripts')
</body>

</html>
