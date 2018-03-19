<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use SoftDeletes;

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }
}
