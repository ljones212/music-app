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

        <p>Artist:    
            <select name="artist_id">
                @foreach ($artists as $artist)
                    <option value="{{$artist->id}}"
                        @if($artist->id == old('artist_id'))
                            selected="selected"
                        @endif
                    >
                        {{$artist->name}}
                    </option>
            @endforeach
            </select>
        </p>

        <p>Certification: 
            <select name="certification_id">
                @foreach ($certifications as $certification)
                    <option value="{{$certification->id}}"
                        @if ($certification->id == old('certification_id'))
                            selected="selected"
                        @endif
                    >   
                        {{$certification->cert_title}}
                    </option>
                @endforeach
            </select>
    </p>

        <input type="submit" value="Submit">

        <a href="{{route('albums.index')}}">Cancel</a>

    </form>

@endsection