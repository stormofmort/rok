<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function subsections()
    {
        return $this->morphMany('App\Subsection', 'subsectionable');
    }

    public function galleries()
    {
        return $this->belongsToMany('App\Gallery');
    }
}
