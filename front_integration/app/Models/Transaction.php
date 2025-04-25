<?php

namespace App\Models;

use Exception;
use App\Notifications\transactionNotif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'recepteur_id',
        'expediteur_id',
        'operation_id',
        'description',
        'montant_transfere',
        'status',
    ];

    public function recepteur(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
    return $this->belongsTo(User::class, 'recepteur_id');
}

    /**
     * Obtient l'utilisateur qui est l'expéditeur de la transaction.
     */
    public function expediteur(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
    return $this->belongsTo(User::class, 'expediteur_id');
}

public function operation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
    return $this->belongsTo(Operation::class);
}
    public function send(Request $request)
    {
        $request->validate([
            'recipient_id' => ['required','exists:users,id'],
            'amount' => ['required,numeric,min:0.01'],
        ]);

        $sender = auth()->user();
        $recipient = User::findOrFail($request->recipient_id);
        $amount = $request->amount;

        try {
            $sender->sendMoney($recipient, $amount);

            // Envoyer une notification à l'utilisateur actuel (l'expéditeur)
            $sender->notify(new transactionNotif($amount, $recipient->name));

            return redirect()->back()->with('success', "L'argent a été envoyé avec succès à " . $recipient->name . '.');

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
