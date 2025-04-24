<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function historic(User $utilisateur){
        // Récupérer la carte électronique de l'utilisateur
        // $carte = $utilisateur->users_id;

        // $solde_actuel = 0; // Initialiser à zéro par défaut

        // if ($carte) {
        //     $solde_actuel = $carte->montant;
        // }

        // $montant_entree_compte=Electronic_card::where('users_id',$utilisateur->id)->sum('montant');

        // $montant_des_sortie = Transaction::where('expediteur_id', $utilisateur->id)->sum('montant_transfere');

        // $solde_courant = $montant_entree_compte - $montant_des_sortie;

        return view('historic');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $regle = [
            'expediteur_id' => ['required', 'exists:users,id'],
            'recepteur_id' => ['required', 'exists:users,id', 'different:expediteur_id'],
            'operation_id' => ['required', 'exists:operations,id'],
            'description' => ['nullable', 'min:1'],
            'montant_transfere' => ['required', 'numeric', 'min:0.01'],
        ];
        
        $validated_data = $request->validate($regle);
        // dd();
        DB::beginTransaction();

        try {
            // dd('entrer dans le try');
            // Récupérer l'expéditeur et le destinataire avec verrouillage optimiste
            $expediteur = User::lockForUpdate()->findOrFail($validated_data['expediteur_id']);
            $destinataire = User::lockForUpdate()->findOrFail($validated_data['recepteur_id']);

            // Vérifier si l'expéditeur a suffisamment de fonds
            if ($expediteur->balence < $validated_data['montant_transfere']) {
                // dd();
                DB::rollBack();
                return redirect()->back()->withErrors(['message' => "Solde insuffisant pour l'expéditeur."]);
            }

            // Débiter le compte de l'expéditeur
            $expediteur->balence -= $validated_data['montant_transfere'];
            $expediteur->save();

            // Créditer le compte du destinataire
            $destinataire->balence += $validated_data['montant_transfere'];
            $destinataire->save();

            $transaction = new Transaction();
            $transaction->recepteur_id = $validated_data['recepteur_id'];
            $transaction->expediteur_id = $validated_data['expediteur_id'];
            $transaction->operation_id = $validated_data['operation_id'];
            $transaction->description = $validated_data['description'];
            $transaction->montant_transfere = $validated_data['montant_transfere'];
            $transaction->status = 'validated';
            $transaction->save();

            DB::commit();

            return redirect()->route('fiche_information');
        } catch (\Exception $e) {
            // dd();
            DB::rollBack();
            Log::error('Erreur lors du transfert : ' . $e->getMessage());
            return redirect()->back()->withErrors(['message' => "Une erreur s'est produite lors du transfert. Veuillez réessayer."]);
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
