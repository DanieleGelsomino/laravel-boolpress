@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Crea nuovo post</h1>
            <a class="btn btn-dark h-100" href="{{ route('admin.posts.index') }}"><i class="fa-solid fa-arrow-left"></i>
                Tutti i
                post</a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            {{-- title post --}}
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror"
                    id="title" name="title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- categories --}}
            <select class="mb-2 form-select @error('category_id') is-invalid @enderror" name="category_id">
                <option selected>Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            {{-- content post --}}
            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3">{{ old('content') }}</textarea>

                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Tag with checkbox --}}
            <div class="form-group">
                <p>Tags:</p>
                @foreach ($tags as $tag)
                    <div class="ml-3">
                        <input type="checkbox" value="{{ $tag->id }}" name="tags[]"
                            class="form-check-input @error('tags') is-invalid @enderror "
                            {{ in_array($tag->id, old('tags[]', [])) ? 'checked' : '' }}>
                        <div class="form-check-label">{{ $tag->name }}</div>
                    </div>
                @endforeach
                @error('tags[]')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Action buttons --}}
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i> Aggiungi</button>
            <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-eraser"></i> Cancella</button>
        </form>

    </div>
@endsection
