<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model 
{

    protected $table = 'orderLines';
    public $timestamps = true;
    protected $fillable = array('idOrder','idShoes','quantity');
    protected $visible = array('quantity');

    public function order()
    {
        return $this->belongsTo(Order::class, 'idOrder','id');
    }
    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'idShoe','id');
    }

}