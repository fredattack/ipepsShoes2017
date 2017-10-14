<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model 
{

    protected $table = 'shoes';
    public $timestamps = true;
    protected $fillable = array( 'size','quantity','idModele', 'idReduction');
    protected $visible = array( 'size','quantity','idModele', 'idReduction');



    public function modele()
    {
        return $this->belongsTo(Modele::class, 'idModele','id');
    }

}