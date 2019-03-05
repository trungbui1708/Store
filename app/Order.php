<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';//khai báo bảng trong cơ sở dữ liệu
    protected $fillable = ['sum_money','count','delivery_date','user_id','status','order_detail','order_code'];//khai báo các trường

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function order_detail() {
        return $this->hasMany(OrderDetail::class,'orders_id','id');
    }
}
