<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;


  public function posts()
    {
        //return $this->belongsToMany('App/Post');
        return $this->belongsToMany(Post::class);
    }

    public function follows()
    {
        //return $this->belongsToMany('App/follow');
        return $this->belongsToMany(self::class,'follows','follower_id','follow_id');
    }

    public function followers()
    {
        //return $this->belongsToMany('App/follow');
        return $this->belongsToMany(self::class,'follows','follower_id','follow_id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
