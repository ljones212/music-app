<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    //Function to return the certification the album has (one-to-one relationship).
    public function album() {
        return $this->belongsTo(Album::class);
    }
}
