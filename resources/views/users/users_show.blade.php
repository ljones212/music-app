@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{$user->name}}'s Profile</h1>

        <h2>Recent Posts:</h2>
        <ul>
            @forelse($posts as $post)
                <li class="post">
                    <a href="{{route('posts.show', $post->id)}}">
                        <b>{{$post->title }}</b>
                    </a>
                    <p>{{$post->content}}</p>

                    <h4>Albums:</h4>
                    <ul>
                        @forelse($post->albums as $album)
                            <li>{{$album->title}}</li>
                        @empty
                            <li>No albums attached to this post.</li>
                        @endforelse
                    </ul>

                    <h4>Songs:</h4>
                    <ul>
                        @forelse($post->songs as $song)
                            <li>{{$song->title}}</li>
                        @empty
                            <li>No songs attached to this post.</li>
                        @endforelse
                    </ul>

                    <p><small>Posted on: {{$post->created_at}}</small></p>
                </li>
            @empty
                <p>No posts found.</p>
            @endforelse
        </ul>

        <h3>Recent Comments:</h3>
        <ul>
            @forelse($comments as $comment)
                <li class="comment">
                    <a href="{{route('posts.show', $comment->post_id}}">
                        {{$comment->comment}}
                    </a>

                    <h4>Albums:</h4>
                    <ul>
                        @forelse($post->albums as $album)
                            <li>{{$album->title}}</li>
                        @empty
                            <li>No albums attached to this post.</li>
                        @endforelse
                    </ul>

                    <h4>Songs:</h4>
                    <ul>
                        @forelse($post->songs as $song)
                            <li>{{$song->title}}</li>
                        @empty
                            <li>No songs attached to this post.</li>
                        @endforelse
                    </ul>

                    <p><small>Commented on: {{$comment->created_at}}</small></p>
                </li>
            @empty
                <p>No comments found.</p>
            @endforelse
        </ul>
    </div>
@endsection
