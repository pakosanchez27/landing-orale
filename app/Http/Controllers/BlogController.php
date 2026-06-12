<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogPostShare;
use App\Services\OpenAiBlogGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function generateWithAi(Request $request, OpenAiBlogGenerator $generator): JsonResponse
    {
        $payload = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'idea' => ['required', 'string', 'max:2000'],
        ]);

        $generated = $generator->generate($payload['title'], $payload['idea']);

        return response()->json([
            'data' => $generated,
        ]);
    }

    public function publicIndex(): View
    {
        return view('pages.blog', [
            'posts' => $this->publishedPosts(),
        ]);
    }

    public function publicShow(string $slug): View
    {
        $postModel = BlogPost::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        abort_unless($postModel, 404);

        $viewedPosts = session()->get('viewed_blog_posts', []);

        if (!in_array($postModel->id, $viewedPosts, true)) {
            $postModel->increment('view_count');
            $viewedPosts[] = $postModel->id;
            session()->put('viewed_blog_posts', $viewedPosts);
            $postModel->refresh();
        }

        $posts = $this->publishedPosts();
        $post = $posts->firstWhere('slug', $slug);

        $relatedPosts = $posts
            ->where('slug', '!=', $slug)
            ->take(3)
            ->values();

        return view('pages.blog-post', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }

    public function registerShare(string $slug): JsonResponse
    {
        $payload = request()->validate([
            'network' => ['required', 'in:whatsapp,linkedin,facebook,x,copy'],
        ]);

        $post = BlogPost::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $post->increment('share_count');

        if (Schema::hasTable('blog_post_shares')) {
            BlogPostShare::create([
                'blog_post_id' => $post->id,
                'network' => $payload['network'],
                'ip_address' => request()->ip(),
                'user_agent' => substr((string) request()->userAgent(), 0, 65535),
                'referrer_url' => request()->headers->get('referer'),
                'shared_at' => now(),
                'create_at' => now(),
            ]);
        }

        return response()->json([
            'share_count' => $post->fresh()->share_count,
            'network' => $payload['network'],
        ]);
    }

    public function index(): View
    {
        return view('admin.blogs.index', [
            'posts' => $this->sortedPosts(),
        ]);
    }

    public function create(): View
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $payload = $this->validatePost($request, true);
        $slug = $this->uniqueSlug($payload['slug'] ?: Str::slug($payload['title']));

        BlogPost::create([
            'title' => $payload['title'],
            'slug' => $slug,
            'category' => $payload['category'],
            'excerpt' => $payload['excerpt'],
            'cover_image' => $this->storeImage($request->file('cover_image')),
            'content_html' => $payload['content_html'],
            'reading_time' => $payload['reading_time'],
            'published_at' => $payload['published_at'],
            'is_active' => $request->boolean('is_active'),
            'view_count' => 0,
            'share_count' => 0,
            'author_id' => auth()->id(),
        ]);

        return redirect()
            ->route('admin.blogs')
            ->with('status', 'Articulo creado correctamente.');
    }

    public function storeFromN8n(Request $request): JsonResponse
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'categoria' => ['required', 'string', 'max:255'],
            'tiempo_lectura' => ['required', 'string', 'max:50'],
            'fecha_publicacion' => ['required', 'date'],
            'estado' => ['required', 'string'],
            'extracto' => ['required', 'string'],
            'imagen_portada' => ['nullable', 'string'],
            'contenido' => ['required', 'string'],
        ]);

        $slug = $this->uniqueSlug($data['slug'] ?: Str::slug($data['titulo']));
        $activeStates = ['1', 'activo', 'activa', 'publicado', 'publicada', 'true', 'si', 'sí'];

        $blog = BlogPost::create([
            'title' => $data['titulo'],
            'slug' => $slug,
            'category' => $data['categoria'],
            'excerpt' => $data['extracto'],
            'cover_image' => $data['imagen_portada'] ?: 'img/blog-principal.png',
            'content_html' => $data['contenido'],
            'reading_time' => $data['tiempo_lectura'],
            'published_at' => $data['fecha_publicacion'],
            'is_active' => in_array(Str::lower($data['estado']), $activeStates, true),
            'view_count' => 0,
            'share_count' => 0,
        ]);

        return response()->json([
            'success' => true,
            'id' => $blog->id,
            'url' => url('/blog/' . $blog->slug),
            'blog' => $blog,
        ], 201);
    }

    public function edit(string $postId): View
    {
        $post = BlogPost::query()->findOrFail($postId);

        return view('admin.blogs.edit', [
            'post' => $post->toArray(),
        ]);
    }

    public function update(Request $request, string $postId): RedirectResponse
    {
        $payload = $this->validatePost($request, false);
        $post = BlogPost::query()->find($postId);

        if (!$post) {
            return redirect()
                ->route('admin.blogs')
                ->withErrors('No se encontro el articulo seleccionado.');
        }

        $post->title = $payload['title'];
        $post->slug = $this->uniqueSlug(
            $payload['slug'] ?: Str::slug($payload['title']),
            $post->id
        );
        $post->category = $payload['category'];
        $post->excerpt = $payload['excerpt'];
        $post->content_html = $payload['content_html'];
        $post->reading_time = $payload['reading_time'];
        $post->published_at = $payload['published_at'];
        $post->is_active = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            $post->cover_image = $this->storeImage($request->file('cover_image'));
        }

        $post->save();

        return redirect()
            ->route('admin.blogs')
            ->with('status', 'Articulo actualizado correctamente.');
    }

    public function destroy(string $postId): RedirectResponse
    {
        $post = BlogPost::query()->find($postId);

        if ($post) {
            $post->delete();
        }

        return redirect()
            ->route('admin.blogs')
            ->with('status', 'Articulo eliminado correctamente.');
    }

    private function validatePost(Request $request, bool $isCreate): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180'],
            'category' => ['required', 'string', 'max:120'],
            'excerpt' => ['required', 'string', 'max:260'],
            'cover_image' => $isCreate
                ? ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096']
                : ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'content_html' => ['required', 'string'],
            'reading_time' => ['required', 'string', 'max:50'],
            'published_at' => ['required', 'date'],
        ]);
    }

    private function publishedPosts(): Collection
    {
        return $this->sortedPosts()
            ->where('is_active', true)
            ->values();
    }

    private function sortedPosts(): Collection
    {
        if (!Schema::hasTable('blog_posts')) {
            return collect();
        }

        return BlogPost::query()
            ->with(['author.socialLinks'])
            ->orderByDesc('published_at')
            ->get()
            ->map(function (BlogPost $post) {
                $data = $post->toArray();

                if (Schema::hasTable('blog_post_shares')) {
                    $data['share_breakdown'] = BlogPostShare::query()
                        ->selectRaw('network, COUNT(*) as total')
                        ->where('blog_post_id', $post->id)
                        ->groupBy('network')
                        ->pluck('total', 'network')
                        ->toArray();
                } else {
                    $data['share_breakdown'] = [];
                }

                $data['author'] = $post->author ? [
                    'name' => $post->author->name,
                    'role' => $post->author->cargo,
                    'image' => $post->author->imagen ? asset($post->author->imagen) : asset('img/perfil.jpg'),
                    'social_links' => [
                        'facebook' => $post->author->socialLinks?->facebook_url,
                        'instagram' => $post->author->socialLinks?->instagram_url,
                        'linkedin' => $post->author->socialLinks?->linkedin_url,
                        'x' => $post->author->socialLinks?->x_url,
                        'youtube' => $post->author->socialLinks?->youtube_url,
                    ],
                ] : null;

                return $data;
            })
            ->values();
    }

    private function storeImage($image): string
    {
        $directory = public_path('img/blog');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
        $image->move($directory, $filename);

        return url('img/blog/' . $filename);
    }

    private function uniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug) ?: 'articulo';
        $candidate = $baseSlug;
        $counter = 2;

        while (
            BlogPost::query()
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->where('slug', $candidate)
                ->exists()
        ) {
            $candidate = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $candidate;
    }
}
