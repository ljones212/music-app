@extends('layouts.app')

@section('title', $album->title . " Details")

@section('content')
    <ul>
        <li>Name: {{$album->title}}</li>
        <li>Duration: {{$album->duration}}</li>
        <li>Release Date: {{$album->release_date}}</li>
        <li>Artist: {{$album->artist->name}}</li>
        <li>Certification : {{$album->certification->cert_title}}</li>
    </ul>

@endsection