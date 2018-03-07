<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatPhong extends Model
{
    //
    protected $table = 'danhsachdatphong';
    public $timestamps = false;

    public function getPhong(){
        return $this->belongsTo('App\Phong','idPhong', 'id');
    }
}
