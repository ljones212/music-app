@extends('layouts.app')

@section('content')
    <div style="margin-top: 0; padding-top: 0;">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <h3 style="margin: 0; padding: 0;">
                <b><a href="{{route('users.show', ['user' => $post->postable_id])}}">
                    {{$post->postable->name}}</a></b>
            </h3>

            @if (Auth::id() === $post->postable_id)
                <form method="POST" action="{{route('posts.destroy', ['id' => $post->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="float: right; background-color: #ff5722; color: white;
                        border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: bold;">
                        Delete Post
                    </button>
                </form>
            @endif
        </div>
    </div>

    <p><b>{{$post->title}}</b></p>
    <p>{{$post->caption}}</p>

    @if ($post->albums->isNotEmpty())
        <p>Albums:
            <ul>
                @foreach ($post->albums as $album)
                    <li>{{$album->title}}</li>
                @endforeach
            </ul>
        </p>
    @endif

    @if ($post->songs->isNotEmpty())
        <p>Songs:
            <ul>
                @foreach ($post->songs as $song)
                    <li>{{$song->title}}</li>
                @endforeach
            </ul>
        </p>
    @endif

    <h3>Comments:</h3>
    <ul>
        @foreach($comments as $comment)
            <li style="display: flex; justify-content: space-between; align-items: center;">
                <div style="flex-grow: 1;">

                    <p><a href="{{route('users.show', ['user' => $comment->commentable_id])}}">
                        <b>{{$comment->commentable->name}}</b></a></p>
                    <p>{{$comment->comment}}</p>

                    @if ($comment->albums->isNotEmpty())
                        <p><strong>Albums:</strong>
                            <ul>
                                @foreach ($comment->albums as $album)
                                    <li>{{$album->title}}</li>
                                @endforeach
                            </ul>
                        </p>
                    @endif

                    @if ($comment->songs->isNotEmpty())
                        <p><strong>Songs:</strong>
                            <ul>
                                @foreach ($comment->songs as $song)
                                    <li>{{$song->title}}</li>
                                @endforeach
                            </ul>
                        </p>
                    @endif
                </div>


                @if ($comment->commentable_id === Auth::id())
                    <form method="POST" action="{{route('comments.destroy', 
                        ['comment' => $comment->id])}}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #ff5722; color: white;
                            border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;
                            font-weight: bold; text-align: right;">
                            Delete Comment
                        </button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

    <div class="pagination" style="text-align: center;">
        {{$comments->links('pagination::semantic-ui')}}
    </div>

    <div style="margin-top: 20px;">
        <a href="{{route('comments.create', ['post' => $post->id])}}" 
        style="background-color: #ff5722; color: white; padding: 5px 10px; border-radius: 5px;
             font-weight: bold; text-decoration: none; display: inline-block; margin-top: 10px;">
            Add Comment
        </a>
    </div>

    <p><a href="{{route('posts.index')}}">Back</a></p>
@endsection
