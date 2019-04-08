<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AprioriProduct extends Model
{
    protected $table = 'apriori_product';

    protected $fillable = ['product_id','apriori_product_id',
        'support','confidence'];


}
