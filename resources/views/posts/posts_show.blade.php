@extends('layouts.app')

@section('title', $post->title . " Details")

@section('content')
    <ul>
        <li>User: {{$post->postable->name}}</li> 
        <li>{{$post->title}}</li>
        <li>{{$post->caption}}</li>

        <li><strong>Albums:
            <ul>
                @foreach ($post->albums as $album)
                    <li>{{$album->title}}</li>
                @endforeach
            </ul>
        </li>

        <li>Songs:
            <ul>
                @foreach ($post->songs as $song)
                    <li>{{$song->title}}</li>
                @endforeach
            </ul>
        </li>

    </ul>

    <form method="POST"
        action="{{route('posts.destroy', ['id' => $post->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Post</button>
    </form>

    <p><a href="{{route('posts.index')}}">Back</a></p>

@endsection