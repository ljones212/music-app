@extends('layouts.app')

@section('title', 'Create a new post')

@section('content')
    <form method="POST" action="{{route('posts.store')}}">

        @csrf

        <p>Title: <input type="text" name="title"
            value="{{old('title')}}"></p>

        <p>Caption: <input type="text" name="caption"
            value="{{old('caption')}}"></p>

        <input type="submit" value="Submit">

        <a href="{{route('posts.index')}}">Cancel</a>

    </form>

@endsection