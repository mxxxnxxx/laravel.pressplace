<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmailContract
{
    // メール認証での記述
    use MustVerifyEmail, Notifiable;

    // 論理削除機能
    use SoftDeletes;
    
    // protected $table = 'users';
    // protected $dates = ['deleted_at'];
    // protected $fillable = ['body'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    
     protected $fillable = [
        'name', 'email', 'password', 'user_image', 'introduction',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
// userがplaceを所有する1対多
    public function places()
    {
        return $this->hasMany('App\place');
    }
}
