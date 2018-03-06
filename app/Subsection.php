<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subsection extends Model
{
    use SoftDeletes;

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function subsectionable()
    {
        return $this->morphTo();
    }
}
