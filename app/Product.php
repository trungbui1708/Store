<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';//khai báo bảng trong cơ sở dữ liệu
    protected $fillable = ['name','images','price','discount','color','hot','thumbnail','warranty','brand','slug','distribution_id','user_id','status'];
    //khai báo các trường

    public function distribution() {
        return $this->belongsTo(Distribution::class,'distribution_id','id');
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
    
}
