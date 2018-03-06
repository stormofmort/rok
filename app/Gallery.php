<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    public function subsections()
    {
        return $this->morphMany('App\Subsection', 'subsectionable');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }
}
