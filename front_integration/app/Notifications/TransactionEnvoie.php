<?php

namespace App\Notifications;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionEnvoie extends Notification
{
    use Queueable;
    protected $transaction;
    protected $expediteur;
    protected $recepteur;

    /**
     * Create a new notification instance.
     */
    public function __construct(Transaction $transaction, User $expediteur, User $recepteur)
    {
        //
        $this -> transaction = $transaction;
        $this -> expediteur = $expediteur;
        $this -> recepteur = $recepteur;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable){
            return (new MailMessage)
                        ->subject('Confirmation de Transfert d\'Argent')
                        ->greeting('Bonjour ' . $this->expediteur->name . '!')
                        ->line('Vous avez envoyé ' . $this->transaction->montant_transfere . ' à ' . $this->recepteur->name . ' le ' . $this->transaction->created_at->format('d/m/Y à H:i:s') . '.')
                        ->line('Description : ' . ($this->transaction->description . 'Aucune description fournie.'))
                        ->line('Cette notification sert de preuve de la transaction.')
                        ->action('Voir l\'Historique', url('/historique'))
                        ->line('Merci d\'utiliser notre application!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'transaction_id' => $this->transaction->id,
            'montant' => $this->transaction->montant_transfere,
            'destinataire' => $this->recepteur->name,
            'date' => $this->transaction->created_at->format('d/m/Y H:i:s'),
        ];
    }
}
