<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Custumers extends Model
{
    protected $fillable = [
        'email',
        'fullname',
        'picture',
        'street',
        'city',
        'district',
        'state',
        'country',
        'reference',
        'isPaymentCad',
        'isPaymentCash',
        'numberHome',
        'zipCode',
        'latitude',
        'longitude',
        'rating',
        'fee_fast',
        'fee_long',
        'km_fast',
        'km_long',
        'time_open',
        'time_close',
        'isSaturday',
        'isSunday',
        'token',
        'phone'
    ];
    protected $hidden = [
        'token','users_id'
    ];

    public function getBanners(){
        return $this->hasMany('App\model\Banners','custumers_id','id');
    }
}
