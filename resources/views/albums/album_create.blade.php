@extends('layouts.app')

@section('title', 'Add a New Album')

@section('content')
    <form method="POST" action="{{route('albums.store')}}">
        @csrf
        <p>Name: <input type="text" name="title"
            value="{{old('title')}}"></p>
        <p>Duration: <input type="text" name="duration"
            value="{{old('duration')}}"></p>
        <p>Release Date: <input type="text" name="release_date"
            value="{{old('release_date')}}" ></p>
        <p>Artist ID: <input type="text" name="artist_id"
            value="{{old('artist_id')}}"></p>
        <p>Certification ID: <input type="text" name="certification_id"
            value="{{old('certification_id')}}"></p>
        <input type="submit" value="Submit">
        <a href="{{route('albums.index')}}">Cancel</a>
    </form>

@endsection