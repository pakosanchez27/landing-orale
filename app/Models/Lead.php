<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Lead extends Model
{
    protected $fillable = [
        'uuid',
        'full_name',
        'email',
        'phone_country_code',
        'phone_number',
        'phone_e164',
        'whatsapp_number',
        'company_name',
        'industry_id',
        'source_id',
        'status_id',
        'assigned_to',
        'created_by',
        'score',
        'interest_package',
        'budget_range',
        'needs_summary',
        'last_contact_at',
        'next_follow_up_at',
        'qualified_at',
        'won_at',
        'lost_at',
        'lost_reason',
        'origin_meta',
    ];

    protected $casts = [
        'score' => 'integer',
        'origin_meta' => 'array',
        'last_contact_at' => 'datetime',
        'next_follow_up_at' => 'datetime',
        'qualified_at' => 'datetime',
        'won_at' => 'datetime',
        'lost_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Lead $lead) {
            if (empty($lead->uuid)) {
                $lead->uuid = (string) Str::uuid();
            }
        });
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(LeadSource::class, 'source_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(LeadStatus::class, 'status_id');
    }

    public function industry(): BelongsTo
    {
        return $this->belongsTo(IndustriaModel::class, 'industry_id');
    }

    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(LeadActivity::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(LeadTask::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function conversations(): HasMany
    {
        return $this->hasMany(LeadConversation::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(LeadMessage::class);
    }

    public function botSessions(): HasMany
    {
        return $this->hasMany(LeadBotSession::class);
    }
}
