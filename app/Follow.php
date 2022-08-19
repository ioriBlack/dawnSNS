<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    use Notifiable;

    // public function user()
    // {
    //     //$this->belongsToMany('App/User');
    //     $this->belongsToMany(User::class);
    // }

    // public function posts()
    // {
    //     // $this->belongsToMany('App/Post');
    //     $this->belongsToMany(Post::class);
    // }
}
