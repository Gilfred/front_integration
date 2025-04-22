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
}
