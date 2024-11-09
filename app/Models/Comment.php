<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //Function to return the post a comment is on (one-to-many relationship).
    public function post() {
        return $this->hasOne(Post::class);
    }

    //Function to return the albums in a comment (many-to-many relationship).
    public function albums() {
        return $this->belongsToMany(Album::class);
    }

    //Function to return songs in a comment (many-to-many reltionship).
    public function songs() {
        return $this->belongsToMany(Song::class);
    }
}
