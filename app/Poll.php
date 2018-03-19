<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use SoftDeletes;
    public function options()
    {
        return $this->hasMany('App\PollOption');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function subsections()
    {
        return $this->morphMany('App\Subsection', 'subsectionable');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
