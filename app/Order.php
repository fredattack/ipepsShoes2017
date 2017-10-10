<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('delivered', 'totalProducts', 'idShipment');
    protected $visible = array('delivered', 'totalProducts', 'idShipment');

    public function orderLines()
    {
        return $this->hasMany('OrderLine');
    }

    public function shipment()
    {
        return $this->hasOne('Shipment', 'idShipment');
    }

}