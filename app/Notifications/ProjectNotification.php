<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class ProjectNotification extends Notification
{
    use Queueable;

    public $message;
    public $projectId;
    public $title;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $message, int $projectId)
    {
        $this->message = $message;
        $this->projectId = $projectId;

        // Fetch the project's title based on the projectId
        $this->title = Project::find($projectId)->title ?? 'No Title'; // Default 'No Title' if project not found
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        // Notify via mail and database
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line($this->message)
            ->action('View Project', url('/project/view-pow/' . $this->projectId))
            ->line('Thank you for staying updated!');
    }

    /**
     * Get the array representation of the notification for database.
     */
    public function toArray($notifiable): array
    {
        return [
            'message' => $this->message,
            'project_title' => $this->title,
            'project_id' => $this->projectId,
        ];
    }
}
