@extends('layouts.app')

@section('title', 'Artists')

@section('content')
    <p>The artists registered are:</p>
    <ul>
        @foreach ($artists as $artist)
            <li><a href="{{route('artists.show', ['id' => $artist->id])}}">{{$artist->name}}</a></li>
        @endforeach
    </ul>

    <div class="pagination">
        {{$artists->links('pagination::semantic-ui')}}
    </div>

@endsection