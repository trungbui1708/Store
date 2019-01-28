<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name','username','phone','images','level','password_hash','email','address','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function article() {
        return $this->hasMany(Article::class,'user_id','id');
    }
    public function order() {
        return $this->hasMany(Order::class,'user_id','id');
    }
    public function product() {
        return $this->hasMany(Product::class,'user_id','id');
    }
}
