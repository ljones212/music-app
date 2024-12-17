<!-- resources/views/users/users_show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{ $user->name }}'s Profile</h1>

        <h2>Recent Posts:</h2>
        <ul>
            @forelse($posts as $post)
                <li class="post">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <b>{{ $post->title }}</b>
                    </a>
                    <p>{{ $post->content }}</p>
                    <p><small>Posted on: {{ $post->created_at->format('Y-m-d H:i') }}</small></p>
                </li>
            @empty
                <p>No posts found.</p>
            @endforelse
        </ul>

        <h3>Recent Comments:</h3>
        <ul>
            @forelse($comments as $comment)
                <li class="comment">
                    <a href="{{ route('posts.show', $comment->post_id) }}">
                        {{ $comment->comment }}
                    </a>
                    <p><small>Commented on: {{ $comment->created_at->format('Y-m-d H:i') }}</small></p>
                </li>
            @empty
                <p>No comments found.</p>
            @endforelse
        </ul>
    </div>
@endsection
