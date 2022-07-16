<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function follow() {
        return $this->belongsTo('App\Follow');
    }
}
