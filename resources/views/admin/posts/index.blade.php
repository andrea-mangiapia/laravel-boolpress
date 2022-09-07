@extends('layouts.dashboard')

@section('content')
    <h1>Lista post</h1>
    
    @if ($show_deleted_message === 'yes')
        <div class="alert alert-success" role="alert">
            Post cancellato correttamente
        </div>
    @endif
    
    <div class="row row-cols-3 d-flex flex-wrap">
        @foreach ($posts as $post)
            {{-- Single Post Card --}}
            <div class="col my-3">
                <div class="card" style="">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Guarda dettagli</a>
                    </div>
                </div>            
            </div>
            {{-- End Single Post Card --}}
            
        @endforeach
   

    </div>
@endsection