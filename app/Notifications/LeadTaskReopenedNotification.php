<?php

namespace App\Notifications;

use App\Models\LeadTask;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeadTaskReopenedNotification extends Notification
{
    use Queueable;

    public function __construct(
        private readonly LeadTask $task,
        private readonly ?User $reopenedBy = null
    ) {
        $this->task->loadMissing(['lead', 'assignedUser']);
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $leadName = $this->task->lead?->full_name ?? 'Lead sin nombre';
        $dueAt = $this->task->due_at?->format('d/m/Y H:i') ?? 'Sin fecha limite';
        $reopenedByName = $this->reopenedBy?->name ?? 'Administracion';

        return (new MailMessage())
            ->subject('Se reabrio una tarea en CRM')
            ->greeting('Hola ' . ($notifiable->name ?? 'equipo') . ',')
            ->line('Una tarea que tienes asignada fue reabierta.')
            ->line('Titulo: ' . $this->task->title)
            ->line('Lead: ' . $leadName)
            ->line('Fecha limite: ' . $dueAt)
            ->line('Reabierta por: ' . $reopenedByName)
            ->action('Ver tareas', route('admin.crm.tasks'))
            ->line('Te recomendamos retomarla lo antes posible.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'lead_task_reopened',
            'task_id' => $this->task->id,
            'title' => 'Tarea reabierta',
            'message' => sprintf(
                'La tarea "%s"%s fue reabierta.',
                $this->task->title,
                $this->task->lead?->full_name ? ' para ' . $this->task->lead->full_name : ''
            ),
            'task_title' => $this->task->title,
            'lead_name' => $this->task->lead?->full_name,
            'status' => $this->task->status,
            'due_at' => $this->task->due_at?->toIso8601String(),
            'reopened_by' => $this->reopenedBy?->name,
            'url' => route('admin.crm.tasks'),
        ];
    }
}
