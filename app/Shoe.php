<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model 
{

    protected $table = 'shoes';
    public $timestamps = true;
    protected $fillable = array('reduction', 'IdModel', 'idReduction');
    protected $visible = array('reduction', 'IdModel', 'idReduction');

    public function shoeReduction()
    {
        return $this->belongsTo('Reduction', 'idReduction');
    }

    public function ShoeModel()
    {
        return $this->belongsTo('Modele', 'IdModel');
    }

}