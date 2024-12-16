<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    use HasFactory;

    //Function to return songs in an album (many-to-many reltionship).
    public function songs() {
        return $this->belongsToMany(Song::class);
    }

    //Function to return the artist of an album (one-to-many relationship).
    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    //Function to return the certification of an album (one-to-one relationship).
    public function certification() {
        return $this->belongsTo(Certification::class);
    }

    //Function to return posts that feature an album (many-to-many reltionship).
    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    //Function to return comments that feature an album (many-to-many relationship).
    public function comments() {
        return $this->belongsToMany(Comment::class);
    }
}
