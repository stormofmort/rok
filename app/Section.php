<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function subsections()
    {
        return $this->hasMany('App\Subsection');
    }
}
