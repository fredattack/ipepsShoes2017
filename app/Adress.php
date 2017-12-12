<?php

namespace App;

use App\Http\Controllers\AdressController;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model 
{

    protected $table = 'adresses';
    public $timestamps = true;
    protected $fillable = array('idUser', 'type', 'street', 'number', 'postCode', 'city', 'country', 'deliveryCost','distance','name');
    protected $visible = array('id','idUser', 'type', 'street', 'number', 'postCode', 'city', 'country', 'deliveryCost','distance','name');

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser','id');
    }


}