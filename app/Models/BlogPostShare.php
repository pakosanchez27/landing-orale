<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPostShare extends Model
{
    protected $table = 'blog_post_shares';
    public $timestamps = false;

    protected $fillable = [
        'blog_post_id',
        'network',
        'ip_address',
        'user_agent',
        'referrer_url',
        'shared_at',
        'create_at',
    ];

    protected $casts = [
        'shared_at' => 'datetime',
        'create_at' => 'datetime',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class, 'blog_post_id');
    }
}
