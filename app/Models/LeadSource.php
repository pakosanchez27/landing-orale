<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeadSource extends Model
{
    protected $fillable = [
        'key',
        'name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class, 'source_id');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(LeadActivity::class, 'source_id');
    }

    public function scheduledAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'scheduled_by_source_id');
    }
}
