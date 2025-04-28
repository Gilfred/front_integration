@extends('layouts.source')
    
@section('content')

{{-- @include('layouts.navigation') --}}
<form action="{{ route('envoie.argent.a.un.user') }}" method="POST">
    @csrf

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <input type="number" name="expediteur_id" value="{{ auth()->user()->id }}" hidden>

    <div>
        <label for="recepteur_id">Destinataire</label>
        <select name="recepteur_id" id="recepteur_id">
            <option value="">Sélectionner un destinataire</option>
            @foreach ($utilisateurs as $utilisateur)
                @if ($utilisateur->id !== auth()->user()->id)
                    <option value="{{ $utilisateur->id }}">
                        {{ $utilisateur->name }} {{ $utilisateur->prenom }}
                    </option>
                @endif
                
            @endforeach
        </select>
    </div>

    <div>
        <label for="operation_id">Type d'opération</label>
        <select name="operation_id" id="operation_id">
            @foreach ($operations as $operation)
                <option value="{{ $operation->id }}">
                    {{ $operation->type_operation }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
    </div>

    <div>
        <label for="montant_transfere">Montant à transférer</label>
        <input type="number" name="montant_transfere" id="montant_transfere">
    </div>

    <input type="text" name="status" hidden>

    <button type="submit" style="all:initial">Envoyer l'argent</button>
</form>
@endsection
