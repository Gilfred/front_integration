<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Notifications\TransactionEnvoie;
use App\Notifications\TransactionRecue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        $solde_courant= auth()->user();
        if (Auth::check()) {
            $utilisateurConnecte = Auth::user();
            $sorties = Transaction::where('expediteur_id', $utilisateurConnecte->id)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('historic', compact('solde_courant','sorties'));
        } else {
            return redirect()->route('login');
        }
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

            $expediteur->notify(new TransactionEnvoie($transaction));
            $destinataire->notify(new TransactionRecue($transaction));

            DB::commit();
            return redirect()->route('fiche_information');
        } catch (\Exception $e) {
            DB::rollBack();
            dd('Erreur :', $e->getMessage());
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
