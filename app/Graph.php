<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Graph extends Model
{
    use SoftDeletes;
    public function axes()
    {
        return $this->hasMany('App\Axis');
    }

    public function coordinates()
    {
        return $this->hasMany('App\Coordinate');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }
}
