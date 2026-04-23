<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function index()
    {
        $metrics = [
            'total_views' => 0,
            'total_shares' => 0,
            'published_posts' => 0,
            'top_post_title' => 'Aun sin datos',
            'top_post_views' => 0,
        ];

        if (Schema::hasTable('blog_posts')) {
            $metrics['total_views'] = (int) BlogPost::query()->sum('view_count');
            $metrics['total_shares'] = (int) BlogPost::query()->sum('share_count');
            $metrics['published_posts'] = (int) BlogPost::query()->where('is_active', true)->count();

            $topPost = BlogPost::query()->orderByDesc('view_count')->first();

            if ($topPost) {
                $metrics['top_post_title'] = $topPost->title;
                $metrics['top_post_views'] = (int) $topPost->view_count;
            }
        }

        return view('admin.index', compact('metrics'));
    }
}
