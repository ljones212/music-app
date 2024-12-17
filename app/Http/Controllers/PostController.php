<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(20);
        return view('posts.posts_index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('name', 'asc')->get();
        $albums = Album::all();
        $songs = Song::all();

        return view('posts.posts_create', [
            'users' => $users,
            'albums' => $albums,
            'songs' => $songs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'caption' => 'required|max:255',
            'album_ids' => 'array',
            'song_ids' => 'array',
        ]);

        $p = new Post;
        $p->title = $validatedData['title'];
        $p->caption = $validatedData['caption'];
        $p->postable_id = Auth::id();
        $p->postable_type = Auth::user()::class;
        $p->save();

        // Attach albums to the post (many-to-many relationship)
        if (isset($validatedData['album_ids'])) {
            $p->albums()->attach($validatedData['album_ids']);
        }

        // Attach songs to the post (many-to-many relationship)
        if (isset($validatedData['song_ids'])) {
            $p->songs()->attach($validatedData['song_ids']);
        }

        return redirect()->route('posts.index')
            ->with('message', 'New Post Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) {
        $comments = $post->comments()->with('commentable')->get();
        return view('posts.posts_show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('message', 'Post was deleted');
    }
}
