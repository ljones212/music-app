@extends('layouts.app')

@section('title', $artist->name . "'s Artist Details")

@section('content')
    <ul>
        <li>Name: {{$artist->name}}</li>
        <li>Age: {{$artist->age}}</li>
    </ul>

@endsection