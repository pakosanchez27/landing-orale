<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
        'lead_id',
        'created_by',
        'scheduled_by_source_id',
        'starts_at',
        'ends_at',
        'channel',
        'meeting_link',
        'status',
        'notes',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scheduledBySource(): BelongsTo
    {
        return $this->belongsTo(LeadSource::class, 'scheduled_by_source_id');
    }
}
