<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model 
{

    protected $table = 'types';
    public $timestamps = true;
    protected $fillable = array('name');
    protected $visible = array('name');

    public function types_Models()
    {
        return $this->hasMany('Modele');
    }

}