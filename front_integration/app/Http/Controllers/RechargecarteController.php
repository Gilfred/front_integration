<?php

namespace App\Http\Controllers;

use id;
use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function recharge_process(Request $request){
        //
        $request->validate([
            'montant' => ['required', 'numeric', 'min:0.01'],
        ]);

        $montantRecharge = $request->input('montant');
        $utilisateur = Auth::user();

        if ($utilisateur) {
            DB::beginTransaction();
            try {
                $utilisateur->balence += $montantRecharge;
                // $utilisateur->save();
                DB::commit();
                return redirect()->route('fiche_information');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('recharge.form')->withErrors(['message' => 'Une erreur s\'est produite lors de la recharge. Veuillez réessayer.']);
            }
        } else {
            return redirect()->route('login')->withErrors(['message' => 'Vous devez être connecté pour recharger votre compte.']);
        }
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
