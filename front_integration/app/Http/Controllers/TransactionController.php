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
use Illuminate\Support\Facades\Notification;

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

            DB::commit();

            return redirect()->route('fiche_information');
        } catch (\Exception $e) {
            // dd();
            DB::rollBack();
            Log::error('Erreur lors du transfert : ' . $e->getMessage());
            return redirect()->back()->withErrors(['message' => "Une erreur s'est produite lors du transfert. Veuillez réessayer."]);
        }

        if ($transfertReussi) {
            // Récupérer les informations nécessaires pour la notification
            $expediteur = auth()->user(); // L'expéditeur est l'utilisateur connecté
            $recepteur = User::findOrFail($request->input('recepteur_id')); // Assure-toi d'avoir l'ID du récepteur dans la requête
            $transaction = new Transaction([
                'expediteur_id' => $expediteur->id,
                'recepteur_id' => $recepteur->id,
                'montant_transfere' => $request->input('montant'),
                'description' => $request->input('description'),
                'status' => 'validated', // Ou le statut approprié
            ]);
            $transaction->save();

            // Envoyer les notifications par e-mail (via Mailtrap en développement)
            Notification::send($expediteur, new TransactionEnvoie($transaction, $expediteur, $recepteur));
            Notification::send($recepteur, new TransactionRecue($transaction, $expediteur, $recepteur));

            // Afficher un message de succès à l'utilisateur dans l'interface web
            session()->flash('success', 'L\'argent a été envoyé avec succès ! Vous et le destinataire recevrez une confirmation par e-mail.');
            return redirect('/historique'); // Redirige vers la page d'historique ou une autre page appropriée
        } else {
            session()->flash('error', 'Une erreur s\'est produite lors de l\'envoi.');
            return back()->withInput();
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
