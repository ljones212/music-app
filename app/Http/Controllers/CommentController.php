<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Album;
use App\Models\Song;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($postID)
    {
        $post = Post::findOrFail($postID);
        $albums = Album::all();
        $songs = Song::all();

        return view('comments.comments_create', [
            'post' => $post,
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
            'comment' => 'required|max:255',
            'album_ids' => 'array',
            'song_ids' => 'array',
        ]);

        $post = Post::findOrFail($request->post_id);
    
        $c = new Comment();
        $c->comment = $validatedData['comment'];
        $c->commentable_id = Auth::id();
        $c->commentable_type = Auth::user()::class;
        $c->post_id = $post->id;
        $c->save();
    
        if (isset($validatedData['album_ids'])) {
            $c->albums()->attach($validatedData['album_ids']);
        }
    
        if (isset($validatedData['song_ids'])) {
            $c->songs()->attach($validatedData['song_ids']);
        }
    
        return redirect()->route('posts.show', ['post' => $post->id])
            ->with('message', 'Comment added!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

        $comment = Comment::findOrFail($id);
        
        if ($comment->commentable_id === auth()->id()) {
            $comment->delete();

            return redirect()->route('posts.show', ['post' => $comment->post_id])
                ->with('message', 'Comment deleted!');
        }

        return redirect()->route('posts.show', ['post' => $comment->post_id])
            ->with('error', 'You are not authorized to delete this comment.');
    }
}
