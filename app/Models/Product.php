<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['user_id', 'category_id','title','price','country','age','image','description'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

//    public function getProduct(){
//        return $this->hasMany('App\Models\Product');
//    }

}
