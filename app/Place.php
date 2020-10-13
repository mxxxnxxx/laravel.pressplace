<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    return $this->belongsTo('App\User');
    
    protected $fillable = [
        'name',
        'comment',
        'place_image',
    ];
}
