@extends('layouts.dashboard')

@section('content')
    <h1>
        Sono la Dashboard privata
    </h1>
    <div>
        Benvenuto {{ $user->name }}, la tua email è {{ $user->email }}
    </div>
    @if ($user->userInfo)
        <div>
            Nunero di telefono: {{ $user->userInfo->telephone }}
        </div>
        <div>
            Indirizzo: {{ $user->userInfo->address }}
        </div>       
    @endif
    
@endsection