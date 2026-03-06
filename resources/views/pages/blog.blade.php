@extends('layouts.app')

@section('titulo')
    Blog
@endsection

@section('meta_description', 'Articulos sobre diseno web, UX, SEO y estrategia digital para mejorar la presencia online y conversiones de tu negocio.')
@section('og_image', asset('img/blog-principal.png'))

@push('page-styles')
    @vite(['resources/css/blog.css'])
@endpush

@section('content')
    <section class="section ">
        <h1 class="blog-recientes__titulo">Blogs Recientes</h1>

        <div class="blog-grid">
            <article class="blog-card blog-card--principal">
                
                <img src="{{ asset('img/blog-principal.png') }}" alt="Imagen del blog principal" loading="lazy" />
                <div class="blog-card__contenido">
                    <span class="blog-card__fecha">Lunes, 3 marzo 2026</span>
                    <h2>C&oacute;mo mejorar la UX de tu sitio web en 30 d&iacute;as</h2>
                    <p>Te mostramos un plan pr&aacute;ctico para optimizar navegaci&oacute;n, velocidad y conversiones sin redise&ntilde;ar todo desde cero.</p>
                    <div class="blog-card__tags">
                        <span class="blog-tag">Dise&ntilde;o UX</span>
                        <span class="blog-tag">Optimizaci&oacute;n</span>
                        <span class="blog-tag">Conversi&oacute;n</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>

            <div class="blog-grid__columna">
                <article class="blog-card blog-card--secundaria">
                    
                <img src="{{ asset('img/blog1.png') }}" alt="Imagen del blog 1" loading="lazy" />
                    <div class="blog-card__contenido">
                        <span class="blog-card__fecha">Jueves, 27 febrero 2026</span>
                        <h2>Gu&iacute;a para migrar tu web a Laravel sin perder SEO</h2>
                        <p>Buenas pr&aacute;cticas para mover tu sitio a una arquitectura moderna, manteniendo URLs, rendimiento y posicionamiento.</p>
                        <div class="blog-card__tags">
                            <span class="blog-tag">Laravel</span>
                            <span class="blog-tag">SEO t&eacute;cnico</span>
                        </div>
                        <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                    </div>
                </article>

                <article class="blog-card blog-card--secundaria">
                    
                <img src="{{ asset('img/blog2.png') }}" alt="Imagen del blog 2" loading="lazy" />
                    <div class="blog-card__contenido">
                        <span class="blog-card__fecha">Martes, 18 febrero 2026</span>
                        <h2>Qu&eacute; incluye un sitio web profesional para vender m&aacute;s</h2>
                        <p>Landing pages, formularios inteligentes, anal&iacute;tica y automatizaciones clave para convertir tr&aacute;fico en clientes.</p>
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
                
                <img src="{{ asset('img/blog-principal.png') }}" alt="Blog 1" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Lunes, 2 marzo 2026</span>
                    <h3>Estrategias de landing pages que s&iacute; convierten</h3>
                    <p>Aprende una estructura simple para captar leads de forma constante.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Landing</span>
                        <span class="blog-tag">Conversi&oacute;n</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog1.png') }}" alt="Blog 2" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">S&aacute;bado, 28 febrero 2026</span>
                    <h3>C&oacute;mo elegir un stack web para tu negocio</h3>
                    <p>Factores clave para decidir tecnolog&iacute;as seg&uacute;n presupuesto y objetivos.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Stack</span>
                        <span class="blog-tag">Negocio</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog2.png') }}" alt="Blog 3" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Jueves, 26 febrero 2026</span>
                    <h3>Checklist SEO t&eacute;cnico para sitios nuevos</h3>
                    <p>Puntos esenciales para salir en buscadores desde el primer mes.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">SEO</span>
                        <span class="blog-tag">T&eacute;cnico</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog1.png') }}" alt="Blog 4" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Martes, 24 febrero 2026</span>
                    <h3>Branding web: coherencia visual en cada p&aacute;gina</h3>
                    <p>Dise&ntilde;o consistente para mejorar confianza y reconocimiento de marca.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Branding</span>
                        <span class="blog-tag">UX</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog2.png') }}" alt="Blog 5" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Domingo, 22 febrero 2026</span>
                    <h3>Automatizaciones para agencias con formularios web</h3>
                    <p>Integra CRM, email y seguimiento sin procesos manuales.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Automatizaci&oacute;n</span>
                        <span class="blog-tag">CRM</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog-principal.png') }}" alt="Blog 6" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Viernes, 20 febrero 2026</span>
                    <h3>Velocidad web: c&oacute;mo bajar el tiempo de carga</h3>
                    <p>Optimiza im&aacute;genes, scripts y servidor para mejorar experiencia y SEO.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Performance</span>
                        <span class="blog-tag">SEO</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog2.png') }}" alt="Blog 7" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Mi&eacute;rcoles, 18 febrero 2026</span>
                    <h3>Dise&ntilde;o mobile first para tiendas en l&iacute;nea</h3>
                    <p>Prioriza la experiencia m&oacute;vil para incrementar ventas reales.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Mobile</span>
                        <span class="blog-tag">Ecommerce</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog1.png') }}" alt="Blog 8" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Lunes, 16 febrero 2026</span>
                    <h3>Copys web para vender sin sonar agresivo</h3>
                    <p>Mensajes claros orientados a beneficios que mueven a la acci&oacute;n.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Copywriting</span>
                        <span class="blog-tag">Ventas</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog-principal.png') }}" alt="Blog 9" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">S&aacute;bado, 14 febrero 2026</span>
                    <h3>Errores comunes al redise&ntilde;ar un sitio web</h3>
                    <p>Evita perder tr&aacute;fico y clientes durante una migraci&oacute;n o redise&ntilde;o.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Redise&ntilde;o</span>
                        <span class="blog-tag">Estrategia</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog1.png') }}" alt="Blog 10" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Jueves, 12 febrero 2026</span>
                    <h3>C&oacute;mo estructurar una web corporativa moderna</h3>
                    <p>Secciones clave para comunicar valor y cerrar oportunidades comerciales.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Corporativo</span>
                        <span class="blog-tag">UX</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog2.png') }}" alt="Blog 11" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Martes, 10 febrero 2026</span>
                    <h3>Integraciones web &uacute;tiles para vender servicios</h3>
                    <p>Chat, agenda, pagos y anal&iacute;tica para mejorar tu proceso comercial.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">Integraciones</span>
                        <span class="blog-tag">Ventas</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
            <article class="all-blog-card">
                
                <img src="{{ asset('img/blog-principal.png') }}" alt="Blog 12" loading="lazy" />
                <div class="all-blog-card__content">
                    <span class="all-blog-card__fecha">Domingo, 8 febrero 2026</span>
                    <h3>M&eacute;tricas clave para evaluar un sitio web</h3>
                    <p>KPIs de negocio y UX para tomar decisiones con datos reales.</p>
                    <div class="all-blog-card__tags">
                        <span class="blog-tag">M&eacute;tricas</span>
                        <span class="blog-tag">Anal&iacute;tica</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="blog-card__btn">&rarr;</a>
                </div>
            </article>
        </div>

        <nav class="all-blog-pagination" id="all-blog-pagination" aria-label="Paginaci&oacute;n de blogs">
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





