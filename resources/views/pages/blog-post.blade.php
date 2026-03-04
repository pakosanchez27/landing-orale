@extends('layouts.app')

@section('titulo')
    Blog Post
@endsection

@push('page-styles')
    @vite(['resources/css/blog-post.css'])
@endpush

@section('content')
    <section class="section blog-post">
        <article class="blog-post__article">
            <img src="{{ asset('img/blog-principal.png') }}" alt="Imagen principal del post" class="blog-post__hero">

            <div class="blog-post__header">
                <span class="blog-post__fecha">Sunday, 1 Jan 2023</span>
                <h1 class="blog-post__titulo">Migrating to Linear 101</h1>
            </div>

            <div class="blog-post__body">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                </p>
            </div>

            <div class="blog-post__stats" aria-label="Post stats">
                <button type="button" class="post-stat post-stat-like" id="like-trigger" aria-pressed="false"
                    data-base-likes="22500">
                    <i class="fa-regular fa-heart post-stat-like__icon" aria-hidden="true"></i>
                    <strong id="like-count">22.5k</strong>
                </button>
                <button type="button" class="post-stat" id="comment-trigger">
                    <i class="fa-regular fa-message" aria-hidden="true"></i><strong>56</strong>
                </button>
                <button type="button" class="post-stat"><i class="fa-solid fa-share-nodes" aria-hidden="true"></i><strong>89</strong></button>
            </div>

            <section class="blog-post__interaccion" aria-label="Like and comment">
                <h2>Participa en la conversacion</h2>
                <div class="blog-post__acciones">
                    <button type="button" class="post-btn-like" id="show-comment-form">Comentar</button>
                </div>
                <form class="blog-post__comentario is-hidden" id="comment-form" action="#" method="post">
                    <div class="blog-post__comentario-identidad">
                        <div class="blog-post__campo">
                            <label for="nombre_comentario">Tu nombre (opcional)</label>
                            <input type="text" id="nombre_comentario" name="nombre_comentario"
                                placeholder="Ejemplo: Juan Perez">
                        </div>
                        <label class="blog-post__anonimo">
                            <input type="checkbox" name="anonimo" value="1">
                            <span>Publicar como anonimo</span>
                        </label>
                    </div>
                    <label for="comentario">Comenta este post</label>
                    <textarea id="comentario" name="comentario" rows="3" placeholder="Escribe tu comentario..."></textarea>
                    <button type="submit" class="post-btn-comentar">Publicar comentario</button>
                </form>

                <div class="blog-post__comentarios-demo" aria-label="Comentarios de ejemplo">
                    <h3>Comentarios recientes</h3>

                    <article class="comentario-item">
                        <div class="comentario-item__avatar">AP</div>
                        <div class="comentario-item__contenido">
                            <div class="comentario-item__meta">
                                <strong>Ana Perez</strong>
                                <span>hace 2 horas</span>
                            </div>
                            <p>Excelente guia. Me ayudo a ordenar mejor el proceso de migracion de mi sitio.</p>
                        </div>
                    </article>

                    <article class="comentario-item">
                        <div class="comentario-item__avatar">JR</div>
                        <div class="comentario-item__contenido">
                            <div class="comentario-item__meta">
                                <strong>Juan Ramos</strong>
                                <span>hace 5 horas</span>
                            </div>
                            <p>Muy buen contenido. Estaria genial ver una version enfocada en ecommerce.</p>
                        </div>
                    </article>

                    <article class="comentario-item">
                        <div class="comentario-item__avatar">LM</div>
                        <div class="comentario-item__contenido">
                            <div class="comentario-item__meta">
                                <strong>Laura Medina</strong>
                                <span>ayer</span>
                            </div>
                            <p>Aplicamos varios puntos del post y mejoramos la velocidad del sitio en una semana.</p>
                        </div>
                    </article>
                </div>
            </section>
        </article>
    </section>

    <section class="section mas-blogs">
        <h2 class="mas-blogs__titulo">Mas Entradas</h2>
        <div class="mas-blogs__grid">
            <article class="mas-blogs__card">
                <img src="{{ asset('img/blog1.png') }}" alt="Post relacionado 1">
                <div class="mas-blogs__contenido">
                    <span>Sunday, 1 Jan 2023</span>
                    <h3>Bill Walsh leadership lessons</h3>
                    <p>Like to know the secrets of transforming a 2-14 team into a 3x Super Bowl winning Dynasty?</p>
                    <div class="mas-blogs__tags">
                        <span class="mas-tag">Leadership</span>
                        <span class="mas-tag">Management</span>
                        <span class="mas-tag">Presentation</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="mas-blogs__arrow" aria-label="Leer post">&rarr;</a>
                </div>
            </article>
            <article class="mas-blogs__card">
                <img src="{{ asset('img/blog2.png') }}" alt="Post relacionado 2">
                <div class="mas-blogs__contenido">
                    <span>Sunday, 1 Jan 2023</span>
                    <h3>What is Wireframing?</h3>
                    <p>Introduction to Wireframing and its Principles. Learn from the best in the industry.</p>
                    <div class="mas-blogs__tags">
                        <span class="mas-tag">Design</span>
                        <span class="mas-tag">Research</span>
                        <span class="mas-tag">Presentation</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="mas-blogs__arrow" aria-label="Leer post">&rarr;</a>
                </div>
            </article>
            <article class="mas-blogs__card">
                <img src="{{ asset('img/blog1.png') }}" alt="Post relacionado 3">
                <div class="mas-blogs__contenido">
                    <span>Sunday, 1 Jan 2023</span>
                    <h3>PM mental models</h3>
                    <p>Mental models are simple expressions of complex processes or relationships.</p>
                    <div class="mas-blogs__tags">
                        <span class="mas-tag">Product</span>
                        <span class="mas-tag">Research</span>
                        <span class="mas-tag">Frameworks</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="mas-blogs__arrow" aria-label="Leer post">&rarr;</a>
                </div>
            </article>
            <article class="mas-blogs__card">
                <img src="{{ asset('img/blog1.png') }}" alt="Post relacionado 4">
                <div class="mas-blogs__contenido">
                    <span>Sunday, 1 Jan 2023</span>
                    <h3>Our top 10 Javascript frameworks to use</h3>
                    <p>JavaScript frameworks make development easy with extensive features and functionalities.</p>
                    <div class="mas-blogs__tags">
                        <span class="mas-tag">Software Development</span>
                        <span class="mas-tag">Tools</span>
                        <span class="mas-tag">SaaS</span>
                    </div>
                    <a href="{{ route('blog.post') }}" class="mas-blogs__arrow" aria-label="Leer post">&rarr;</a>
                </div>
            </article>
        </div>
    </section>

    <script>
        (() => {
            const likeTrigger = document.getElementById('like-trigger');
            const likeCount = document.getElementById('like-count');
            const commentTrigger = document.getElementById('comment-trigger');
            const showCommentFormBtn = document.getElementById('show-comment-form');
            const commentForm = document.getElementById('comment-form');

            if (likeTrigger && likeCount) {
                const baseLikes = Number(likeTrigger.dataset.baseLikes || 0);
                let liked = false;

                const formatLikes = (value) => {
                    if (value >= 1000) return `${(value / 1000).toFixed(1)}k`;
                    return String(value);
                };

                const renderLikes = () => {
                    const current = liked ? baseLikes + 1 : baseLikes;
                    likeCount.textContent = formatLikes(current);
                    likeTrigger.setAttribute('aria-pressed', liked ? 'true' : 'false');
                    likeTrigger.classList.toggle('is-liked', liked);
                };

                likeTrigger.addEventListener('click', () => {
                    liked = !liked;
                    renderLikes();
                });

                renderLikes();
            }

            const openCommentForm = () => {
                if (!commentForm) return;
                commentForm.classList.remove('is-hidden');
                commentForm.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                const textarea = commentForm.querySelector('textarea');
                if (textarea) textarea.focus();
            };

            if (showCommentFormBtn) showCommentFormBtn.addEventListener('click', openCommentForm);
            if (commentTrigger) commentTrigger.addEventListener('click', openCommentForm);
        })();
    </script>
@endsection
