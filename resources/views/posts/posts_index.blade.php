@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <p>Posts:</p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', ['id' => $post->id]) }}"> {{$post->title}}</a></li>
        @endforeach
    </ul>

    <a href="{{route('posts.create')}}">Create new post</a>

    <div class="pagination">
        {{$posts->links('pagination::semantic-ui')}}
    </div>
@endsection