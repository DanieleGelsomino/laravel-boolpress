@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1> Visalizza post {{ $post->id }}</h1>
        <dl>
            <dt>Titolo:</dt>
            <dd>{{ $post->title }}</dd>
            <dt>Slug:</dt>
            <dd>{{ $post->slug }}</dd>
            <dt>Categoria:</dt>
            <dd>{{ $post->category->name }}</dd>
            <dt>Contenuto:</dt>
            <dd>{{ $post->content }}</dd>
        </dl>



        <div class="row">
            <a class="btn btn-info mr-2 ml-3" href="{{ route('admin.posts.edit', $post) }}">
                <i class="fa-solid fa-eraser"></i>
            </a>
            <form onsubmit="return confirm('Vuoi eliminare il post {{ $post->title }}?')"
                action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mr-2"><i class="fa-solid fa-trash-can"></i></button>
            </form>
            <a class="btn btn-dark" href="{{ route('admin.posts.index') }}"><i class="fa-solid fa-arrow-left"></i></a>

        </div>
    </div>
@endsection
