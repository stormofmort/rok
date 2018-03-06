<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollOption extends Model
{
    use SoftDeletes;

    public function polls()
    {
        return $this->belongsTo('App\Poll');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }
}
