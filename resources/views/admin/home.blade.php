@extends('layouts.dashboard')

@section('content')
    <h1>
        Sono la Dashboard privata
    </h1>
    <div>
        Benvenuto {{ $user->name }}, la tua email è {{ $user->email }}
    </div>
    
@endsection