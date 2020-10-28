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
        'address',
        'user_id'

    ];


// placeがuserに属す
    public function user(){
        return $this->belongsTo('App\User');
    }

    // place_imageがplaceに属する
    public function place_images()
    {
        return $this->hasMany('App\Place_image');
    }
    // place + tag 多対多
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    
}
