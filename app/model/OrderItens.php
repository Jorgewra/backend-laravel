<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OrderItens extends Model
{
    protected $fillable = [
        'description', 'quantity', 'price', 'orders_id','sub_products_id'
    ];
    public function getProducts(){
        return $this->hasOne('App\model\SubProduct','id','sub_products_id');
    }
}
