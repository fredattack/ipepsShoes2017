<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model 
{

    protected $table = 'sizes';
    public $timestamps = true;
    protected $fillable = array('value');
    protected $visible = array('value');

    public function gender()
    {
        return $this->belongsTo('Gender');
    }

}