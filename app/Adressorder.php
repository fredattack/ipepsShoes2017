<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adressorder extends Model
{

    protected $table = 'adressorders';
    public $timestamps = true;
    protected $fillable = array('id','idOrder' ,'street', 'number', 'postCode', 'city', 'country', 'deliveryCost','distance','name');
    protected $visible = array('id','idOrder', 'street', 'number', 'postCode', 'city', 'country', 'deliveryCost','distance','name');

    public function order()
    {
        return $this->belongsTo(Order::class, 'id','idOrder');
    }
}
