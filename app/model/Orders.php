<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'phone',
        'total',
        'discount',
        'nameCliente',
        'paymentType',
        'typeShop',
        'street',
        'city',
        'district',
        'state',
        'country',
        'reference',
        'complement',
        'numberHome',
        'zipCode',
        'latitude',
        'longitude',
        'clients_id',
        'custumers_id',
        'coupons_id'
    ];
    public function getOrdersIetns(){
        return $this->hasMany('App\model\OrderItens','orders_id','id')->with("getProducts");
    }
    public function getCustumer(){
        return $this->hasOne('App\model\Custumers','id','custumers_id');
    }
    public function getUser(){
        return $this->hasOne('App\model\Client','id','clients_id');
    }
}
