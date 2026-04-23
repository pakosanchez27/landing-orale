<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'role',
        'description',
        'image',
        'image_webp',
        'display_mode',
        'sort_order',
        'is_active',
        'create_at',
        'update_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
