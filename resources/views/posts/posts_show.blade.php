@extends('layouts.app')

@section('content')
    <div style="margin-top: 0; padding-top: 0;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <!-- Link the poster's username to their user page -->
            <h3 style="margin: 0; padding: 0;">
                <b><a href="{{ route('user.show', ['user' => $post->postable_id]) }}">{{ $post->postable->name }}</a></b>
            </h3>

            <!-- Check if the authenticated user is the poster -->
            @if (Auth::id() === $post->postable_id)
                <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="float: right; background-color: #ff5722; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: bold;">
                        Delete Post
                    </button>
                </form>
            @endif
        </div>
    </div>

    <p><b>{{$post->title}}</b></p>
    <p>{{$post->caption}}</p>

    <p>Albums:
        <ul>
            @foreach ($post->albums as $album)
                <li>{{$album->title}}</li>
            @endforeach
        </ul>
    </p>

    <p>Songs:
        <ul>
            @foreach ($post->songs as $song)
                <li>{{$song->title}}</li>
            @endforeach
        </ul>
    </p>

    <h3>Comments:</h3>
    <ul>
        @foreach($comments as $comment)
            <li style="display: flex; justify-content: space-between; align-items: center;">
                <div style="flex-grow: 1;">
                    <!-- Link the username to the user's profile page -->
                    <p><a href="{{ route('user.show', ['user' => $comment->commentable_id]) }}"><b>{{$comment->commentable->name}}</b></a></p>
                    <p>{{ $comment->comment }}</p>
                </div>

                <!-- Only show the delete button if the comment belongs to the authenticated user -->
                @if ($comment->commentable_id === Auth::id())
                    <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #ff5722; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-weight: bold; text-align: right;">
                            Delete Comment
                        </button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

    <!-- Semantic UI Pagination -->
    <div class="pagination" style="text-align: center;">
        {{ $comments->links('pagination::semantic-ui') }}
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('comments.create', ['post' => $post->id]) }}" 
        style="background-color: #ff5722; color: white; padding: 5px 10px; border-radius: 5px; font-weight: bold; text-decoration: none; display: inline-block; margin-top: 10px;">
            Add Comment
        </a>
    </div>

    <p><a href="{{route('posts.index')}}">Back</a></p>
@endsection
