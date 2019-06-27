<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $fillable = [
        'street', 'city', 'district','state','country','reference','complement','numberHome','zipCode','latitude','longitude','clients_id'
    ];
}
