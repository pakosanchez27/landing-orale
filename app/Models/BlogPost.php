<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'view_count',
        'share_count',
        'author_id',
        'create_at',
        'update_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'date',
        'view_count' => 'integer',
        'share_count' => 'integer',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function shares(): HasMany
    {
        return $this->hasMany(BlogPostShare::class, 'blog_post_id');
    }
}
