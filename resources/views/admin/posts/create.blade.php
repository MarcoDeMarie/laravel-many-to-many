@extends('layouts.admin')

@section('content')

<div class="container p-5">

    @if ($errors->any())

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

    @endif

    <h2>Creazione post</h2>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                class="form-control @error('title') is-invalid @enderror "
                id="title"
                placeholder="Titolo"
            >

            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">

            <label for="title" class="form-label">Tipo</label>

            <select class="form-select" name="type_id">
                <option value="" selected>Seleziona il tipo</option>

                @foreach ( $types as $type )
                <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                @foreach ($technologies as $technology )

                <input
                    type="checkbox"
                    class="btn-check"
                    id="technology{{ $loop->iteration }}"
                    autocomplete="off"
                    value="{{ $technology->id }}"
                    name="technologies[]"
                >
                <label class="btn btn-outline-primary" for="technology{{ $loop->iteration }}">{{ $technology->name }}</label>

                @endforeach

            </div>
        </div>



        <div class="mb-3">

            <label for="TEXT" class="form-label">Testo</label>

            <textarea
                name="text"
                id="text"
                class="form-control post-text"
                cols="30"
                rows="10"
                >{{ old('title') }}</textarea>

                @error('text')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

        </div>

        <div class="mb-3">

            <label for="image" class="form-label">immaggine</label>

            <input
                type="file"
                name="image"
                class="form-control"
                id="image"
            >

        </div>



        <div class="mb-3">

            <label for="reading_time" class="form-label">Temo di lettura</label>

            <input
                type="number"
                name="reading_time"
                value="{{ old('reading_time') }}"
                class="form-control"
                id="reading_time"
                placeholder=""
            >

        </div>

        <button class="btn btn-success" type="submit">Invia</button>


    </form>



</div>

@endsection
