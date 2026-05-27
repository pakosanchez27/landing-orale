<?php

namespace App\Notifications;

use App\Models\LeadTask;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeadTaskAssignedNotification extends Notification
{
    use Queueable;

    public function __construct(
        private readonly LeadTask $task
    ) {
        $this->task->loadMissing(['lead', 'creator', 'assignedUser']);
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $leadName = $this->task->lead?->full_name ?? 'Lead sin nombre';
        $creatorName = $this->task->creator?->name ?? 'Administracion';
        $dueAt = $this->task->due_at?->format('d/m/Y H:i') ?? 'Sin fecha limite';

        $message = (new MailMessage())
            ->subject('Nueva tarea asignada en CRM')
            ->greeting('Hola ' . ($notifiable->name ?? 'equipo') . ',')
            ->line('Se te asigno una nueva tarea en el CRM de Orale Web.')
            ->line('Titulo: ' . $this->task->title)
            ->line('Lead: ' . $leadName)
            ->line('Prioridad: ' . ucfirst($this->task->priority))
            ->line('Fecha limite: ' . $dueAt)
            ->line('Asignada por: ' . $creatorName);

        if (filled($this->task->description)) {
            $message->line('Descripcion: ' . $this->task->description);
        }

        return $message
            ->action('Ver tareas', route('admin.crm.tasks'))
            ->line('Por favor revisala en cuanto te sea posible.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'lead_task_assigned',
            'task_id' => $this->task->id,
            'title' => 'Nueva tarea asignada',
            'message' => sprintf(
                'Se te asigno la tarea "%s"%s.',
                $this->task->title,
                $this->task->lead?->full_name ? ' para ' . $this->task->lead->full_name : ''
            ),
            'task_title' => $this->task->title,
            'lead_name' => $this->task->lead?->full_name,
            'priority' => $this->task->priority,
            'status' => $this->task->status,
            'due_at' => $this->task->due_at?->toIso8601String(),
            'assigned_by' => $this->task->creator?->name,
            'url' => route('admin.crm.tasks'),
        ];
    }
}
