<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'recepteur_id',
        'expediteur_id',
        'operation_id',
        'description',
        'montant_transfere',
        'status',
    ];

    public function expediteur(){
        return $this->belongsTo(User::class,'expediteur_id');
    }

    public function recepteur(){
        return $this->belongsTo(User::class,'recepteur_id');
    }

    public function operation(){
        return $this->belongsTo(User::class);
    }
}
