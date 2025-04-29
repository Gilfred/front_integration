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
                    ->subject('Confirmation d\envoie d\'argent!')
                    ->greeting('Bonjour!'. $this->expediteur->name. $this->expediteur->prenom .'.')
                    ->line('Vous avez envoyé à'. $this->recepteur->name. $this->recepteur->prenom. 'la somme de' . $this->transaction->montant_transfere)
                    ->line('Description:'. $this->transaction->description)
                    ->action('Voir l\'Historique', url('/historic'))*750
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
            //
            // 'transaction'=>$this->transaction,
            'montant'=>$this->transaction->montant_transfere,
            'recepteur'=>$this->recepteur->name,

        ];
    }
}
