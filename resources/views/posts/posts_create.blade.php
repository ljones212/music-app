@extends('layouts.app')

@section('title', 'Create a new post')

@section('content')
    <form method="POST" action="{{route('posts.store')}}">

        @csrf

        <p>Title: <input type="text" name="title"
            value="{{old('title')}}"></p>

        <p>Caption: <input type="text" name="caption"
            value="{{old('caption')}}"></p>

        <p>Albums:
            <select name="album_ids[]" multiple>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->title }}</option>
                @endforeach
            </select>
        </p>

        <p>Songs:
            <select name="song_ids[]" multiple>
                @foreach ($songs as $song)
                    <option value="{{ $song->id }}">{{ $song->title }}</option>
                @endforeach
            </select>
        </p>

        <input type="submit" value="Submit">

        <a href="{{route('posts.index')}}">Cancel</a>

    </form>

@endsection