@extends('layouts.app')

@section('title', 'Albums')

@section('content')
    <p>The albums available are:</p>
    <ul>
        @foreach ($albums as $album)
            <li>{{$album->title}}</li>
        @endforeach
    </ul>
@endsection