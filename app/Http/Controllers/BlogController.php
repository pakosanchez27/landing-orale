<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
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
        $posts = $this->publishedPosts();
        $post = $posts->firstWhere('slug', $slug);

        abort_unless($post, 404);

        $relatedPosts = $posts
            ->where('slug', '!=', $slug)
            ->take(3)
            ->values();

        return view('pages.blog-post', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
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
        ]);

        return redirect()
            ->route('admin.blogs')
            ->with('status', 'Articulo creado correctamente.');
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
            ->orderByDesc('published_at')
            ->get()
            ->map(fn (BlogPost $post) => $post->toArray())
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
