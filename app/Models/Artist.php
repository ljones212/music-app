<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{

    //Function to return the albums of an artist (one-to-many reltionship). 
    public function albums() {
        return $this->hasMany(Album::class);
    }
}
