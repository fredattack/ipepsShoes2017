<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model 
{

    protected $table = 'adresses';
    public $timestamps = true;
    protected $fillable = array('idUser', 'type', 'street', 'number', 'postCode', 'city', 'country', 'deliveryCost');
    protected $visible = array('idUser', 'type', 'street', 'number', 'postCode', 'city', 'country', 'deliveryCost');

}