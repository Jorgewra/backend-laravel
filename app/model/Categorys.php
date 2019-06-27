<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    protected $fillable = [
        'description', 'picture','custumers_id','status'
    ];
}
