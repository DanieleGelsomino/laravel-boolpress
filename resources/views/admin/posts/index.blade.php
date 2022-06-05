@extends('layouts.dashboard')

@section('content')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif

        <h1>I Tuoi Post</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col" colspan="3">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-success mr-2" href="{{ route('admin.posts.show', $post) }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-secondary mr-2" href="{{ route('admin.posts.edit', $post) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form onsubmit="return confirm('Vuoi eliminare il post {{ $post->title }}?')"
                                    action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>


                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div>
            <a class="btn btn-success" href="{{ route('admin.posts.create') }}">CREA POST</a>
        </div>
    </div>
@endsection
