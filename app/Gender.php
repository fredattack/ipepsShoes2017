<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model 
{

    protected $table = 'genders';
    public $timestamps = true;
    protected $fillable = array('name', 'maxSize', 'minSize');
    protected $visible = array('name', 'maxSize', 'minSize');

    public function model()
    {
        return $this->hasMany('Modele');
    }

    public function size()
    {
        return $this->hasMany('Size');
    }

}