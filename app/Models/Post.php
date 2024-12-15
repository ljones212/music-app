<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Function to return albums in a post (many-to-many reltionship).
    public function albums() {
        return $this->belongsToMany(Album::class);
    }

    //Function to return songs in a post (many-to-many reltionship).
    public function songs() {
        return $this->belongsToMany(Song::class);
    }

    //Function to return the comments on a post (one-to-many relationship).
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}