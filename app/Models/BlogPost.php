<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'cover_image',
        'content_html',
        'reading_time',
        'published_at',
        'is_active',
        'create_at',
        'update_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'date',
    ];
}
