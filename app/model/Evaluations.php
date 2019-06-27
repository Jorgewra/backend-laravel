<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    protected $fillable = [
        'rating', 'client_id', 'orders_id'
    ];
}
