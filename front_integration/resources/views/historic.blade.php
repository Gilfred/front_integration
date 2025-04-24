@extends('layouts.source')

@include('layouts.navigation')
@section('title','Notre appli de gestion')

@section('content')
    @include('components.banner')

    <p>
        Mon solde actuel est:
        {{$solde_courant}}
    </p>

    @include('components.section1')

    @include('components.section2')

    @include('components.tableau')

@endsection
