<?php

namespace App\Notifications;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionRecue extends Notification implements ShouldQueue
{
    use Queueable;
    protected $transaction;
    protected $expediteur;
    protected $recepteur;

    /**
     * Create a new notification instance.
     */
    public function __construct(Transaction $transaction, User $expediteur, User  $recepteur){
        //
        $this->transaction= $transaction;
        $this->expediteur= $expediteur;
        $this->recepteur=$recepteur;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable){
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable){
        return (new MailMessage)
                    ->subject("Reception d'argent")
                    ->greeting('Bonjour'. $this->recepteur->name. $this->recepteur->prenom . "!")
                    ->line('Vous avez reçu de '. $this->expediteur->name .$this->expediteur->prenom .'la somme de'. $this->transaction->montant_transfere)
                    ->line('Description:'. $this->transaction->description)
                    ->action('Voir l\'Historique', url('/historic'))
                    ->line('Merci d\'utiliser notre application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable){
        return [
            'transaction' => $this->transaction->id,
            'montant' => $this->transaction->montant_transfere,
            'expediteur' => $this->expediteur->name,
        ];
    }
}
