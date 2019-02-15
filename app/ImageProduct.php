<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'image_products';  

    public function product()
    {
       return $this->belongsTo(Product::class,'product_id','id');
    }
}
