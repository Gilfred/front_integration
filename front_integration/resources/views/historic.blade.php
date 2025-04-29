@extends('layouts.source')

{{-- @include('layouts.navigation') --}}
@section('title','Notre appli de gestion')

@section('content')
    @include('components.banner')
    
    {{-- le solde du compte qui est afficher est dans la vue components.section1 --}}

    @include('components.section1')

    @include('components.section2')

    @include('components.tableau')

@endsection
