<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PriceDymanic extends Model
{
    protected $fillable = [
        'description', 'price', 'roleQtd','status','sub_products_id'
    ];
}
