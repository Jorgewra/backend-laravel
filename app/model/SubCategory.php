<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'description', 'picture','custumers_id'
    ];
}
