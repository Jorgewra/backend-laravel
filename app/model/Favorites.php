<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $fillable = [
        'description', 'client_id', 'products_id'
    ];
    public function getProducts(){
        return $this->hasOne('App\model\Product','id','products_id')->with("getCategory");
    }


}
