<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;
    public function subsections()
    {
        return $this->morphMany('App\Subsection', 'subsectionable');
    }
}
