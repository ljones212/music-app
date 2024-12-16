@extends('layouts.app')

@section('title', $album->title . " Details")

@section('content')
    <ul>
        <li>Name: {{$album->title}}</li>
        <li>Duration: {{$album->duration}}</li>
        <li>Release Date: {{$album->release_date}}</li>
        <li>Artist: {{$album->artist->name}}</li>
        <li>Certification: {{$album->certification->cert_title}}</li>
        <li>Units Sold: {{$album->certification->units_sold}}</li>
    </ul>

    <form method="POST"
        action="{{route('albums.destroy', ['id' => $album->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Album</button>
    </form>

    <p><a href="{{route('albums.index')}}">Back</a></p>

@endsection