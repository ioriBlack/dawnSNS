<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
     public function post(){
        return $this->hasMany(App/Post);
    }

     public function user(){
        return $this->hasMany(App/User);
    }
}
