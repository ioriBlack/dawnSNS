<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory;

    public function user()
    {
        return $this->hasMany('App/User');
        //return $this->hasMany(User::class);
    }

    public function follow()
    {
        return $this->belongsTo('App/Follow');
        //return $this->belongsTo(Follow::class);
    }
}
