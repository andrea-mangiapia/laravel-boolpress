@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title}}</h1>

    <div class="row-col-3 d-flex my-2">
        <div class="col"><strong>Creato il:</strong> {{ $post->created_at }}</div>
        <div class="col"><strong>Aggiornato il:</strong> {{ $post->updated_at }}</div>
        <div class="col"><strong>Slug</strong> {{ $post->slug }}</div>
    </div>

    <div>
        <p>{{ $post->content}}</p>
    </div>
    
@endsection