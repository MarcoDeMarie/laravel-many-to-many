@extends('layouts.admin')

@section('content')

<div class="container p-5">

    @if(session('deleted'))

    <div class="alert alert-success" role="alert">
        {{ session('deleted') }}
    </div>

    @endif


    <h2 class="fs-4 text-secondary my-4">
        Posts
    </h2>



    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Tecnologia</th>
            <th scope="col">Data</th>
            <th scope="col">Azioni</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post )

            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td><span class="badge bg-info text-dark">{{ $post->type->name }}</span></td>

                <td>
                    @forelse ($post->technologies as $technology )

                    <span class="badge bg-primary">{{ $technology->name }}</span>

                    @empty

                    <span>empty</span>

                    @endforelse
                </td>
                @php

                    $date = date_create($post->date);

                @endphp
                <td>{{ date_format($date, 'd/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                    <a href="#" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>

                    <form
                        action="{{ route('admin.posts.destroy', $post) }}"
                        method="POST"
                        onsubmit="return confirm('confermi l\'eliminazione del post: {{ $post->title }}?')"
                        >

                        @csrf
                        @method('DELETE')
                        <a href="#" class="btn btn-danger" type="submit"><i class="fa-solid fa-xmark"></i></i></a>
                    </form>
                </td>
                </tr>

            @endforeach

        </tbody>
    </table>

</div>

@endsection
