<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orale Web | Links</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-heading: "Space Grotesk", sans-serif;
            --font-body: "Manrope", sans-serif;
            --color-bg: #f5f7fb;
            --color-surface: rgba(255, 255, 255, 0.78);
            --color-surface-strong: #ffffff;
            --color-surface-alt: #eef2f8;
            --color-text: #171a24;
            --color-muted: #5b6475;
            --color-line: rgba(23, 26, 36, 0.1);
            --color-primary: #5e1ed3;
            --color-primary-strong: #47179f;
            --color-accent: #2e8fff;
            --color-dark: #0f1729;
            --color-success: #25d366;
            --shadow-soft: 0 24px 80px rgba(31, 41, 55, 0.08);
            --shadow-card: 0 18px 48px rgba(31, 41, 55, 0.08);
            --radius-xl: 2rem;
            --radius-lg: 1.4rem;
            --radius-md: 1rem;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: var(--font-body);
            color: var(--color-text);
            background:
                radial-gradient(circle at 12% 18%, rgba(94, 30, 211, 0.14), transparent 28%),
                radial-gradient(circle at 90% 12%, rgba(46, 143, 255, 0.13), transparent 30%),
                radial-gradient(circle at 65% 92%, rgba(94, 30, 211, 0.12), transparent 32%),
                var(--color-bg);
            display: grid;
            place-items: center;
            padding: 2rem 1rem;
            overflow-x: hidden;
        }

        .bg-grid {
            position: fixed;
            inset: 0;
            pointer-events: none;
            opacity: 0.5;
            background-image: radial-gradient(rgba(94, 30, 211, 0.18) 1px, transparent 1px);
            background-size: 28px 28px;
            mask-image: linear-gradient(to bottom, transparent, black 18%, black 72%, transparent);
        }

        .page {
            width: min(100%, 480px);
            position: relative;
            z-index: 1;
        }

        .card {
            position: relative;
            overflow: hidden;
            background: var(--color-surface);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-soft);
            backdrop-filter: blur(22px);
            padding: 1.25rem;
        }

        .card::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 999px;
            background: linear-gradient(135deg, rgba(94, 30, 211, 0.14), rgba(46, 143, 255, 0.1));
            top: -110px;
            right: -105px;
            z-index: -1;
        }

        .card::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 999px;
            background: linear-gradient(135deg, rgba(46, 143, 255, 0.1), rgba(94, 30, 211, 0.08));
            bottom: -105px;
            left: -90px;
            z-index: -1;
        }

        .brand {
            text-align: center;
            padding: 1.25rem 0 1rem;
        }

        .logo-wrap {
            width: 168px;
            margin: 0 auto 1.1rem;
        }

        .logo-wrap img {
            width: 100%;
            display: block;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.45rem 0.85rem;
            border: 1px solid var(--color-line);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.72);
            color: var(--color-primary-strong);
            font-size: 0.82rem;
            font-weight: 800;
            box-shadow: 0 10px 24px rgba(94, 30, 211, 0.08);
        }

        .pulse {
            width: 0.55rem;
            height: 0.55rem;
            border-radius: 999px;
            background: var(--color-success);
            box-shadow: 0 0 0 rgba(37, 211, 102, 0.55);
            animation: pulse 1.8s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5); }
            70% { box-shadow: 0 0 0 10px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        h1 {
            margin-top: 1rem;
            font-family: var(--font-heading);
            font-size: clamp(2rem, 8vw, 3.4rem);
            line-height: 0.95;
            letter-spacing: -0.06em;
            color: var(--color-dark);
        }

        h1 span {
            color: var(--color-primary);
        }

        .subtitle {
            margin: 1rem auto 0;
            max-width: 31ch;
            color: var(--color-muted);
            font-size: 1rem;
            line-height: 1.55;
            font-weight: 600;
        }

        .links {
            display: grid;
            gap: 0.9rem;
            margin-top: 1.5rem;
        }

        .link-card {
            --link-color: var(--color-primary);
            position: relative;
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 0.9rem;
            min-height: 72px;
            padding: 0.9rem 1rem;
            border: 1px solid var(--color-line);
            border-radius: var(--radius-lg);
            background: var(--color-surface-strong);
            color: var(--color-text);
            text-decoration: none;
            box-shadow: var(--shadow-card);
            transition: transform 180ms ease, border-color 180ms ease, box-shadow 180ms ease;
            isolation: isolate;
            overflow: hidden;
        }

        .link-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, color-mix(in srgb, var(--link-color) 12%, transparent), transparent 48%);
            opacity: 0;
            transition: opacity 180ms ease;
            z-index: -1;
        }

        .link-card:hover {
            transform: translateY(-3px);
            border-color: color-mix(in srgb, var(--link-color) 35%, var(--color-line));
            box-shadow: 0 22px 54px rgba(31, 41, 55, 0.12);
        }

        .link-card:hover::after {
            opacity: 1;
        }

        .icon {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border-radius: 1rem;
            color: var(--link-color);
            background: color-mix(in srgb, var(--link-color) 11%, white);
            flex-shrink: 0;
        }

        .icon iconify-icon {
            font-size: 1.4rem;
        }

        .link-title {
            display: block;
            font-family: var(--font-heading);
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .link-desc {
            display: block;
            margin-top: 0.1rem;
            color: var(--color-muted);
            font-size: 0.84rem;
            font-weight: 600;
        }

        .arrow {
            color: var(--link-color);
            font-size: 1.25rem;
            transform: translateX(0);
            transition: transform 180ms ease;
        }

        .link-card:hover .arrow {
            transform: translateX(4px);
        }

        .facebook { --link-color: #1877f2; }
        .instagram { --link-color: #e4405f; }
        .tiktok { --link-color: #111111; }
        .youtube { --link-color: #ff0000; }
        .gmail { --link-color: #ea4335; }
        .whatsapp { --link-color: #25d366; }

        .main-cta {
            margin-top: 1rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
        }

        .mini-cta {
            border: 0;
            border-radius: var(--radius-md);
            padding: 0.9rem;
            cursor: pointer;
            font-family: var(--font-body);
            font-weight: 800;
            color: white;
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-strong));
            box-shadow: 0 16px 34px rgba(94, 30, 211, 0.24);
            transition: transform 180ms ease, box-shadow 180ms ease;
        }

        .mini-cta.secondary {
            color: var(--color-primary);
            background: var(--color-surface-strong);
            border: 1px solid var(--color-line);
            box-shadow: var(--shadow-card);
        }

        .mini-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 42px rgba(94, 30, 211, 0.26);
        }

        .footer {
            text-align: center;
            color: var(--color-muted);
            font-size: 0.82rem;
            font-weight: 700;
            padding: 1.1rem 0 0.35rem;
        }

        .toast {
            position: fixed;
            left: 50%;
            bottom: 1.4rem;
            transform: translate(-50%, 120%);
            opacity: 0;
            background: var(--color-dark);
            color: white;
            padding: 0.9rem 1rem;
            border-radius: 999px;
            box-shadow: 0 18px 48px rgba(15, 23, 41, 0.22);
            font-weight: 800;
            transition: transform 220ms ease, opacity 220ms ease;
            z-index: 5;
            white-space: nowrap;
        }

        .toast.show {
            opacity: 1;
            transform: translate(-50%, 0);
        }

        @media (max-width: 420px) {
            body {
                padding: 1rem 0.75rem;
            }

            .card {
                padding: 1rem;
                border-radius: 1.6rem;
            }

            .brand {
                padding-top: 0.8rem;
            }

            .logo-wrap {
                width: 145px;
            }

            .link-card {
                min-height: 68px;
                border-radius: 1.15rem;
            }

            .main-cta {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="bg-grid"></div>

    <main class="page">
        <section class="card">
            <header class="brand">
                <div class="logo-wrap">
                    <img src="{{ asset('img/LogoNegro.png') }}" alt="Orale Web" />
                </div>

                <div class="badge">
                    <span class="pulse"></span>
                    Links oficiales
                </div>

                <h1>Tu negocio en internet, <span>mas claro</span> y facil de encontrar.</h1>
                <p class="subtitle">
                    Siguenos, conoce lo que hacemos o escribenos para crear tu pagina web sin complicarte.
                </p>
            </header>

            <nav class="links" aria-label="Links de Orale Web">
                <a class="link-card facebook" href="https://www.facebook.com/profile.php?id=61573463732776" target="_blank" rel="noopener noreferrer">
                    <span class="icon" aria-hidden="true">
                        <iconify-icon icon="simple-icons:facebook"></iconify-icon>
                    </span>
                    <span>
                        <span class="link-title">Facebook</span>
                        <span class="link-desc">Ideas y novedades para tu negocio</span>
                    </span>
                    <span class="arrow">→</span>
                </a>

                <a class="link-card instagram" href="https://www.instagram.com/orale_web/" target="_blank" rel="noopener noreferrer">
                    <span class="icon" aria-hidden="true">
                        <iconify-icon icon="simple-icons:instagram"></iconify-icon>
                    </span>
                    <span>
                        <span class="link-title">Instagram</span>
                        <span class="link-desc">Consejos simples para vender mejor</span>
                    </span>
                    <span class="arrow">→</span>
                </a>

                <a class="link-card tiktok" href="https://www.tiktok.com/@oraleweb" target="_blank" rel="noopener noreferrer">
                    <span class="icon" aria-hidden="true">
                        <iconify-icon icon="simple-icons:tiktok"></iconify-icon>
                    </span>
                    <span>
                        <span class="link-title">TikTok</span>
                        <span class="link-desc">Videos cortos y faciles de aplicar</span>
                    </span>
                    <span class="arrow">→</span>
                </a>

                <a class="link-card youtube" href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer">
                    <span class="icon" aria-hidden="true">
                        <iconify-icon icon="simple-icons:youtube"></iconify-icon>
                    </span>
                    <span>
                        <span class="link-title">YouTube</span>
                        <span class="link-desc">Explicaciones paso a paso</span>
                    </span>
                    <span class="arrow">→</span>
                </a>

                <a class="link-card gmail" href="mailto:contacto@oraleweb.com?subject=Quiero%20informacion%20sobre%20una%20pagina%20web">
                    <span class="icon" aria-hidden="true">
                        <iconify-icon icon="simple-icons:gmail"></iconify-icon>
                    </span>
                    <span>
                        <span class="link-title">Correo</span>
                        <span class="link-desc">Cuentanos que necesitas</span>
                    </span>
                    <span class="arrow">→</span>
                </a>

                <a class="link-card whatsapp" href="https://wa.me/525512480210?text=Hola%20Orale%20Web%2C%20quiero%20informacion%20sobre%20una%20pagina%20web" target="_blank" rel="noopener noreferrer">
                    <span class="icon" aria-hidden="true">
                        <iconify-icon icon="simple-icons:whatsapp"></iconify-icon>
                    </span>
                    <span>
                        <span class="link-title">WhatsApp</span>
                        <span class="link-desc">Escribenos y te orientamos</span>
                    </span>
                    <span class="arrow">→</span>
                </a>
            </nav>

            <div class="main-cta">
                <button class="mini-cta" type="button" data-copy="https://oraleweb.com">Copiar sitio web</button>
                <button class="mini-cta secondary" type="button" data-copy="contacto@oraleweb.com">Copiar correo</button>
            </div>

            <p class="footer">oraleweb.com · Paginas web desde $3,500 MXN + IVA</p>
        </section>
    </main>

    <div class="toast" id="toast">Copiado al portapapeles</div>

    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>

    <script>
        const buttons = document.querySelectorAll('[data-copy]');
        const toast = document.getElementById('toast');
        let toastTimer;

        function showToast(message = 'Copiado al portapapeles') {
            toast.textContent = message;
            toast.classList.add('show');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => {
                toast.classList.remove('show');
            }, 1800);
        }

        async function copyText(text) {
            try {
                await navigator.clipboard.writeText(text);
                showToast('Copiado al portapapeles');
            } catch (error) {
                const tempInput = document.createElement('input');
                tempInput.value = text;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                showToast('Copiado al portapapeles');
            }
        }

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                copyText(button.dataset.copy);
            });
        });
    </script>
</body>
</html>
