<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $fillable = [
        'description', 'url', 'picture','custumers_id'
    ];
}
