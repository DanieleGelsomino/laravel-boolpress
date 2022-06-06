@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Visalizza post {{ $post->id }}</h1>
            <a class="btn btn-dark h-100" href="{{ route('admin.posts.index') }}"><i class="fa-solid fa-arrow-left"></i>
                Tutti i
                post</a>
        </div>
        <dl>
            <dt>Titolo:</dt>
            <dd>{{ $post->title }}</dd>
            <dt>Slug:</dt>
            <dd>{{ $post->slug }}</dd>
            <dt>Categoria:</dt>
            <dd>{{ $post->category->name }}</dd>
            <dt>Tags:</dt>
            <dd>
                @foreach ($post->tags as $tag)
                    <span>
                        {{ $tag->name }}
                    </span>
                @endforeach
            </dd>
            <dt>Contenuto:</dt>
            <dd>{{ $post->content }}</dd>
        </dl>



        <div class="row">
            <a class="btn btn-success mr-2 ml-3" href="{{ route('admin.posts.edit', $post) }}">
                <i class="fa-solid fa-pen-to-square"></i> Modifica
            </a>
            <form onsubmit="return confirm('Vuoi eliminare il post {{ $post->title }}?')"
                action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mr-2"><i class="fa-solid fa-trash-can"></i> Elimina</button>
            </form>


        </div>
    </div>
@endsection
