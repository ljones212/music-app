<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Certification;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Returns a list of albums (20 per page) to the album_index view.
        $albums = Album::paginate(20);
        return view('albums.album_index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = Artist::orderBy('name', 'asc')->get();
        $certifications = Certification::all();

        return view('albums.album_create', [
            'artists' => $artists,
            'certifications' => $certifications,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'duration' => 'required|integer',
            'release_date' => 'required|date',
            'artist_id' => 'required|integer',
            'certification_id' => 'required|integer',
        ]);

        $a = new Album;
        $a->title = $validatedData['title'];
        $a->duration = $validatedData['duration'];
        $a->release_date = $validatedData['release_date'];
        $a->artist_id = $validatedData['artist_id'];
        $a->certification_id = $validatedData['certification_id'];
        $a->save();

        session()->flash('message', 'Album was created!');
        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Returns the album tot eh album_show page. If not available sends error.
        $album = Album::findOrFail($id);
        return view('albums.album_show', ['album' => $album]);
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
        //
    }
}
