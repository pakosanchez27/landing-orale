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
        $shareUrl = url()->current();
        $shareTitle = $post['title'];
    @endphp
    <section class="page-hero">
        <div class="shell article-layout">
            <article class="surface-card article-card" data-reveal>
                <img src="{{ $postCover }}" alt="{{ $post['title'] }}" loading="lazy" />
                <div class="article-meta">
                    <span>{{ \Carbon\Carbon::parse($post['published_at'])->translatedFormat('d F Y') }}</span>
                    <span>{{ $post['category'] }}</span>
                    <span>{{ $post['reading_time'] }}</span>
                </div>
                <h1 style="margin: 1.8rem 0 2rem;">{{ $post['title'] }}</h1>

                <div class="article-content">
                    {!! $post['content_html'] !!}
                </div>
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
                    <span class="eyebrow">Siguiente paso</span>
                    <h3>Quieres aplicar esto en tu marca?</h3>
                    <p>Podemos revisar tu sitio actual y proponerte una direcci&oacute;n visual y estructural m&aacute;s
                        clara.</p>
                    <a href="/contacto" class="btn btn-primary" style="margin-top: 1.6rem;">Hablar del proyecto</a>
                </div>

                <div class="surface-card sidebar-card" data-reveal>
                    <span class="eyebrow">Compartir</span>
                    <h3>Lleva este articulo a tu red</h3>
                    <p>Comparte esta entrada por WhatsApp, LinkedIn, Facebook, X o copia el enlace.</p>
                    <div class="share-grid" id="share-grid" data-share-url="{{ $shareUrl }}"
                        data-share-title="{{ $shareTitle }}">
                        <a href="#" data-share-network="whatsapp" target="_blank" rel="noopener noreferrer"
                            class="share-btn share-btn--whatsapp" aria-label="Compartir por WhatsApp">
                            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                            <span>WhatsApp</span>
                        </a>
                        <a href="#" data-share-network="linkedin" target="_blank" rel="noopener noreferrer"
                            class="share-btn share-btn--linkedin" aria-label="Compartir en LinkedIn">
                            <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
                            <span>LinkedIn</span>
                        </a>
                        <a href="#" data-share-network="facebook" target="_blank" rel="noopener noreferrer"
                            class="share-btn share-btn--facebook" aria-label="Compartir en Facebook">
                            <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="#" data-share-network="x" target="_blank" rel="noopener noreferrer"
                            class="share-btn share-btn--x" aria-label="Compartir en X">
                            <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                            <span>X</span>
                        </a>
                        <button type="button" class="share-btn share-btn--copy" id="copy-article-link"
                            data-url="{{ $shareUrl }}" aria-label="Copiar enlace del articulo">
                            <i class="fa-solid fa-link" aria-hidden="true"></i>
                            <span>Copiar enlace</span>
                        </button>
                    </div>
                    <p class="share-feedback" id="share-feedback" hidden>Enlace copiado al portapapeles.</p>
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
document.addEventListener('DOMContentLoaded', function() {
    const shareGrid = document.getElementById('share-grid');
    const copyButton = document.getElementById('copy-article-link');
    const feedback = document.getElementById('share-feedback');

    if (!shareGrid || !copyButton || !feedback) {
        return;
    }

    const shareUrl = shareGrid.dataset.shareUrl || window.location.href;
    const shareTitle = shareGrid.dataset.shareTitle || document.title;

    const encodedUrl = encodeURIComponent(shareUrl);

    const shareMessage =
        'Acabo de leer este blog sobre "' + shareTitle + '" y es muy interesante, te comparto el link: ' + shareUrl;

    const shareTargets = {
        whatsapp: 'https://api.whatsapp.com/send?text=' + encodeURIComponent(shareMessage),
        linkedin: 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodedUrl,
        facebook: 'https://www.facebook.com/sharer/sharer.php?u=' + encodedUrl,
        x: 'https://twitter.com/intent/tweet?text=' +
            encodeURIComponent('Acabo de leer este blog sobre "' + shareTitle + '".') +
            '&url=' + encodedUrl
    };

    shareGrid.querySelectorAll('[data-share-network]').forEach(function(link) {
        const network = link.dataset.shareNetwork;
        const targetUrl = shareTargets[network];

        if (targetUrl) {
            link.href = targetUrl;
            link.target = '_blank';
            link.rel = 'noopener noreferrer';
        }
    });

    copyButton.addEventListener('click', async function() {
        const url = copyButton.dataset.url || shareUrl;

        if (!url) return;

        try {
            await navigator.clipboard.writeText(url);
            feedback.hidden = false;
            feedback.textContent = 'Enlace copiado al portapapeles.';
        } catch (error) {
            feedback.hidden = false;
            feedback.textContent = 'No se pudo copiar automáticamente. Copia el enlace manualmente.';
        }

        setTimeout(function() {
            feedback.hidden = true;
        }, 2400);
    });
});
</script>
@endpush
