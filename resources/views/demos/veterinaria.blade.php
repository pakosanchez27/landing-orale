<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetCare Animal Clinic | Cuidado veterinario moderno y confiable</title>
    <meta
        name="description"
        content="Veterinaria moderna con consultas, vacunas, est&eacute;tica, seguimiento preventivo y atenci&oacute;n cercana para perros y gatos."
    >
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink: "#14213D",
                        mist: "#F4F7FB",
                        line: "#D7E0EC",
                        brand: {
                            50: "#EFFAF4",
                            100: "#D8F5E3",
                            400: "#35B76A",
                            500: "#1F9C57",
                            600: "#157544",
                            700: "#115B37"
                        },
                        accent: {
                            100: "#DFF3FF",
                            500: "#2E8FFF",
                            700: "#1D5FAE"
                        },
                        sand: "#FFF4DB"
                    },
                    fontFamily: {
                        display: ["'Space Grotesk'", "sans-serif"],
                        body: ["'Manrope'", "sans-serif"]
                    },
                    boxShadow: {
                        soft: "0 20px 60px rgba(20, 33, 61, 0.10)",
                        panel: "0 24px 80px rgba(20, 33, 61, 0.12)"
                    },
                    backgroundImage: {
                        "hero-glow":
                            "radial-gradient(circle at top left, rgba(53,183,106,0.18), transparent 30%), radial-gradient(circle at top right, rgba(46,143,255,0.16), transparent 25%), linear-gradient(180deg, #f9fbff 0%, #f4f7fb 100%)"
                    },
                    animation: {
                        floaty: "floaty 5s ease-in-out infinite",
                        drift: "drift 7s ease-in-out infinite",
                        pulseSoft: "pulseSoft 3.8s ease-in-out infinite",
                        revealUp: "revealUp 0.8s ease-out both"
                    },
                    keyframes: {
                        floaty: {
                            "0%, 100%": { transform: "translateY(0px)" },
                            "50%": { transform: "translateY(-8px)" }
                        },
                        drift: {
                            "0%, 100%": { transform: "translate3d(0, 0, 0)" },
                            "50%": { transform: "translate3d(0, -6px, 0)" }
                        },
                        pulseSoft: {
                            "0%, 100%": { boxShadow: "0 0 0 0 rgba(31,156,87,0.18)" },
                            "50%": { boxShadow: "0 0 0 10px rgba(31,156,87,0)" }
                        },
                        revealUp: {
                            "0%": { opacity: "0", transform: "translateY(18px)" },
                            "100%": { opacity: "1", transform: "translateY(0)" }
                        }
                    }
                }
            }
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap"
        rel="stylesheet"
    >
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,500,0,0"
        rel="stylesheet"
    >
    <style>
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 500, "GRAD" 0, "opsz" 24;
            line-height: 1;
        }

        .section-shell {
            width: min(1200px, calc(100% - 2rem));
            margin: 0 auto;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(16px);
        }

        .grid-dots {
            background-image:
                linear-gradient(rgba(20, 33, 61, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(20, 33, 61, 0.05) 1px, transparent 1px);
            background-size: 22px 22px;
        }

        .demo-ribbon {
            background:
                linear-gradient(90deg, rgba(20, 33, 61, 0.98), rgba(17, 91, 55, 0.96)),
                linear-gradient(90deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0));
        }

        .cta-pill {
            white-space: nowrap;
        }

        [data-reveal] {
            opacity: 0;
            transform: translateY(18px);
            transition:
                opacity 700ms ease,
                transform 700ms ease;
        }

        [data-reveal].is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="bg-mist font-body text-slate-600 antialiased">
    <div class="fixed inset-0 -z-10 bg-hero-glow"></div>

    <div class="demo-ribbon border-b border-white/10 text-white">
        <div class="section-shell flex flex-col items-start justify-between gap-3 py-3 text-sm md:flex-row md:items-center">
            <div class="flex items-center gap-2 font-semibold tracking-[0.08em]">
                <span class="material-symbols-outlined text-[18px] text-brand-100">campaign</span>
                <span>Demo de <strong>&iexcl;&Oacute;rale Web!</strong></span>
            </div>
            <a
                href="https://oraleweb.com"
                target="_blank"
                rel="noopener noreferrer"
                class="cta-pill inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-white/16"
            >
                Ir a oraleweb.com
                <span class="material-symbols-outlined text-[18px]">open_in_new</span>
            </a>
        </div>
    </div>

    <header class="sticky top-0 z-50 border-b border-white/60 bg-white/80 backdrop-blur-xl">
        <div class="section-shell flex items-center justify-between gap-6 py-4">
            <a href="#inicio" class="flex items-center gap-3 text-ink">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand-500 text-white shadow-soft">
                    <span class="material-symbols-outlined text-[24px]">pets</span>
                </span>
                <span>
                    <strong class="block font-display text-lg leading-none">VetCare</strong>
                    <span class="text-sm text-slate-500">Animal Clinic</span>
                </span>
            </a>

            <nav class="hidden items-center gap-8 text-sm font-semibold text-slate-600 lg:flex">
                <a href="#servicios" class="transition hover:text-brand-600">Servicios</a>
                <a href="#proceso" class="transition hover:text-brand-600">Proceso</a>
                <a href="#testimonios" class="transition hover:text-brand-600">Testimonios</a>
                <a href="#faq" class="transition hover:text-brand-600">Preguntas</a>
            </nav>

            <div class="hidden items-center gap-3 lg:flex">
                <a
                    href="#ubicacion"
                    class="rounded-full border border-line px-5 py-3 text-sm font-semibold text-ink transition hover:border-brand-200 hover:bg-white"
                >
                    Ver ubicaci&oacute;n
                </a>
                <a
                    href="https://wa.me/525512345678"
                    class="cta-pill inline-flex min-w-[204px] items-center justify-center rounded-full bg-ink px-5 py-3 text-sm font-semibold text-white shadow-soft transition duration-300 hover:-translate-y-0.5 hover:bg-slate-800"
                >
                    Agendar por WhatsApp
                </a>
            </div>

            <button
                type="button"
                id="mobile-menu-button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-line bg-white text-ink lg:hidden"
                aria-expanded="false"
                aria-controls="mobile-menu"
                aria-label="Abrir menu"
            >
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>

        <div id="mobile-menu" class="hidden border-t border-line bg-white lg:hidden">
            <div class="section-shell grid gap-3 py-4 text-sm font-semibold text-slate-700">
                <a href="#servicios" class="rounded-2xl px-4 py-3 transition hover:bg-mist">Servicios</a>
                <a href="#proceso" class="rounded-2xl px-4 py-3 transition hover:bg-mist">Proceso</a>
                <a href="#testimonios" class="rounded-2xl px-4 py-3 transition hover:bg-mist">Testimonios</a>
                <a href="#faq" class="rounded-2xl px-4 py-3 transition hover:bg-mist">Preguntas</a>
                <a
                    href="https://wa.me/525512345678"
                    class="cta-pill mt-2 inline-flex min-w-[220px] items-center justify-center self-start rounded-full bg-ink px-5 py-3 text-center text-white"
                >
                    Agendar por WhatsApp
                </a>
            </div>
        </div>
    </header>

    <main>
        <section id="inicio" class="relative overflow-hidden py-12 lg:py-20">
            <div class="section-shell grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
                <div class="space-y-8" data-reveal>
                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-white/80 px-4 py-2 text-sm font-semibold text-brand-700 shadow-sm animate-pulseSoft"
                    >
                        <span class="material-symbols-outlined text-[18px]">verified</span>
                        Atenci&oacute;n veterinaria moderna, c&aacute;lida y preventiva
                    </div>

                    <div class="space-y-5">
                        <h1 class="max-w-3xl font-display text-5xl leading-none text-ink md:text-6xl">
                            Cuidamos a tu mascota con procesos cl&iacute;nicos claros y una experiencia que transmite confianza.
                        </h1>
                        <p class="max-w-2xl text-lg leading-8 text-slate-600 md:text-xl">
                            Consultas, vacunas, est&eacute;tica, seguimiento y orientaci&oacute;n preventiva en una cl&iacute;nica que combina
                            profesionalismo m&eacute;dico con atenci&oacute;n humana desde el primer contacto.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <a
                            href="https://wa.me/525512345678"
                            class="cta-pill inline-flex min-w-[240px] items-center justify-center gap-2 rounded-full bg-brand-500 px-7 py-4 font-semibold text-white shadow-soft transition duration-300 hover:-translate-y-0.5 hover:bg-brand-600"
                        >
                            <span class="material-symbols-outlined text-[20px]">chat</span>
                            Agendar cita ahora
                        </a>
                        <a
                            href="#servicios"
                            class="inline-flex items-center gap-2 rounded-full border border-line bg-white px-7 py-4 font-semibold text-ink transition hover:-translate-y-0.5 hover:border-accent-100"
                        >
                            Ver servicios
                            <span class="material-symbols-outlined text-[20px]">south_east</span>
                        </a>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="glass-card rounded-3xl border border-white/70 p-5 shadow-soft">
                            <p class="font-display text-3xl text-ink">+1,200</p>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Mascotas atendidas con seguimiento preventivo.</p>
                        </div>
                        <div class="glass-card rounded-3xl border border-white/70 p-5 shadow-soft">
                            <p class="font-display text-3xl text-ink">5 min</p>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Respuesta promedio por WhatsApp en horario.</p>
                        </div>
                        <div class="glass-card rounded-3xl border border-white/70 p-5 shadow-soft">
                            <p class="font-display text-3xl text-ink">4.9/5</p>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Valoraci&oacute;n percibida por familias frecuentes.</p>
                        </div>
                    </div>
                </div>

                <div class="relative" data-reveal>
                    <div class="grid-dots absolute inset-6 -z-10 rounded-[2rem]"></div>
                    <div class="relative overflow-hidden rounded-[2rem] border border-white/70 bg-ink p-4 shadow-panel transition duration-500 hover:-translate-y-1">
                        <img
                            src="https://images.unsplash.com/photo-1628009368231-7bb7cfcb0def?auto=format&fit=crop&w=1200&q=80"
                            alt="Veterinaria sonriendo mientras sostiene a un perro en consulta"
                            class="h-[540px] w-full rounded-[1.5rem] object-cover"
                        >
                    </div>

                    <div class="absolute -left-3 top-8 animate-floaty rounded-3xl bg-white p-4 shadow-soft">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-600">Prevenci&oacute;n</p>
                        <p class="mt-1 font-semibold text-ink">Vacunas, revisiones y recordatorios</p>
                    </div>

                    <div class="absolute -bottom-4 right-0 max-w-xs animate-drift rounded-3xl bg-ink p-5 text-white shadow-panel">
                        <p class="text-sm font-semibold text-white/70">Experiencia dise&ntilde;ada para reducir fricci&oacute;n</p>
                        <p class="mt-2 text-lg font-semibold">Cita r&aacute;pida, atenci&oacute;n clara y seguimiento posterior.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-8">
            <div class="section-shell">
                <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                    <article class="rounded-[1.75rem] border border-line bg-white p-6 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="material-symbols-outlined text-3xl text-brand-500">medical_services</span>
                        <h2 class="mt-5 font-display text-2xl text-ink">Atenci&oacute;n cl&iacute;nica confiable</h2>
                        <p class="mt-3 text-base leading-7">Evaluaciones completas con explicaciones simples y decisiones m&eacute;dicas bien comunicadas.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-6 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="material-symbols-outlined text-3xl text-brand-500">schedule</span>
                        <h2 class="mt-5 font-display text-2xl text-ink">Agenda sin fricci&oacute;n</h2>
                        <p class="mt-3 text-base leading-7">Flujo directo por WhatsApp para resolver dudas y confirmar horario desde el celular.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-6 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="material-symbols-outlined text-3xl text-brand-500">pets</span>
                        <h2 class="mt-5 font-display text-2xl text-ink">Perros y gatos</h2>
                        <p class="mt-3 text-base leading-7">Protocolos pensados para las necesidades m&aacute;s comunes del hogar y sus rutinas reales.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-6 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="material-symbols-outlined text-3xl text-brand-500">support_agent</span>
                        <h2 class="mt-5 font-display text-2xl text-ink">Acompa&ntilde;amiento continuo</h2>
                        <p class="mt-3 text-base leading-7">Seguimiento, recordatorios y recomendaciones para mantener la salud en el tiempo.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="servicios" class="py-16 lg:py-24">
            <div class="section-shell">
                <div class="mx-auto max-w-3xl text-center" data-reveal>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-brand-600">Servicios</p>
                    <h2 class="mt-4 font-display text-4xl text-ink md:text-5xl">Una oferta clara, &uacute;til y pensada para cada etapa del cuidado</h2>
                    <p class="mt-5 text-lg leading-8">
                        Organizamos la propuesta para que la p&aacute;gina comunique valor r&aacute;pido, reduzca dudas y facilite la conversi&oacute;n.
                    </p>
                </div>

                <div class="mt-12 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="inline-flex rounded-2xl bg-brand-50 p-3 text-brand-600">
                            <span class="material-symbols-outlined">medical_services</span>
                        </span>
                        <h3 class="mt-5 font-display text-2xl text-ink">Consulta general</h3>
                        <p class="mt-3 leading-7">Revisi&oacute;n cl&iacute;nica integral con observaciones claras y recomendaciones accionables.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="inline-flex rounded-2xl bg-brand-50 p-3 text-brand-600">
                            <span class="material-symbols-outlined">vaccines</span>
                        </span>
                        <h3 class="mt-5 font-display text-2xl text-ink">Vacunaci&oacute;n</h3>
                        <p class="mt-3 leading-7">Esquemas preventivos alineados a la edad, rutina y contexto de tu mascota.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="inline-flex rounded-2xl bg-brand-50 p-3 text-brand-600">
                            <span class="material-symbols-outlined">content_cut</span>
                        </span>
                        <h3 class="mt-5 font-display text-2xl text-ink">Est&eacute;tica y ba&ntilde;o</h3>
                        <p class="mt-3 leading-7">Cuidado de piel, pelaje y confort en una experiencia tranquila y segura.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="inline-flex rounded-2xl bg-brand-50 p-3 text-brand-600">
                            <span class="material-symbols-outlined">emergency</span>
                        </span>
                        <h3 class="mt-5 font-display text-2xl text-ink">Urgencias b&aacute;sicas</h3>
                        <p class="mt-3 leading-7">Respuesta prioritaria ante situaciones que requieren atenci&oacute;n r&aacute;pida en horario.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="inline-flex rounded-2xl bg-brand-50 p-3 text-brand-600">
                            <span class="material-symbols-outlined">dentistry</span>
                        </span>
                        <h3 class="mt-5 font-display text-2xl text-ink">Higiene dental</h3>
                        <p class="mt-3 leading-7">Prevenci&oacute;n de molestias orales con orientaci&oacute;n para h&aacute;bitos sostenibles en casa.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="inline-flex rounded-2xl bg-brand-50 p-3 text-brand-600">
                            <span class="material-symbols-outlined">medication</span>
                        </span>
                        <h3 class="mt-5 font-display text-2xl text-ink">Desparasitaci&oacute;n</h3>
                        <p class="mt-3 leading-7">Control preventivo seg&uacute;n etapa de vida, ambiente y exposici&oacute;n cotidiana.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="inline-flex rounded-2xl bg-brand-50 p-3 text-brand-600">
                            <span class="material-symbols-outlined">restaurant</span>
                        </span>
                        <h3 class="mt-5 font-display text-2xl text-ink">Gu&iacute;a nutricional</h3>
                        <p class="mt-3 leading-7">Recomendaciones realistas para mejorar bienestar, energ&iacute;a y control de peso.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <span class="inline-flex rounded-2xl bg-brand-50 p-3 text-brand-600">
                            <span class="material-symbols-outlined">inventory_2</span>
                        </span>
                        <h3 class="mt-5 font-display text-2xl text-ink">Productos esenciales</h3>
                        <p class="mt-3 leading-7">Apoyo con opciones seleccionadas para complementar el plan de cuidado.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="py-10">
            <div class="section-shell">
                <div class="overflow-hidden rounded-[2rem] bg-ink px-8 py-10 text-white shadow-panel lg:px-12" data-reveal>
                    <div class="grid items-center gap-10 lg:grid-cols-[1fr_auto]">
                        <div>
                            <p class="text-sm font-bold uppercase tracking-[0.22em] text-brand-100">Paquete destacado</p>
                            <h2 class="mt-4 font-display text-4xl md:text-5xl">Revisi&oacute;n preventiva con alto valor percibido</h2>
                            <p class="mt-4 max-w-2xl text-lg leading-8 text-white/75">
                                Una secci&oacute;n promocional m&aacute;s clara ayuda a comunicar beneficios, precio y urgencia sin sobrecargar la p&aacute;gina.
                            </p>
                        </div>
                        <div class="rounded-[1.75rem] bg-white p-7 text-slate-600 shadow-soft">
                            <p class="text-sm font-bold uppercase tracking-[0.18em] text-brand-700">Paquete Preventivo</p>
                            <p class="mt-3 font-display text-5xl text-ink">$599</p>
                            <p class="mt-1 text-sm text-slate-500">Pago &uacute;nico</p>
                            <ul class="mt-6 space-y-3 text-base">
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined mt-0.5 text-brand-500">check_circle</span>
                                    Examen f&iacute;sico general
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined mt-0.5 text-brand-500">check_circle</span>
                                    Revisi&oacute;n de esquema de vacunas
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined mt-0.5 text-brand-500">check_circle</span>
                                    Orientaci&oacute;n nutricional inicial
                                </li>
                            </ul>
                            <a
                                href="https://wa.me/525512345678"
                                class="cta-pill mt-6 inline-flex min-w-[220px] items-center justify-center rounded-full bg-brand-500 px-5 py-3 font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-brand-600"
                            >
                                Consultar disponibilidad
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="proceso" class="py-16 lg:py-24">
            <div class="section-shell">
                <div class="mx-auto max-w-3xl text-center" data-reveal>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-brand-600">Proceso</p>
                    <h2 class="mt-4 font-display text-4xl text-ink md:text-5xl">Una experiencia simple desde el primer mensaje</h2>
                </div>

                <div class="mt-12 grid gap-5 md:grid-cols-3">
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-ink font-display text-2xl text-white">1</div>
                        <h3 class="mt-6 font-display text-2xl text-ink">Escr&iacute;benos</h3>
                        <p class="mt-3 leading-7">Comparte el motivo de la visita, edad de tu mascota y cualquier antecedente relevante.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-brand-500 font-display text-2xl text-white">2</div>
                        <h3 class="mt-6 font-display text-2xl text-ink">Confirmamos horario</h3>
                        <p class="mt-3 leading-7">Te proponemos opciones disponibles y resolvemos dudas antes de la cita.</p>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-accent-500 font-display text-2xl text-white">3</div>
                        <h3 class="mt-6 font-display text-2xl text-ink">Recibes atenci&oacute;n y seguimiento</h3>
                        <p class="mt-3 leading-7">La visita termina con recomendaciones concretas y pr&oacute;ximos pasos f&aacute;ciles de recordar.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="testimonios" class="py-16 lg:py-24">
            <div class="section-shell">
                <div class="mx-auto max-w-3xl text-center" data-reveal>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-brand-600">Confianza</p>
                    <h2 class="mt-4 font-display text-4xl text-ink md:text-5xl">Testimonios que refuerzan credibilidad y cercan&iacute;a</h2>
                </div>

                <div class="mt-12 grid gap-5 lg:grid-cols-3">
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <div class="flex gap-1 text-amber-500">
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                        </div>
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            "La atenci&oacute;n se sinti&oacute; muy profesional, pero tambi&eacute;n muy humana. Salimos con todo claro y sin dudas."
                        </p>
                        <div class="mt-6">
                            <p class="font-semibold text-ink">Mariana G.</p>
                            <p class="text-sm text-slate-500">Tutora de Toby</p>
                        </div>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <div class="flex gap-1 text-amber-500">
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                        </div>
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            "Agendar fue rapid&iacute;simo y trataron a mi gata con mucha paciencia. La cl&iacute;nica transmite mucha confianza."
                        </p>
                        <div class="mt-6">
                            <p class="font-semibold text-ink">Carlos R.</p>
                            <p class="text-sm text-slate-500">Tutor de Misha</p>
                        </div>
                    </article>
                    <article class="rounded-[1.75rem] border border-line bg-white p-7 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-panel" data-reveal>
                        <div class="flex gap-1 text-amber-500">
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                            <span class="material-symbols-outlined text-[20px]">star</span>
                        </div>
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            "Lo mejor fue el seguimiento posterior. No se qued&oacute; en la consulta, realmente acompa&ntilde;aron el proceso."
                        </p>
                        <div class="mt-6">
                            <p class="font-semibold text-ink">Andrea L.</p>
                            <p class="text-sm text-slate-500">Tutora de Nala</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="ubicacion" class="py-16 lg:py-24">
            <div class="section-shell">
                <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
                    <div class="rounded-[2rem] bg-white p-8 shadow-soft" data-reveal>
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-brand-600">Ubicaci&oacute;n</p>
                        <h2 class="mt-4 font-display text-4xl text-ink">Informaci&oacute;n clara para reducir dudas antes de visitar</h2>

                        <div class="mt-8 space-y-6">
                            <div class="flex gap-4">
                                <span class="material-symbols-outlined mt-1 text-brand-500">location_on</span>
                                <div>
                                    <p class="font-semibold text-ink">Direcci&oacute;n</p>
                                    <p>Av. Siempre Viva 123, Col. Centro, Ciudad de M&eacute;xico</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <span class="material-symbols-outlined mt-1 text-brand-500">schedule</span>
                                <div>
                                    <p class="font-semibold text-ink">Horario</p>
                                    <p>Lunes a viernes de 9:00 a 19:00</p>
                                    <p>S&aacute;bado de 9:00 a 15:00</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <span class="material-symbols-outlined mt-1 text-brand-500">call</span>
                                <div>
                                    <p class="font-semibold text-ink">WhatsApp</p>
                                    <p>+52 55 1234 5678</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-wrap gap-3">
                            <a
                                href="https://maps.google.com/?q=Av.+Siempre+Viva+123,+Ciudad+de+Mexico"
                                class="rounded-full bg-ink px-5 py-3 font-semibold text-white transition hover:bg-slate-800"
                            >
                                Abrir en Google Maps
                            </a>
                            <a
                                href="https://wa.me/525512345678"
                                class="rounded-full border border-line px-5 py-3 font-semibold text-ink transition hover:bg-mist"
                            >
                                Resolver una duda
                            </a>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-[2rem] border border-line bg-white p-4 shadow-soft transition duration-500 hover:-translate-y-1" data-reveal>
                        <iframe
                            title="Mapa de ubicaci&oacute;n en Ciudad de M&eacute;xico"
                            src="https://www.google.com/maps?q=Ciudad%20de%20M%C3%A9xico&z=11&output=embed"
                            class="h-full min-h-[420px] w-full rounded-[1.5rem]"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section id="faq" class="py-16 lg:py-24">
            <div class="section-shell">
                <div class="mx-auto max-w-3xl text-center" data-reveal>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-brand-600">Preguntas frecuentes</p>
                    <h2 class="mt-4 font-display text-4xl text-ink md:text-5xl">Resolvemos objeciones antes de que frenen la conversi&oacute;n</h2>
                </div>

                <div class="mx-auto mt-12 max-w-4xl space-y-4">
                    <details class="rounded-[1.5rem] border border-line bg-white p-6 shadow-soft transition duration-300 hover:-translate-y-0.5" open data-reveal>
                        <summary class="cursor-pointer list-none font-display text-2xl text-ink">&iquest;Necesito cita previa?</summary>
                        <p class="mt-4 leading-8">S&iacute;. Agendar antes nos permite darte una atenci&oacute;n m&aacute;s puntual, organizada y sin tiempos muertos.</p>
                    </details>
                    <details class="rounded-[1.5rem] border border-line bg-white p-6 shadow-soft transition duration-300 hover:-translate-y-0.5" data-reveal>
                        <summary class="cursor-pointer list-none font-display text-2xl text-ink">&iquest;Atienden urgencias?</summary>
                        <p class="mt-4 leading-8">Atendemos urgencias b&aacute;sicas en horario y, si el caso lo requiere, te orientamos de inmediato sobre el siguiente paso.</p>
                    </details>
                    <details class="rounded-[1.5rem] border border-line bg-white p-6 shadow-soft transition duration-300 hover:-translate-y-0.5" data-reveal>
                        <summary class="cursor-pointer list-none font-display text-2xl text-ink">&iquest;Qu&eacute; mascotas reciben?</summary>
                        <p class="mt-4 leading-8">La cl&iacute;nica est&aacute; enfocada en perros y gatos, con procesos pensados para sus necesidades m&aacute;s frecuentes.</p>
                    </details>
                    <details class="rounded-[1.5rem] border border-line bg-white p-6 shadow-soft transition duration-300 hover:-translate-y-0.5" data-reveal>
                        <summary class="cursor-pointer list-none font-display text-2xl text-ink">&iquest;Puedo resolver dudas por WhatsApp?</summary>
                        <p class="mt-4 leading-8">S&iacute;. Es el canal principal para agendar, confirmar horarios y resolver preguntas previas a la visita.</p>
                    </details>
                </div>
            </div>
        </section>

        <section class="pb-20 pt-8">
            <div class="section-shell">
                <div class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-brand-500 to-ink px-8 py-12 text-center text-white shadow-panel lg:px-16" data-reveal>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-white/70">CTA final</p>
                    <h2 class="mx-auto mt-4 max-w-4xl font-display text-4xl md:text-6xl">Una landing m&aacute;s moderna tambi&eacute;n debe cerrar con un llamado claro y directo.</h2>
                    <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-white/80">
                        Si la mascota necesita atenci&oacute;n, el siguiente paso debe ser obvio, visible y f&aacute;cil de ejecutar desde cualquier dispositivo.
                    </p>
                    <div class="mt-8 flex flex-wrap justify-center gap-4">
                        <a
                            href="https://wa.me/525512345678"
                            class="cta-pill inline-flex min-w-[220px] items-center justify-center rounded-full bg-white px-7 py-4 font-semibold text-ink transition duration-300 hover:-translate-y-0.5 hover:bg-slate-100"
                        >
                            Agendar por WhatsApp
                        </a>
                        <a
                            href="https://oraleweb.com"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="cta-pill inline-flex min-w-[220px] items-center justify-center gap-2 rounded-full border border-white/25 px-7 py-4 font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-white/10"
                        >
                            Conocer &iexcl;&Oacute;rale Web!
                            <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-white/70 bg-white/80 py-8 backdrop-blur-xl">
        <div class="section-shell flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="font-display text-2xl text-ink">VetCare Animal Clinic</p>
                <p class="mt-2 text-sm text-slate-500">Landing de ejemplo redise&ntilde;ada con un enfoque m&aacute;s moderno, claro y profesional.</p>
            </div>
            <div class="flex flex-wrap gap-5 text-sm font-semibold text-slate-500">
                <a href="#servicios" class="transition hover:text-brand-600">Servicios</a>
                <a href="#proceso" class="transition hover:text-brand-600">Proceso</a>
                <a href="#faq" class="transition hover:text-brand-600">Preguntas</a>
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
        const revealItems = document.querySelectorAll("[data-reveal]");

        mobileMenuButton?.addEventListener("click", () => {
            const isExpanded = mobileMenuButton.getAttribute("aria-expanded") === "true";
            mobileMenuButton.setAttribute("aria-expanded", String(!isExpanded));
            mobileMenu.classList.toggle("hidden");
        });

        mobileMenu?.querySelectorAll("a").forEach((link) => {
            link.addEventListener("click", () => {
                mobileMenu.classList.add("hidden");
                mobileMenuButton?.setAttribute("aria-expanded", "false");
            });
        });

        if ("IntersectionObserver" in window) {
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add("is-visible");
                    revealObserver.unobserve(entry.target);
                });
            }, { threshold: 0.12 });

            revealItems.forEach((item, index) => {
                item.style.transitionDelay = `${Math.min(index * 40, 220)}ms`;
                revealObserver.observe(item);
            });
        } else {
            revealItems.forEach((item) => item.classList.add("is-visible"));
        }
    </script>
</body>
</html>
