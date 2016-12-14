@extends('layout')

@section('content')
    <h1 class="page-header text-center">Dodaj članek</h1>
    {!! Form::open(['url' => 'posts', 'method' => 'POST']) !!}
    @include('posts._form', ['submit' => 'Dodaj članek'])
    {!! Form::close() !!}
@endsection