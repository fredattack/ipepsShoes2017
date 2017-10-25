<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempCartItem extends Model
{
    protected $table = 'temporderLines';
    public $timestamps = true;
    protected $fillable = array('idUser','idShoes','quantity');
    protected $visible = array('idUser','idShoes','quantity');

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser','id');
    }
    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'idShoe','id');
    }
}
