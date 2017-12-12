<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('delivered', 'totalProducts', 'idShipment','orderReady','idUser','idOrder','idAdress');
    protected $visible = array('delivered', 'totalProducts', 'idShipment','orderReady','idUser','idOrder','idAdress');

    public function orderLine()
    {
        return $this->hasMany(OrderLine::class,'idOrder','id');
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class, 'id','idShipment');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'idUser','id');
    }

    public function adressorder()
    {
        return $this->belongsTo(Adressorder::class, 'idOrder','id');
    }
}