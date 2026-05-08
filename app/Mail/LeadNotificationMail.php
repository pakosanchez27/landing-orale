<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Lead $lead,
        public string $eventType,
        public ?string $previousStatusName = null,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->eventType === 'status_changed'
                ? 'Lead actualizado en Orale Web'
                : 'Nuevo lead en Orale Web',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.lead-notification',
            with: [
                'lead' => $this->lead,
                'eventType' => $this->eventType,
                'previousStatusName' => $this->previousStatusName,
                'currentStatusName' => $this->lead->status?->name ?? 'Sin etapa',
                'sourceLabel' => $this->resolveSourceLabel(),
                'contactsUrl' => route('admin.crm.contacts'),
                'pipelineUrl' => route('admin.crm'),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }

    private function resolveSourceLabel(): string
    {
        if (($this->lead->origin_meta['form'] ?? null) === 'contacto') {
            return 'Formulario web';
        }

        if (($this->lead->origin_meta['created_from'] ?? null) === 'crm_manual') {
            return 'CRM manual';
        }

        if (($this->lead->origin_meta['last_ingested_from'] ?? null) === 'bot') {
            return 'Bot / API';
        }

        return $this->lead->source?->name ?? 'CRM';
    }
}
