@extends('layout')

@section('content')
    <h1 class="page-header">{{ $post->title }}
        <small> by {{ $post->user->name }}</small>
    </h1>
    <article>
        {!!  $post->content !!}
    </article>
    <div>
        @foreach($post->categories as $category)
            <span class="label label-info">{{ $category->name }}</span>
        @endforeach
    </div>
    <hr>
    <a href="{{ action('PostsController@edit', ['slug' => $post->slug]) }}" class="btn btn-primary">Uredi članek</a>
    <span class="btn btn-danger" onclick="deletePost({{ $post->id }})">Izbriši članek</span>
@endsection

@section('scripts')
    <script>
        function deletePost(id) {
            $.ajax({
                url: '/posts/' + id,
                method: 'DELETE',
                data: {'_token': '{{ csrf_token() }}'},
                success: function (cb) {
                    if (cb == "success") {
                        window.location.href = "/posts";
                    }
                }
            })
        }
    </script>
@endsection