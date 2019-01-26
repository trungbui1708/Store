<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $table = 'distributions';//khai báo bảng trong cơ sở dữ liệu
    protected $fillable = ['name','slug','status','category_id'];//khai báo các trường

    public function category() {
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function product() {
        return $this->hasMany('App\Product','distribution_id','id');
    }
}
