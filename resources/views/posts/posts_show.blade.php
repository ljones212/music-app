@extends('layouts.app')

@section('title', $post->title . " Details")

@section('content')
    <ul>

        <li>{{$post->title}}</li>
        <li>{{$post->caption}}</li>
        <li>User: {{$post->postable->name}}</li> 
    </ul>

    <form method="POST"
        action="{{route('posts.destroy', ['id' => $post->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Post</button>
    </form>

    <p><a href="{{route('posts.index')}}">Back</a></p>

@endsection