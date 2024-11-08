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
}
