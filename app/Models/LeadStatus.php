<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeadStatus extends Model
{
    protected $fillable = [
        'key',
        'name',
        'sort_order',
        'color',
        'is_closed',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_closed' => 'boolean',
    ];

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class, 'status_id');
    }
}
