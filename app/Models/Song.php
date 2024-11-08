<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //Function to return the albums a song is in (many-to-many reltionship).
    public function albums() {
        return $this->belongsToMany(Album::class);
    }
}
