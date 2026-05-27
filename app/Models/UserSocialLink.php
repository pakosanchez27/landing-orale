<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSocialLink extends Model
{
    protected $table = 'user_social_links';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'x_url',
        'youtube_url',
        'create_at',
        'update_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
