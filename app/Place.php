<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Place extends Model
{
    // ソフトデリート
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    
    
    protected $fillable = [
        'name',
        'comment',
        'place_image',
    ];


// placeがuserに属す
    public function user(){
        return $this->belongsTo('App\User');
    }

}
