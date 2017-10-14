<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model 
{

    protected $table = 'brands';
    public $timestamps = true;
    protected $fillable = array('name', 'logo');
    protected $visible = array('name', 'logo');

    public function modele()
    {
        return $this->hasMany('Modele');
    }

}