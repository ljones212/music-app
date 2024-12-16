@extends('layouts.app')

@section('title', 'Artists')

@section('content')
    <p>The artists registered are:</p>
    <ul>
        @foreach ($artists as $artist)
            <li>{{$artist->name}}</li>
        @endforeach
    </ul>
@endsection