@extends('layouts.dashboard')

@section('content')
    <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica post</a>

    <form class="mt-2" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('DELETE')

        <input type="submit" class="btn btn-danger" value="Cancella post" onClick="return confirm('Sei sicuro di voler cancellare il post?');">
    </form>

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