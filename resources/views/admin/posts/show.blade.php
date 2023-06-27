@extends('layouts.admin')

@section('content')

<div class="container p-5">

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->date }}</p>
    <div>
        <span class="badge bg-info text-dark">{{ $post->type?->name }}</span>
    </div>
    <p>Tempo di lettura: {{ $post->reading_time }} min</p>
    <p>{{ $post->text }}</p>
    <p> {{ $post->image_path}}</p>
    <div>
        <img src="{{ asset('storage/' . $post->image_path) }}" alt="">
    </div>

</div>

@endsection
