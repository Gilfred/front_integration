<?php

namespace App\Mail;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class transactionNotif extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    public $recepteur;

    /**
     * Create a new message instance.
     */
    public function __construct(Transaction $transaction, User $recepteur)
    {
        $this->transaction = $transaction;
        $this->recepteur = $recepteur;
    }

    public function build(){
        return $this->subject('Vous avez reçu de l\'argent !')
            ->markdown('emails.argent_recu')
            ->with([
                'nomRecepteur' => $this->recepteur->name . ' ' . $this->recepteur->prenom,
                'montantRecu' => $this->transaction->montant_transfere,
                'nomExpediteur' => $this->transaction->expediteur->name . ' ' . $this->transaction->expediteur->prenom,
                'description' => $this->transaction->description,
                'dateHeure' => $this->transaction->created_at,
            ]);
    }   

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Transaction Notif',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
