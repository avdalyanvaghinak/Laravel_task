<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name'];

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }


}
