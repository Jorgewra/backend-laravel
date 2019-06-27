<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname','phone','petname','token','picture','status'
    ];
    public function getAddress(){
        return $this->hasMany('App\model\Addresses','clients_id','id');
    }

}
