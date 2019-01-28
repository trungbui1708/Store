<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';//khai báo bảng trong cơ sở dữ liệu
    protected $fillable = ['name','slug','status'];//khai báo các trường

    public function category() {
        $this->hasMany(Category::class,'menu_id','id');
    }
}
