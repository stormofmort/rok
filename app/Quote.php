<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use SoftDeletes;

    public function subsections()
    {
        return $this->morphMany('App\Subsection', 'subsectionable');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function author() 
    {
        return $this->belongsTo('App\Author');
    }
}
