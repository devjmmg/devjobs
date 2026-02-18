<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    public $candidate;
    public $vacant;

    /**
     * Create a new notification instance.
     */
    public function __construct($candidate, $vacant)
    {
        $this->candidate = $candidate;
        $this->vacant = $vacant;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications');

        return (new MailMessage)
            ->subject('Nuevo candidato para tu vacante')
            ->greeting('Hola '.$notifiable->name)

            ->line('Tienes un nuevo candidato en tu vacante:')
            ->line('Vacante: '.$this->vacant->title)

            ->line('Candidato: '.$this->candidate->name)
            ->line('Email: '.$this->candidate->email)

            ->action('Ver postulaciones', $url)

            ->line('Revisa su CV desde el panel.')
            ->line('¡Éxito con tu proceso de contratación!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function toDatabase()
    {
        return [
            'user_id' => $this->candidate->id,
            'title' => $this->vacant->title,
            'vacant_id' => $this->vacant->id,
        ];
    }
}
