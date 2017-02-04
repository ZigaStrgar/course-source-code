@extends('layout')

@section('content')
    <h1 class="page-header text-center">Članki</h1>
    @if(Auth::check())
        <a href="{{ url('posts/create') }}" class="btn btn-success">Dodaj članek</a>
    @endif
    @foreach($posts as $post)
        <h3 class="page-header">{{ $post->title }}
            <small>by {{ $post->user->name }}, {{ $post->created_at->diffForHumans() }}</small>
        </h3>
        <p>{{ $post->description }}</p>
        <a href="{{ url('posts/'.$post->slug) }}" class="btn btn-primary">Preberi več</a>
    @endforeach
@endsection