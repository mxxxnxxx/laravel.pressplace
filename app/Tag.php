<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // placeと多対多
    public function places()
    {
        return $this->belongsToMany('App\Place');
    }
}
