<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model 
{

    protected $table = 'modeles';
    public $timestamps = true;
    protected $fillable = array('idGender', 'idBrand', 'idReduction', 'idType', 'price', 'image');
    protected $visible = array('color', 'idGender', 'idBrand', 'idReduction', 'idType', 'price', 'image');

    public function model_gender()
    {
        return $this->belongsTo('Gender', 'idGender');
    }

    public function modele_brand()
    {
        return $this->belongsTo('Brand', 'idBrand');
    }

    public function model_shoe()
    {
        return $this->hasMany('Shoe');
    }

    public function model_type()
    {
        return $this->belongsTo('Type', 'idType');
    }

}