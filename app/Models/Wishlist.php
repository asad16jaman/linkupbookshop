<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //
    protected $guarded = [];

    public function book(){
        return $this->belongsTo(Book::class);
    }
    
}
