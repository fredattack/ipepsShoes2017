<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model 
{

    protected $table = 'orderLines';
    public $timestamps = true;
    protected $fillable = array('quantity');
    protected $visible = array('quantity');

    public function order()
    {
        return $this->belongsTo('Order', 'idOrder');
    }

}