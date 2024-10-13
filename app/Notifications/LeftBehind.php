<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeftBehind extends Notification implements ShouldQueue
{
  use Queueable;

  public function __construct(public Project $project)
  {
    //
  }

  public function via(object $notifiable): array
  {
    return ['mail'];
  }

  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
      ->line('Você perdeu posição no projeto: ' . $this->project->title)
      ->action('Abra o projecto', route('projects.show', $this->project))
      ->line('Obrigado!!');
  }

  public function toArray(object $notifiable): array
  {
    return [
      //
    ];
  }
}
