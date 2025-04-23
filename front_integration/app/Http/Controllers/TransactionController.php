<?php

namespace App\Http\Controllers;

use App\Models\Electronic_card;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('les_formulaires.form_recharge');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function historic(){
        return view('historic');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $rules = [
        'description' => ['required', 'min:1'],
        'montant_transfere' => ['required', 'numeric'],
        'recepteur_id' => ['required', 'exists:users,id'],
        'expediteur_id' => ['required', 'exists:users,id'],
        'operation_id' => ['required', 'exists:operations,id'],
    ];

    $validated_data = $request->validate($rules);

    // dd($validated_data);

    DB::beginTransaction();

    try {
        // Récupération des cartes avec verrouillage
        // dd('entree dans le try');
        $carteExpediteur = Electronic_card::lockForUpdate()
            ->where('users_id', $validated_data['expediteur_id'])
            ->first();
            // dd('fait du carteexpediteur',$carteExpediteur);
        $carteRecepteur = Electronic_card::lockForUpdate()
            ->where('users_id', $validated_data['recepteur_id'])
            ->first();
// dd('pour le recepteur',$carteRecepteur)
        // Vérification de l'existence des cartes
        if (!$carteExpediteur || !$carteRecepteur) {
            DB::rollBack();
            return redirect()->back()->withErrors(['message' => "Carte électronique introuvable pour l'expéditeur ou le receveur."]);
        }

        // Vérification du solde
        if ($carteExpediteur->montant < $validated_data['montant_transfere']) {
            DB::rollBack();
            return redirect()->back()->withErrors(['message' => "Solde insuffisant dans le compte de l'expéditeur."]);
        }

        // Débit expéditeur
        $carteExpediteur->montant -= $validated_data['montant_transfere'];
        // dd('avant sauvegarde expediteur', $carteExpediteur);
        $carteExpediteur->save();
        // dd('apres sauvegarde recepteur');

        // Crédit destinataire
        $carteRecepteur->montant += $validated_data['montant_transfere'];
        // dd('Avant sauvegarde recepteur', $carteRecepteur->toArray());
        $carteRecepteur->save();
        // dd('apres sauvegarde recepteur');

        // Enregistrement de la transaction
        $transaction = new Transaction();
        $transaction->recepteur_id = $validated_data['recepteur_id'];
        $transaction->expediteur_id = $validated_data['expediteur_id'];
        $transaction->operation_id = $validated_data['operation_id'];
        $transaction->description = $validated_data['description'];
        $transaction->montant_transfere = $validated_data['montant_transfere'];
        $transaction->status = 'validated';
        // dd('avant sauvegarde transaction',$transaction);
        $transaction->save();
        // dd('apres sauvegarde transaction');

        DB::commit();

        return redirect()->route(' ');

    } catch (\Exception $e) {
        // dd($e);
        DB::rollBack();
        // Log::error('Erreur lors du transfert : ' . $e->getMessage());
        return redirect()->back()->withErrors(['message' => "Une erreur s'est produite. Veuillez réessayer."]);
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
