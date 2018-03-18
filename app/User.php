<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function paragraphs()
    {
        return $this->hasMany('App\Paragraph');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }
}
