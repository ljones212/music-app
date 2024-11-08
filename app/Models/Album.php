<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //Function to return songs in an album (many-to-many reltionship).
    public function songs() {
        return $this->belongsToMany(Song::class);
    }

    //Function to return the artist of an album (one-to-many reltionship).
    public function artist() {
        return $this->belongsTo(Artist::class);
    }
}
