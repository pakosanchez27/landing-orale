@extends('layouts.app')

@section('titulo')
    Blog
@endsection

@push('page-styles')
    @vite(['resources/css/blog.css'])
@endpush

@section('content')
    <section class="section blog-recientes">
        <h1 class="blog-recientes__titulo">Blogs Recientes</h1>

        <div class="blog-grid">
            <article class="blog-card blog-card--principal">
                <img src="{{ asset('img/blog-principal.png') }}" alt="Imagen del blog principal">
                <div class="blog-card__contenido">
                    <span class="blog-card__fecha">Lunes, 3 marzo 2026</span>
                    <h2>Como mejorar la UX de tu sitio web en 30 dias</h2>
                    <p>Te mostramos un plan practico para optimizar navegacion, velocidad y conversiones sin redisenar todo desde cero.</p>
                    <div class="blog-card__tags">
                        <span class="blog-tag">Diseno UX</span>
                        <span class="blog-tag">Optimizacion</span>
                        <span class="blog-tag">Conversion</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>

            <div class="blog-grid__columna">
                <article class="blog-card blog-card--secundaria">
                    <img src="{{ asset('img/blog1.png') }}" alt="Imagen del blog 1">
                    <div class="blog-card__contenido">
                        <span class="blog-card__fecha">Jueves, 27 febrero 2026</span>
                        <h2>Guia para migrar tu web a Laravel sin perder SEO</h2>
                        <p>Buenas practicas para mover tu sitio a una arquitectura moderna, manteniendo URLs, rendimiento y posicionamiento.</p>
                        <div class="blog-card__tags">
                            <span class="blog-tag">Laravel</span>
                            <span class="blog-tag">SEO tecnico</span>
                        </div>
                        <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                    </div>
                </article>

                <article class="blog-card blog-card--secundaria">
                    <img src="{{ asset('img/blog2.png') }}" alt="Imagen del blog 2">
                    <div class="blog-card__contenido">
                        <span class="blog-card__fecha">Martes, 18 febrero 2026</span>
                        <h2>Que incluye un sitio web profesional para vender mas</h2>
                        <p>Landing pages, formularios inteligentes, analitica y automatizaciones clave para convertir trafico en clientes.</p>
                        <div class="blog-card__tags">
                            <span class="blog-tag">Desarrollo web</span>
                            <span class="blog-tag">Marketing digital</span>
                        </div>
                        <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section all-blogs">
        <h2 class="all-blogs__titulo">Todos los blogs</h2>

        <div class="all-blog-grid" id="all-blog-grid">
            <article class="all-blog-card">
                <img src="{{ asset('img/blog-principal.png') }}" alt="Blog 1">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Lunes, 2 marzo 2026</span>
                    <h3>Estrategias de landing pages que si convierten</h3>
                    <p>Aprende una estructura simple para captar leads de forma constante.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Landing</span>
                        <span class="blog-tag">Conversion</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog1.png') }}" alt="Blog 2">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Sabado, 28 febrero 2026</span>
                    <h3>Como elegir un stack web para tu negocio</h3>
                    <p>Factores clave para decidir tecnologias segun presupuesto y objetivos.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Stack</span>
                        <span class="blog-tag">Negocio</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog2.png') }}" alt="Blog 3">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Jueves, 26 febrero 2026</span>
                    <h3>Checklist SEO tecnico para sitios nuevos</h3>
                    <p>Puntos esenciales para salir en buscadores desde el primer mes.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">SEO</span>
                        <span class="blog-tag">Tecnico</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog1.png') }}" alt="Blog 4">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Martes, 24 febrero 2026</span>
                    <h3>Branding web: coherencia visual en cada pagina</h3>
                    <p>Diseno consistente para mejorar confianza y reconocimiento de marca.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Branding</span>
                        <span class="blog-tag">UX</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog2.png') }}" alt="Blog 5">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Domingo, 22 febrero 2026</span>
                    <h3>Automatizaciones para agencias con formularios web</h3>
                    <p>Integra CRM, email y seguimiento sin procesos manuales.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Automatizacion</span>
                        <span class="blog-tag">CRM</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog-principal.png') }}" alt="Blog 6">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Viernes, 20 febrero 2026</span>
                    <h3>Velocidad web: como bajar el tiempo de carga</h3>
                    <p>Optimiza imagenes, scripts y servidor para mejorar experiencia y SEO.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Performance</span>
                        <span class="blog-tag">SEO</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog2.png') }}" alt="Blog 7">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Miercoles, 18 febrero 2026</span>
                    <h3>Diseno mobile first para tiendas en linea</h3>
                    <p>Prioriza la experiencia movil para incrementar ventas reales.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Mobile</span>
                        <span class="blog-tag">Ecommerce</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog1.png') }}" alt="Blog 8">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Lunes, 16 febrero 2026</span>
                    <h3>Copys web para vender sin sonar agresivo</h3>
                    <p>Mensajes claros orientados a beneficios que mueven a la accion.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Copywriting</span>
                        <span class="blog-tag">Ventas</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog-principal.png') }}" alt="Blog 9">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Sabado, 14 febrero 2026</span>
                    <h3>Errores comunes al redisenar un sitio web</h3>
                    <p>Evita perder trafico y clientes durante una migracion o rediseno.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Rediseno</span>
                        <span class="blog-tag">Estrategia</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog1.png') }}" alt="Blog 10">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Jueves, 12 febrero 2026</span>
                    <h3>Como estructurar una web corporativa moderna</h3>
                    <p>Secciones clave para comunicar valor y cerrar oportunidades comerciales.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Corporativo</span>
                        <span class="blog-tag">UX</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog2.png') }}" alt="Blog 11">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Martes, 10 febrero 2026</span>
                    <h3>Integraciones web utiles para vender servicios</h3>
                    <p>Chat, agenda, pagos y analitica para mejorar tu proceso comercial.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Integraciones</span>
                        <span class="blog-tag">Ventas</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                <img src="{{ asset('img/blog-principal.png') }}" alt="Blog 12">
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Domingo, 8 febrero 2026</span>
                    <h3>Metricas clave para evaluar un sitio web</h3>
                    <p>KPIs de negocio y UX para tomar decisiones con datos reales.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Metricas</span>
                        <span class="blog-tag">Analitica</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
        </div>

        <nav class="all-blog-pagination" id="all-blog-pagination" aria-label="Paginacion de blogs">
            <button type="button" class="all-blog-page__nav" id="all-blog-prev">Previous</button>
            <div class="all-blog-page__numbers" id="all-blog-numbers"></div>
            <button type="button" class="all-blog-page__nav" id="all-blog-next">Next</button>
        </nav>
    </section>

    <script>
        (() => {
            const cards = Array.from(document.querySelectorAll('.all-blog-card'));
            const numbersWrap = document.getElementById('all-blog-numbers');
            const prevBtn = document.getElementById('all-blog-prev');
            const nextBtn = document.getElementById('all-blog-next');

            if (!cards.length || !numbersWrap || !prevBtn || !nextBtn) return;

            const itemsPerPage = 6;
            const totalPages = Math.ceil(cards.length / itemsPerPage);
            let currentPage = 1;

            const renderPage = (page) => {
                currentPage = page;
                cards.forEach((card, index) => {
                    const start = (currentPage - 1) * itemsPerPage;
                    const end = start + itemsPerPage;
                    card.style.display = index >= start && index < end ? 'block' : 'none';
                });

                const pageBtns = numbersWrap.querySelectorAll('button');
                pageBtns.forEach((btn, idx) => {
                    btn.classList.toggle('is-active', idx + 1 === currentPage);
                });

                prevBtn.disabled = currentPage === 1;
                nextBtn.disabled = currentPage === totalPages;
            };

            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'all-blog-page__number';
                btn.textContent = i;
                btn.addEventListener('click', () => renderPage(i));
                numbersWrap.appendChild(btn);
            }

            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) renderPage(currentPage - 1);
            });

            nextBtn.addEventListener('click', () => {
                if (currentPage < totalPages) renderPage(currentPage + 1);
            });

            renderPage(1);
        })();

        (() => {
            const clickableCards = Array.from(document.querySelectorAll('.blog-card, .all-blog-card'));

            clickableCards.forEach((card) => {
                const link = card.querySelector('.blog-card__btn');
                if (!link || !link.getAttribute('href')) return;

                card.setAttribute('role', 'link');
                card.setAttribute('tabindex', '0');

                card.addEventListener('click', (event) => {
                    const target = event.target;
                    if (target instanceof Element && target.closest('a, button')) return;
                    window.location.href = link.getAttribute('href');
                });

                card.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        window.location.href = link.getAttribute('href');
                    }
                });
            });
        })();
    </script>
@endsection




