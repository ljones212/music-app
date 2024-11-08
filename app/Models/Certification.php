<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    //Function to return the certification the album has (one-to-one relationship).
    public function album() {
        return $this->belongsTo(Album::class);
    }

    //Function to return the certification a song has (one-to-one relationship).
    public function song() {
        return $this->belongsTo(Song::class);
    }
}
