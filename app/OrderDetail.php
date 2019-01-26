<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';//khai báo bảng trong cơ sở dữ liệu
    protected $fillable = ['product_id','order_id','quantity'];//khai báo các trường

    public function order() {
        return $this->belongsTo('App\Order','order_id','id');
    }
    public function product() {
        return $this->belongsTo('App\Product','product_id','id');
    }
}
