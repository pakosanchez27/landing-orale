@extends('layouts.app')

@section('titulo', $post['title'])
@section('meta_description', $post['excerpt'])
@section('og_image', \Illuminate\Support\Str::startsWith($post['cover_image'], ['http://', 'https://']) ?
    $post['cover_image'] : asset($post['cover_image']))
@section('og_type', 'article')

@section('content')
    @php
        $postCover = \Illuminate\Support\Str::startsWith($post['cover_image'], ['http://', 'https://'])
            ? $post['cover_image']
            : asset($post['cover_image']);
        $postUrl = route('blog.post', $post['slug']);
        $shareText = $post['title'] . ' - ' . $post['excerpt'];
        $encodedPostUrl = urlencode($postUrl);
        $encodedShareText = urlencode($shareText);
        $authorName = $post['author']['name'] ?? 'Equipo Orale Web';
        $authorRole = $post['author']['role'] ?? 'Estrategia digital, UX y desarrollo web';
        $authorAvatar = $post['author']['image'] ?? asset('img/LogoNegro.png');
        $authorSocialLinks = array_filter($post['author']['social_links'] ?? []);
    @endphp
    <section class="page-hero">
        <div class="shell article-layout">
            <article class="surface-card article-card" data-reveal>
                <img src="{{ $postCover }}" alt="{{ $post['title'] }}" loading="lazy" />
                <div class="article-meta">
                    <span>{{ \Carbon\Carbon::parse($post['published_at'])->translatedFormat('d F Y') }}</span>
                    <span>{{ $post['category'] }}</span>
                    <span>{{ $post['reading_time'] }}</span>
                    <span id="post-view-count">{{ number_format($post['view_count'] ?? 0) }} vistas</span>
                    <span id="post-share-count">{{ number_format($post['share_count'] ?? 0) }} compartidos</span>
                </div>
                <h1 style="margin: 1.8rem 0 2rem;">{{ $post['title'] }}</h1>

                <div class="article-content">
                    {!! $post['content_html'] !!}
                </div>

                <section class="article-author" data-reveal>
                    <img src="{{ $authorAvatar }}" alt="{{ $authorName }}" class="article-author__avatar" loading="lazy" />
                    <div class="article-author__copy">
                        <span class="eyebrow">Autor</span>
                        <h2>{{ $authorName }}</h2>
                        <p class="article-author__role">{{ $authorRole }}</p>
                        @if (!empty($authorSocialLinks))
                            <div class="article-author__socials">
                                @if (!empty($authorSocialLinks['facebook']))
                                    <a href="{{ $authorSocialLinks['facebook'] }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook de {{ $authorName }}" class="article-author__social article-author__social--facebook">
                                        <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                @endif
                                @if (!empty($authorSocialLinks['instagram']))
                                    <a href="{{ $authorSocialLinks['instagram'] }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram de {{ $authorName }}" class="article-author__social article-author__social--instagram">
                                        <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                                    </a>
                                @endif
                                @if (!empty($authorSocialLinks['linkedin']))
                                    <a href="{{ $authorSocialLinks['linkedin'] }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn de {{ $authorName }}" class="article-author__social article-author__social--linkedin">
                                        <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
                                    </a>
                                @endif
                                @if (!empty($authorSocialLinks['x']))
                                    <a href="{{ $authorSocialLinks['x'] }}" target="_blank" rel="noopener noreferrer" aria-label="X de {{ $authorName }}" class="article-author__social article-author__social--x">
                                        <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                                    </a>
                                @endif
                                @if (!empty($authorSocialLinks['youtube']))
                                    <a href="{{ $authorSocialLinks['youtube'] }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube de {{ $authorName }}" class="article-author__social article-author__social--youtube">
                                        <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </section>
            </article>

            <aside class="article-sidebar">
                <div class="surface-card sidebar-card" data-reveal>
                    <span class="eyebrow">Resumen</span>
                    <div class="timeline-list">
                        <div>
                            <h3>Lectura</h3>
                            <p>{{ $post['reading_time'] }}</p>
                        </div>
                        <div>
                            <h3>Categoria</h3>
                            <p>{{ $post['category'] }}</p>
                        </div>
                        <div>
                            <h3>Resumen</h3>
                            <p>{{ $post['excerpt'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="surface-card sidebar-card" data-reveal>
                    <span class="eyebrow">Compartir</span>
                    <h3>Comparte este articulo</h3>
                    <p>Llevalo a tus redes o envialo directo a alguien de tu equipo.</p>
                    <div class="share-grid">
                        <a href="https://wa.me/?text={{ $encodedShareText }}%20{{ $encodedPostUrl }}" target="_blank"
                            rel="noopener noreferrer" class="share-btn share-btn--whatsapp" data-share-trigger data-share-network="whatsapp">
                            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                            WhatsApp
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $encodedPostUrl }}" target="_blank"
                            rel="noopener noreferrer" class="share-btn share-btn--linkedin" data-share-trigger data-share-network="linkedin">
                            <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
                            LinkedIn
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedPostUrl }}" target="_blank"
                            rel="noopener noreferrer" class="share-btn share-btn--facebook" data-share-trigger data-share-network="facebook">
                            <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                            Facebook
                        </a>
                        <a href="https://x.com/intent/tweet?url={{ $encodedPostUrl }}&text={{ $encodedShareText }}" target="_blank"
                            rel="noopener noreferrer" class="share-btn share-btn--x" data-share-trigger data-share-network="x">
                            <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                            X
                        </a>
                        <button type="button" class="share-btn share-btn--copy" id="copy-post-link">
                            <i class="fa-solid fa-link" aria-hidden="true"></i>
                            Copiar enlace
                        </button>
                    </div>
                    <p class="share-feedback" id="share-feedback" hidden></p>
                </div>

                <div class="surface-card sidebar-card" data-reveal>
                    <span class="eyebrow">Siguiente paso</span>
                    <h3>Quieres aplicar esto en tu marca?</h3>
                    <p>Podemos revisar tu sitio actual y proponerte una direcci&oacute;n visual y estructural m&aacute;s
                        clara.</p>
                    <a href="/contacto" class="btn btn-primary" style="margin-top: 1.6rem;">Hablar del proyecto</a>
                </div>
            </aside>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-intro" data-reveal>
                <span class="eyebrow">Mas entradas</span>
                <h2>Articulos relacionados</h2>
            </div>

            <div class="blog-grid-modern grid-3">
                @forelse ($relatedPosts as $relatedPost)
                    @php
                        $relatedCover = \Illuminate\Support\Str::startsWith($relatedPost['cover_image'], [
                            'http://',
                            'https://',
                        ])
                            ? $relatedPost['cover_image']
                            : asset($relatedPost['cover_image']);
                    @endphp
                    <article class="blog-card-modern" data-reveal>
                        <img src="{{ $relatedCover }}" alt="{{ $relatedPost['title'] }}" loading="lazy" />
                        <div class="blog-card-modern__body">
                            <div class="blog-card-modern__meta">
                                <span>{{ \Carbon\Carbon::parse($relatedPost['published_at'])->translatedFormat('d F Y') }}</span>
                                <span>{{ $relatedPost['category'] }}</span>
                            </div>
                            <h3>{{ $relatedPost['title'] }}</h3>
                            <p>{{ $relatedPost['excerpt'] }}</p>
                            <a href="{{ route('blog.post', $relatedPost['slug']) }}" class="btn btn-secondary">Leer
                                articulo</a>
                        </div>
                    </article>
                @empty
                    <p data-reveal>No hay articulos relacionados por ahora.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script>
        (() => {
            const shareEndpoint = @json(route('blog.share', $post['slug']));
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
            const shareCountNode = document.getElementById('post-share-count');
            const feedbackNode = document.getElementById('share-feedback');
            const copyButton = document.getElementById('copy-post-link');
            const shareButtons = document.querySelectorAll('[data-share-trigger]');
            const postUrl = @json($postUrl);
            const sharedNetworks = new Set();
            const showFeedback = (message) => {
                if (!feedbackNode) return;
                feedbackNode.hidden = false;
                feedbackNode.textContent = message;
            };

            const registerShare = async (network) => {
                if (!csrfToken || !network || sharedNetworks.has(network)) return;

                sharedNetworks.add(network);
                const payload = JSON.stringify({
                    network
                });

                try {
                    const response = await fetch(shareEndpoint, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                        body: payload,
                        keepalive: true,
                    });

                    if (!response.ok) return;

                    const data = await response.json();

                    if (shareCountNode && typeof data.share_count !== 'undefined') {
                        shareCountNode.textContent = `${Number(data.share_count).toLocaleString('es-MX')} compartidos`;
                    }
                } catch (error) {
                    sharedNetworks.delete(network);
                    console.error('No se pudo registrar el compartido del blog.', error);
                }
            };

            shareButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    registerShare(button.dataset.shareNetwork);
                });
            });

            if (copyButton) {
                copyButton.addEventListener('click', async () => {
                    registerShare('copy');

                    try {
                        await navigator.clipboard.writeText(postUrl);
                        showFeedback('Enlace copiado. Ya puedes compartirlo.');
                    } catch (error) {
                        showFeedback('No se pudo copiar automaticamente. Copia este enlace desde la barra del navegador.');
                    }
                });
            }
        })();
    </script>
@endpush
