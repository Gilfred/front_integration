<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionEnvoie extends Notification
{
    use Queueable;
    protected $transaction;
    // protected $expediteur;
    // protected $recepteur;

    /**
     * Create a new notification instance.
     */
    public function __construct($transaction)
    {
        //
        $this -> transaction = $transaction;
        // $this -> expediteur = $expediteur;
        // $this -> recepteur = $recepteur;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable){
        return (new MailMessage)
        ->line('Votre transaction a été envoyée avec succès.')
        ->line('Montant: ' . $this->transaction->montant_transfere . ' FCFA')
        ->line('Destinataire: ' . $this->transaction->recepteur->name)
        ->line('description:'. $this->transaction->description)
        ->line('Merci d\'utiliser notre application.');

    }

    public function toDatabase($notification){
        return[
            'type' => 'envoi',
            'montant' => $this->transaction->montant_transfere,
            'recepteur' => $this->transaction->recepteur->name,
            'description' => $this->transaction->description,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            // 'transaction_id' => $this->transaction->id,
            // 'montant' => $this->transaction->montant_transfere,
            // 'destinataire' => $this->recepteur->name,
            // 'date' => $this->transaction->created_at->format('d/m/Y H:i:s'),
        ];
    }
}
