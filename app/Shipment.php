<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model 
{

    protected $table = 'shipments';
    public $timestamps = true;

    public function order()
    {
        return $this->hasOne('Order', 'idOrder');
    }

}