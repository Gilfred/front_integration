<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electronic_card extends Model
{
    //
    use HasFactory;

    protected $fillable=[
        'users_id',
        'montant',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
