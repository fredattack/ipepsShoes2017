<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model 
{

    protected $table = 'temporderLines';
    public $timestamps = true;
    protected $fillable = array('idUser','idShoe','quantity');
    protected $visible = array('idUser','idShoe','quantity');

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser','id');
    }
    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'idShoe','id');
    }

}