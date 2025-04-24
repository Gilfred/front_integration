<?php

namespace App\Http\Controllers;

use id;
use Illuminate\Http\Request;
use App\Models\Electronic_card;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RechargecarteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $utilisateurs=User::all();
        $operations=Operation::all();
        return view('transaction.envoie_reception',compact('utilisateurs','operations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $regle=[
        //     'montant'=>['required','numeric','min:1',],
        // ];
        // $user_id=Auth::id();
        // $validated_data =$request->validate($regle);

        // $recharge_compte_perso=new Electronic_card();
        // $recharge_compte_perso->users_id=$user_id;
        // $recharge_compte_perso->montant=$request->input('montant');
        // $recharge_compte_perso->save();
        // return redirect()->route('transfere.argent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
