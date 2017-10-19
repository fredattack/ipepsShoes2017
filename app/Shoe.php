<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model 
{

    protected $table = 'shoes';
    public $timestamps = true;
    protected $fillable = array( 'size','quantity','idModele');
    protected $visible = array( 'size','quantity','idModele');



    public function modele()
    {
        return $this->belongsTo(Modele::class, 'idModele','id');
    }



    public function orderLine()
    {
        return $this->hasMany(OrderLine::class,'idShoe','id');
    }

}