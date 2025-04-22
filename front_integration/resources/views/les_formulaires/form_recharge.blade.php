@extends('layouts.source')

@section('title',"Transfère d'argent à un utilisateur")

@section('content')
    <form action="{{route('recharger.carte.perso')}}" method="POST">
        @csrf
       <input type="text" name="user_id" hidden>
        <label for="">Montant de la recharge</label>
        <input type="number" name="montant">
        <button type="submit">recharger</button>
    </form>
@endsection

