<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function articles()
    {
        return $this->morphedByMany('App\Article', 'taggable');
    }

    public function images()
    {
        return $this->morphedByMany('App\Image', 'taggable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
