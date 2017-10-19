<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model 
{

    protected $table = 'shipments';
    public $timestamps = true;
    protected $fillable = array('idAdress','trackingNr');
    protected $visible = array('idAdress','trackingNr');

    public function adress()
    {
        return $this->hasOne(Adress::class,'id','idAdress');
    }

}