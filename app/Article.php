<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = ['title','content',
        'thumbnail','description','user_id','hot','status','slug','parent_id'];
    
        public function user() {
            return $this->belongsTo(User::class,'user_id','id');
        }
}
