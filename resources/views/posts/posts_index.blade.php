@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3><b>All Posts:</b></h3>
        <a href="{{route('posts.create') }}" style="background-color: #ff5722; color: white;
            padding: 10px 20px; border-radius: 5px; font-weight: bold; text-decoration: none;">
            Create new post
        </a>
    </div>

    @foreach ($posts as $post)
        <div style="border-bottom: 1px solid #ccc; padding: 20px 0;">
            <p><b><a href="{{ route('users.show', ['user' => $post->postable_id]) }}" style="color: #333;">
                {{$post->postable->name}}</a></b></p>
            
            <h4><a href="{{route('posts.show', ['post' => $post->id])}}" style="color: #ff5722;">{{$post->title}}</a></h4>

            @if ($post->albums->isNotEmpty())
                <p><strong>Albums:</strong></p>
                <ul>
                    @foreach ($post->albums as $album)
                        <li>{{$album->title}}</li>
                    @endforeach
                </ul>
            @endif

            <!-- Display songs attached to the post -->
            @if ($post->songs->isNotEmpty())
                <p><strong>Songs:</strong></p>
                <ul>
                    @foreach ($post->songs as $song)
                        <li>{{$song->title}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endforeach

    <div class="pagination" style="text-align: center;">
        {{$posts->links('pagination::semantic-ui')}}
    </div>
@endsection
