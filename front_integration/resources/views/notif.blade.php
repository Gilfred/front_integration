@extends('layouts.source')
@section('content')
    <div>
        @foreach (auth()->user()->notifications as $notification)
            <div>
                {{ $notification->data['type'] }} :
                {{ $notification->data['montant'] }} FCFA -
                {{ $notification->data['description'] }}
            </div>
        @endforeach
    </div>
@endsection

