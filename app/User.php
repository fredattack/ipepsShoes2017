<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

	use Notifiable;
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('firstName', 'lastName', 'login', 'email','password', 'role','idFactAdress','idShipAdress1','idShipAdress2');
    protected $visible = array('firstName', 'lastName', 'login', 'email','password', 'role','idFactAdress','idShipAdress1','idShipAdress2');

	protected $hidden = [
        'password', 'remember_token',
    ];
	
    public function order()
    {
        return $this->hasMany(Order::class,'idUser','id');
    }

    public function adress()
    {
        return $this->hasMany(adress::class,'idUser','id');
    }

}