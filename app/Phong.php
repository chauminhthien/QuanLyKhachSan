<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    //
    protected $table    = 'phong';
    public $timestamps  = false;

    public function getCustomer(){
    	return $this->belongsTo('App\DatPhong','idPhong', 'id');
    }
}
