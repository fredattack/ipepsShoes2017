<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

	use Notifiable;
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('firstName', 'surname', 'login', 'email','password', 'role');
    protected $visible = array('firstName', 'surname', 'login', 'email', 'role');

	protected $hidden = [
        'password', 'remember_token',
    ];
	
    public function order()
    {
        return $this->hasMany('Order');
    }

    public function adress()
    {
        return $this->hasMany('Adress');
    }

}