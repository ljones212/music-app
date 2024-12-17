@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3><b>All Posts:</b></h3>
        <a href="{{ route('posts.create') }}" style="background-color: #ff5722; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold; text-decoration: none;">
            Create new post
        </a>
    </div>

    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', ['post' => $post->id]) }}"> {{$post->title}}</a></li>
        @endforeach
    </ul>

    <div class="pagination" style="text-align: center;">
        {{$posts->links('pagination::semantic-ui')}}
    </div>
@endsection
