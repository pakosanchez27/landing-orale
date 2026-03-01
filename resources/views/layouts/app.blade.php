<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>¡Órale Web! | @yield('titulo')</title>


    @vite(['resources/js/app.js'])

    @stack('page-styles')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

</head>

<body>
    <header class="header section contenido-centrado">
        <div class="navegacion flex items-center justify-between">
            <a href="#" class="logo">
                <img src="{{ asset('img/LogoBlanco.png') }}" alt="Logo de &Oacute;rale Web" class="w-48 object-contain" />
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
            <a href="#" class="btn-primario hidden lg:flex uppercase">
                Cotizar Ahora
            </a>
            <a href="" class="mobile lg:hidden">
                <img src="{{ asset('img/menuMobile.png') }} " alt="" />
            </a>
        </div>
    </header>



    @yield('content')


    <footer class="footer">
        <div class="footer__inner contenido-centrado">
            <div class="footer__brand">
                <img src="{{ asset('img/LogoBlanco.png') }}" alt="Logo de &Oacute;rale Web" class="footer__logo" />
                <div class="footer-social">
                    <a href="#" class="footer-social__link" aria-label="TikTok"><i class="fa-brands fa-tiktok"
                            aria-hidden="true"></i></a>
                    <a href="#" class="footer-social__link" aria-label="YouTube"><i class="fa-brands fa-youtube"
                            aria-hidden="true"></i></a>
                    <a href="#" class="footer-social__link" aria-label="Facebook"><i
                            class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#" class="footer-social__link" aria-label="Instagram"><i
                            class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                    <a href="#" class="footer-social__link" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"
                            aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="footer__col">
                <h4>Men&uacute;</h4>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Demos</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">FAQ'S</a></li>
                    <li><a href="#">Contacto</a></li>
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

   
</body>

</html>
