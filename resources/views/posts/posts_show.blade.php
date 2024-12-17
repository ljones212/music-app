@extends('layouts.app')

@section('content')
    <div style="margin-top: 0; padding-top: 0;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h3 style="margin: 0; padding: 0;"><b>{{$post->postable->name}}</b></h3>
            <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" style="float: right; background-color: #ff5722; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: bold;">
                    Delete Post
                </button>
            </form>
        </div>
    </div>

    <p><b>{{$post->title}}</b></p>
    <p>{{$post->caption}}</p>

    <p>Albums:
        <ul>
            @foreach ($post->albums as $album)
                <li>{{$album->title}}</li>
            @endforeach
        </ul>
    </p>

    <p>Songs:
        <ul>
            @foreach ($post->songs as $song)
                <li>{{$song->title}}</li>
            @endforeach
        </ul>
    </p>

    <h3>Comments:</h3>
    <ul>
        @foreach($comments as $comment)
            <p><b>{{$comment->commentable->name}}</b></p>
            <p>{{ $comment->comment }}</p>
        @endforeach
    </ul>

    <div style="margin-top: 20px;">
        <a href="{{ route('comments.create', ['post' => $post->id]) }}" 
        style="background-color: #ff5722; color: white; padding: 5px 10px; border-radius: 5px; font-weight: bold; text-decoration: none; display: inline-block; margin-top: 10px;">
            Add Comment
        </a>
    </div>

    <p><a href="{{route('posts.index')}}">Back</a></p>
@endsection
