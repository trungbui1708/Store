<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';//khai báo bảng trong cơ sở dữ liệu
    protected $fillable = ['name','email','address','phone','sum_money','delivery_date','user_id','status'];//khai báo các trường

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function order_detail() {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
