<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class transactionNotif extends Notification implements ShouldQueue
{
    use Queueable;

    protected $amount;
    protected $recipientName;

    /**
     * Create a new notification instance.
     *
     * @param float $amount
     * @param string $recipientName
     * @return void
     */
    public function __construct(float $amount, string $recipientName)
    {
        $this->amount = $amount;
        $this->recipientName = $recipientName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("Transaction Réussie")
                    ->line("Votre transaction de " . number_format($this->amount, 2) . "a été effectuée avec succès.")
                    ->line("L'argent a été envoyé à : " . $this->recipientName)
                    ->line("Merci d'utiliser notre service !");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}