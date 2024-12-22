<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewChirpNotification extends Notification
{
    use Queueable;

    public $chirp; // Variabel untuk menyimpan data Chirp

    /**
     * Create a new notification instance.
     *
     * @param mixed $chirp
     * @return void
     */
    public function __construct($chirp)
    {
        $this->chirp = $chirp; // Simpan data Chirp
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // Notifikasi akan dikirim melalui email
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello ' . $notifiable->name . '!')
                    ->line('A new Chirp has been posted:')
                    ->line($this->chirp->message) // Isi pesan Chirp
                    ->action('View Chirp', url('/chirps/' . $this->chirp->id)) // Tombol ke detail Chirp
                    ->line('Thank you for using Chirper!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'chirp_id' => $this->chirp->id,
            'chirp_message' => $this->chirp->message,
        ];
    }
}
