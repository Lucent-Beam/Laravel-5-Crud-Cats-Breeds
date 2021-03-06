<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
     protected $fillable = ['name','date_of_birth','breed_id'];

     public function breeds() {
       return $this->belongsTo('App\Breed');
     }
}
