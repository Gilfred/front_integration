@extends('layouts.source')

@section('title','Notre appli de gestion')

@section('content')
    @include('components.banner')

    @include('components.section1')

    @include('components.section2')

    @include('components.tableau')
        
@endsection
