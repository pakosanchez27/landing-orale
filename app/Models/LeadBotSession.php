<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeadBotSession extends Model
{
    protected $fillable = [
        'lead_id',
        'provider',
        'session_id',
        'qualification_result',
        'qualification_score',
        'collected_data',
        'started_at',
        'ended_at',
    ];

    protected $casts = [
        'qualification_score' => 'integer',
        'collected_data' => 'array',
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }
}
