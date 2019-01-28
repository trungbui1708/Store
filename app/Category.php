<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';//khai báo bảng trong cơ sở dữ liệu
    protected $fillable = ['name','menu_id','status','slug'];//khai báo các trường

    public function menu() {
        return $this->belongsTo(Menu::class,'menu_id','id');
    }
    public function distribution() {
        return $this->hasMany(Distribution::class,'distribution_id','id');
    }
}
