@extends('layouts.source')
@section('content')
    <div>
        @foreach (auth()->user()->notifications as $notification)
            <div>
                {{ $notification->data['type'] }} :
                {{ $notification->data['montant'] }} FCFA -
                {{ $notification->data['description'] }}
                {{-- {{ $notification->data['recepteur->name']}} --}}
                <hr>
            </div>
        @endforeach
    </div>
@endsection

