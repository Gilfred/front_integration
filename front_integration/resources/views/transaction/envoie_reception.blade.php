@extends('layouts.source')

@section('content')
    <form action="{{route('envoie.argent.a.un.user')}}" method="POST">
        @csrf
        <input type="text" name="users_id" hidden>
        <div>
            <select name="recepteur_id" id="">
                @foreach ($utilisateurs as $utilisateur)
                    <option value="{{$utilisateur->id}}">
                        {{$utilisateur->name}} {{$utilisateur->prenom}}
                    </option>
                @endforeach
                
            </select>
        </div>
        
        <div>
            <select name="operation_id" id="">
                @foreach ($operations as $operation)
                    <option value="{{$operation->id}}">
                        {{$operation->type_operation}}
                    </option>
                @endforeach

            </select>
        </div>

        <div>
            <label for="">Description</label>
            <input type="text" name="description">
        </div>
        
        <div>
            <label for="">Montant a transféré</label>
            <input type="number" name="montant_transfere">
        </div>

        <input type="text" name="status" hidden >

        <button type="submit" style="all:initial">envoyer l'argent</button>
    </form>
@endsection
