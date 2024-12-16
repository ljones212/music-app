@extends('layouts.app')

@section('title', 'Albums')

@section('content')
    <p>The albums available are:</p>
    <ul>
        @foreach ($albums as $album)
            <li><a href="{{route('albums.show', ['id' => $album->id])}}"> {{$album->title}}</a></li>
        @endforeach
    </ul>
@endsection