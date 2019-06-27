<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'description', 'specification', 'mark','summary','custumers_id','categorys_id','sub_categorys_id'
    ];

    public function getCategory(){
        return $this->hasOne('App\model\Categorys','id','categorys_id');
    }
    public function getSubProducts(){
        return $this->hasMany('App\model\SubProduct','products_id','id')->with("getPriceDymanic");
    }

}
