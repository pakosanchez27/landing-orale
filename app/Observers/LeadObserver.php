<?php

namespace App\Observers;

use App\Mail\LeadNotificationMail;
use App\Models\Lead;
use App\Models\LeadStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LeadObserver
{
    public function created(Lead $lead): void
    {
        DB::afterCommit(function () use ($lead) {
            $this->sendNotification($lead->fresh(['status', 'source', 'industry', 'assignedUser']), 'created');
        });
    }

    public function updated(Lead $lead): void
    {
        if (! $lead->wasChanged('status_id')) {
            return;
        }

        $previousStatusId = $lead->getOriginal('status_id');

        DB::afterCommit(function () use ($lead, $previousStatusId) {
            $previousStatusName = null;

            if ($previousStatusId) {
                $previousStatusName = LeadStatus::query()
                    ->whereKey($previousStatusId)
                    ->value('name');
            }

            $this->sendNotification(
                $lead->fresh(['status', 'source', 'industry', 'assignedUser']),
                'status_changed',
                $previousStatusName
            );
        });
    }

    private function sendNotification(?Lead $lead, string $eventType, ?string $previousStatusName = null): void
    {
        if (! $lead) {
            return;
        }

        $recipient = (string) config('services.lead_notifications.to');

        if ($recipient === '') {
            return;
        }

        Mail::to($recipient)->send(new LeadNotificationMail($lead, $eventType, $previousStatusName));
    }
}
