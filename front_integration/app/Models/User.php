<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Notifications\transactionNotif;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'call_number',
        'email',
        'password',
        'call_number',
        'balence',
    ];

    public function sentTransactions()
    {
        return $this->hasMany(Transaction::class, 'expediteur_id');
    }
    public function sendMoney(User $recipient, float $amount): bool
    {
        if ($this->balence < $amount) {
            throw new Exception("Solde insuffisant.");
        }

        DB::beginTransaction();

        try {
            $this->decrement('balence', $amount);
            $recipient->increment('balence', $amount);

            DB::commit();

            // Envoyer une notification à l'utilisateur actuel (l'expéditeur)
            $this->notify(new transactionNotif($amount, $recipient->name));

            return true;

        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception("Erreur lors de la transaction : " . $e->getMessage());
        }
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
