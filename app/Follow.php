<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    use Notifiable;

        public function posts() {
        return $this->hasMany('App\Post');
        }

        public function user() {
        return $this->hasMany('App\User');
        }
}
