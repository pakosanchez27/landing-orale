<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>&iexcl;&Oacute;rale Web! | @yield('titulo')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <script>
        window.base_url = "{{ url('/') }}";
    </script>
    @vite(['resources/css/app-admin.css', 'resources/js/app-admin.js'])
    @vite(['resources/js/app.js'])

    @stack('page-styles')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="{{ asset('img/LogoBlanco.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/LogoBlanco.png') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <input type="hidden" id="base_url" value="{{ url('/') }}">
</head>

<body class="body-admin">
    <div class="admin-layout" id="admin-layout">
        <aside class="admin-sidebar" id="admin-sidebar" aria-label="Sidebar">
            <div class="admin-sidebar__brand">
                <div class="admin-brand">
                    <img src="{{ asset('img/LogoBlanco.png') }}" alt="Logo de &Oacute;rale Web"
                        class="admin-brand__logo" />
                </div>
                <button class="sidebar-toggle" id="sidebar-toggle" type="button" aria-label="Colapsar sidebar">
                    <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                </button>
            </div>

            <nav class="admin-nav">
                <a href="#" class="admin-nav__item is-active">
                    <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
                    <span class="admin-nav__text">Dashboard</span>
                </a>

                @role(0)
                    <a href="{{ route('usuarios') }}" class="admin-nav__item">
                        <i class="fa-solid fa-users" aria-hidden="true"></i>
                        <span class="admin-nav__text">Usuarios</span>
                    </a>

                    <div class="admin-nav__group">
                        <button type="button" class="admin-nav__item admin-nav__parent" id="catalogos-toggle"
                            aria-expanded="false" aria-controls="catalogos-children">
                            <i class="fa-solid fa-folder-open" aria-hidden="true"></i>
                            <span class="admin-nav__text">Cat&aacute;logos</span>
                            <i class="fa-solid fa-chevron-down admin-nav__chevron" aria-hidden="true"></i>
                        </button>
                        <div class="admin-nav__children" id="catalogos-children" hidden>
                            <a href="{{ route('admin.catalogos.industrias') }}" class="admin-nav__item admin-nav__child">
                                <i class="fa-solid fa-industry" aria-hidden="true"></i>
                                <span class="admin-nav__text">Industrias</span>
                            </a>
                        </div>
                    </div>
                @endrole
                <a href="{{ route('demos') }}" class="admin-nav__item">
                    <i class="fa-solid fa-circle-play" aria-hidden="true"></i>
                    <span class="admin-nav__text">Demos</span>
                    </button>
                </a>


            </nav>

            <div class="admin-sidebar__footer">
                <a href="/" class="admin-nav__item">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                    <span class="admin-nav__text">Volver al sitio</span>
                </a>
            </div>
        </aside>

        <div class="admin-main">
            <div class="admin-navtop">
                <div class="admin-search">
                    <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                    <input type="search" placeholder="Buscar..." aria-label="Buscar" />
                </div>
                <button class="admin-user" type="button" id="admin-user-btn" aria-expanded="false">
                    @php
                        $authUser = auth()->user();
                        $avatar = $authUser && $authUser->imagen ? asset($authUser->imagen) : asset('img/perfil.jpg');
                        $firstName = $authUser && $authUser->name ? strtok(trim($authUser->name), ' ') : 'Usuario';
                    @endphp
                    <img src="{{ $avatar }}" alt="Foto de usuario" />
                    <span class="admin-user__info">
                        <strong>{{ $firstName }}</strong>
                        <small>{{ $authUser?->cargo ?? 'Usuario' }}</small>
                    </span>
                    <i class="fa-solid fa-chevron-down admin-user__chevron" aria-hidden="true"></i>
                </button>
                <div class="admin-user-menu" id="admin-user-menu" hidden>
                    <a href="{{ route('admin.profile') }}">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm0 2c-4.418 0-8 2.239-8 5v1h16v-1c0-2.761-3.582-5-8-5z"
                                fill="currentColor" />
                        </svg>
                        Mi perfil
                    </a>
                    <a href="#">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M19.14 12.936a7.487 7.487 0 0 0 .052-.936 7.487 7.487 0 0 0-.052-.936l2.036-1.58a.5.5 0 0 0 .12-.64l-1.928-3.338a.5.5 0 0 0-.6-.22l-2.4.96a7.14 7.14 0 0 0-1.62-.936l-.36-2.54a.5.5 0 0 0-.494-.42h-3.856a.5.5 0 0 0-.494.42l-.36 2.54a7.14 7.14 0 0 0-1.62.936l-2.4-.96a.5.5 0 0 0-.6.22L2.704 8.844a.5.5 0 0 0 .12.64l2.036 1.58a7.487 7.487 0 0 0-.052.936 7.487 7.487 0 0 0 .052.936l-2.036 1.58a.5.5 0 0 0-.12.64l1.928 3.338a.5.5 0 0 0 .6.22l2.4-.96a7.14 7.14 0 0 0 1.62.936l.36 2.54a.5.5 0 0 0 .494.42h3.856a.5.5 0 0 0 .494-.42l.36-2.54a7.14 7.14 0 0 0 1.62-.936l2.4.96a.5.5 0 0 0 .6-.22l1.928-3.338a.5.5 0 0 0-.12-.64zM12 15.5A3.5 3.5 0 1 1 15.5 12 3.504 3.504 0 0 1 12 15.5z"
                                fill="currentColor" />
                        </svg>
                        Configuraci&oacute;n
                    </a>
                    <a type="button">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M10 17l1.41-1.41L8.83 13H20v-2H8.83l2.58-2.59L10 7l-5 5 5 5zm-8 4h8v-2H4V5h6V3H2z"
                                fill="currentColor" />
                        </svg>
                        Cerrar sesi&oacute;n
                    </a>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <div class="admin-overlay" id="admin-overlay" hidden></div>

    <script>
        const layout = document.getElementById("admin-layout");
        const sidebarToggle = document.getElementById("sidebar-toggle");
        const mobileToggle = document.getElementById("mobile-toggle");
        const overlay = document.getElementById("admin-overlay");
        const userBtn = document.getElementById("admin-user-btn");
        const userMenu = document.getElementById("admin-user-menu");
        const catalogosToggle = document.getElementById("catalogos-toggle");
        const catalogosChildren = document.getElementById("catalogos-children");

        const setCollapsed = (collapsed) => {
            layout.classList.toggle("is-collapsed", collapsed);
            localStorage.setItem("adminSidebarCollapsed", collapsed ? "1" : "0");
        };

        const setMobileOpen = (open) => {
            layout.classList.toggle("is-mobile-open", open);
            overlay.hidden = !open;
            document.body.classList.toggle("admin-lock", open);
        };

        const setUserMenu = (open) => {
            userMenu.hidden = !open;
            userBtn.setAttribute("aria-expanded", open ? "true" : "false");
        };

        const setCatalogosOpen = (open) => {
            catalogosChildren.hidden = !open;
            catalogosToggle.setAttribute("aria-expanded", open ? "true" : "false");
        };

        const savedCollapsed = localStorage.getItem("adminSidebarCollapsed") === "1";
        setCollapsed(savedCollapsed);

        sidebarToggle.addEventListener("click", () => {
            setCollapsed(!layout.classList.contains("is-collapsed"));
        });

        if (mobileToggle) {
            mobileToggle.addEventListener("click", () => setMobileOpen(true));
        }
        overlay.addEventListener("click", () => setMobileOpen(false));
        userBtn.addEventListener("click", () => setUserMenu(userMenu.hidden));
        catalogosToggle.addEventListener("click", () => setCatalogosOpen(catalogosChildren.hidden));

        document.addEventListener("click", (event) => {
            if (userMenu.hidden) return;
            if (userBtn.contains(event.target) || userMenu.contains(event.target)) return;
            setUserMenu(false);
        });

        window.addEventListener("resize", () => {
            if (window.innerWidth >= 1024) {
                setMobileOpen(false);
            }
        });
    </script>

    @stack('page-scripts')
</body>

</html>
