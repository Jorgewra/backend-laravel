<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $fillable = [
        'description', 'code', 'validity', 'isShared'
    ];
}
