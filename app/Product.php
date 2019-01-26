<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';//khai báo bảng trong cơ sở dữ liệu
    protected $fillable = ['name','images','price','discount','color','hot','thumbnail','warranty','brand','distribution_id','user_id','status'];
    //khai báo các trường

    public function distribution() {
        return $this->belongsTo('App\Distribution','distribution_id','id');
    }
    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }
    
}
