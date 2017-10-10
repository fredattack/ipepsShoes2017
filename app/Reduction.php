<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reduction extends Model 
{

    protected $table = 'reductions';
    public $timestamps = true;
    protected $fillable = array('value');

    public function reduction_Shoe()
    {
        return $this->hasMany('Shoe');
    }

}