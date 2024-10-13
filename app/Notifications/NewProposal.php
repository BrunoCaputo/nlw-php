<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProposal extends Notification
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
      ->line('Você recebeu uma nova proposta')
      ->action('Veja o seu projeto', route('projects.show', $this->project->id))
      ->line('Obrigado!');
  }

  public function toArray(object $notifiable): array
  {
    return [
      //
    ];
  }
}
