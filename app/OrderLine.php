<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model 
{

    protected $table = 'orderLines';
    public $timestamps = true;
    protected $fillable = array('idOrder','idShoe','quantity');
    protected $visible = array('idOrder','idShoe','quantity');

    public function order()
    {
        return $this->belongsTo(Order::class, 'idOrder','id');
    }
    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'idShoe','id');
    }

}