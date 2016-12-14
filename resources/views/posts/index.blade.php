@extends('layout')

@section('content')
    <h1 class="page-header text-center">Članki</h1>
    @foreach($posts as $post)
        <h3 class="page-header">{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
    @endforeach
@endsection