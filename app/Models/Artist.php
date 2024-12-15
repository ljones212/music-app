<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{

    use HasFactory;

    //Function to return the albums of an artist (one-to-many reltionship). 
    public function albums() {
        return $this->hasMany(Album::class);
    }

    //Funtion to return the posts an artist has made (polymorphic relationship).
    public function posts() {
        return $this->morphMany('App\Post', 'postable');
    }

    //Funtion to return the comments an artist has made (polymorphic relationship).
    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
