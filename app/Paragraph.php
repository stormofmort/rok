<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paragraph extends Model
{
    use SoftDeletes;

    public function subsections()
    {
        return $this->morphMany('App\Subsection', 'subsectionable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
