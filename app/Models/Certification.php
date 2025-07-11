<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    
    //Function to return the certification the album has (one-to-one relationship).
    public function album() {
        return $this->hasOne(Album::class);
    }

    //Function to return the certification a song has (one-to-one relationship).
    public function song() {
        return $this->hasOne(Song::class);
    }
}
