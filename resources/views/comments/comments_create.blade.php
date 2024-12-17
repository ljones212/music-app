<form method="POST" action="{{ route('comments.store') }}">
    @csrf

    <input type="hidden" name="post_id" value="{{ $post->id }}">

    <p>Add Comment: <input type="text" name="comment" value="{{ old('comment') }}"></p>

    <p>Albums:
        <select name="album_ids[]" multiple>
            @foreach ($albums as $album)
                <option value="{{ $album->id }}">{{ $album->title }}</option>
            @endforeach
        </select>
    </p>

    <p>Songs:
        <select name="song_ids[]" multiple>
            @foreach ($songs as $song)
                <option value="{{ $song->id }}">{{ $song->title }}</option>
            @endforeach
        </select>
    </p>

    <input type="submit" value="Submit">
    <a href="{{ route('posts.show', $post->id) }}">Cancel</a>
</form>
