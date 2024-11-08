<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //Function to return the albums a song is in (many-to-many relationship).
    public function albums() {
        return $this->belongsToMany(Album::class);
    }

    //Function to return the certification of a song (one-to-one relationship).
    public function certification() {
        return $this->hasOne(Certification::class);
    }
}
