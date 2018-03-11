<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    //
    protected $table    = 'phong';
    public $timestamps  = false;

    public function getCustomer(){
    	return $this->belongsTo('App\DatPhong','idPhong', 'id');
    }

    public function getHangPhong(){
        return $this->belongsTo('App\HangPhong','idHangPhong', 'id');
    }

    public function getDatPhong($id){
        //echo $id;
        $res = DB::select("SELECT dp.id as id, dp.name as name, dp.tgianden, dp.tgiandi FROM `phong`, `danhsachdatphong` as `dp` WHERE phong.id = {$id} AND dp.idPhong = phong.id");
        return $res[0];
        
    }
}
