<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SubProduct extends Model
{
    protected $fillable = [
        'description', 'code', 'picture','price','discount','isOffer','products_id'
    ];
    public function getProducts(){
        return $this->hasOne('App\model\Product','id','products_id')->with("getCategory");
    }
    public function getPriceDymanic(){
        return $this->hasMany('App\model\PriceDymanic','sub_products_id','id');
    }

}
