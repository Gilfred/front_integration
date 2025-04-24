@extends('layouts.source')

@include('layouts.navigation')
@section('title','Notre appli de gestion')

@section('content')
    @include('components.banner')

    <div>
        Mon solde actuel de votre compte est:
        {{-- {{$solde_courant}} --}}
    </div>

    @include('components.section1')

    @include('components.section2')

    @include('components.tableau')

@endsection
