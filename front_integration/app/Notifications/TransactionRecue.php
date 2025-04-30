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
    // protected $expediteur;
    // protected $recepteur;

    /**
     * Create a new notification instance.
     */
    public function __construct( $transaction){
        //
        $this->transaction= $transaction;
        // $this->expediteur= $expediteur;
        // $this->recepteur=$recepteur;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable){
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable){
        return (new MailMessage)
        ->line('Votre avez reçu un montant.')
        ->line('Montant:'. $this->transaction->montant_transfere . 'FCFA')
        ->line('description:'. $this->transaction->description)
        ->line('Expediteur'. $this->transaction->expediteur->name)
        ->line('Merci d\'utiliser notre application.');
    }

    public function toDatabase($notification){
        return [
            'type'=>"reception",
            'montant'=>$this->transaction->montant_transfere,
            'description'=>$this->transaction->description,
            'recepteur'=>$this->transaction->expediteur->name,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable){
        return [
            // 'transaction_id' => $this->transaction->id,
            // 'montant' => $this->transaction->montant_transfere,
            // 'expediteur' => $this->expediteur->name,
            // 'date' => $this->transaction->created_at->format('d/m/Y H:i:s'),
        ];
    }
}
