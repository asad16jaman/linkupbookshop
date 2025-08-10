<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Book extends Model
{
    //

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class)->select(['id','name']);
    }

    // public function image(){
       
    // }

    public function bestsell(){
        return $this->hasOne(BestSell::class);
    }

    

    public function getBestsellAttribute(){

        return $this->bestsell()->exists();
    }


    protected function lognDescription(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => htmlspecialchars_decode($value, ENT_QUOTES),
            set: fn ($value) => htmlspecialchars($value, ENT_QUOTES, 'UTF-8')
        );
    }



    
}
