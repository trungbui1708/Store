<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $table = 'distributions';//khai báo bảng trong cơ sở dữ liệu
    protected $fillable = ['name','slug','status','category_id'];//khai báo các trường

    public function category() {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function product() {
        return $this->hasMany(Product::class,'distribution_id','id');
    }
}
