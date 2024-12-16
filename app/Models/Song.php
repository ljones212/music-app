<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{

    use HasFactory;

    //Function to return the albums a song is in (many-to-many relationship).
    public function albums() {
        return $this->belongsToMany(Album::class);
    }

    //Function to return the certification of a song (one-to-one relationship).
    public function certification() {
        return $this->belongsTo(Certification::class);
    }

    //Function to return posts that feature a song (many-to-many reltionship).
    public function posts() {
        return $this->belongsToMany(Post::class);
    }
    
    //Function to return comments that feature a song (many-to-many reltionship).
    public function comments() {
        return $this->belongsToMany(Comment::class);
    }
}