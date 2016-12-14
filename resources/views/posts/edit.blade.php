@extends('layout')

@section('content')
    <h1 class="page-header text-center">Urejanje članka
        <small>{{ $post->title }}</small>
    </h1>
    {!! Form::model($post, ['action' => ['PostsController@update', $post->slug], 'method' => 'PATCH']) !!}
    @include('posts._form', ['submit' => 'Uredi članek'])
    {!! Form::close() !!}
@endsection