<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model 
{

    protected $table = 'modeles';
    public $timestamps = true;
    protected $fillable = array('name','color','idGender', 'idBrand', 'idReduction', 'idType', 'price', 'image');
    protected $visible = array('name','color', 'idGender', 'idBrand', 'idReduction', 'idType', 'price', 'image');

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'idGender','id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'idBrand','id');
    }

    public function shoes()
    {
        return $this->hasMany('Shoe','idModele','id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'idType','id');
    }

    public function reduction()
    {
        return $this->belongsTo(Reduction::class, 'idReduction','id');
    }

}