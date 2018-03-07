<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatPhong;

class DatPhongController extends Controller
{
    //

    public function getViewDatPhong(){
        $datphong = DatPhong::all();
        return view('cate.datphong.view', ['datphong' => $datphong]);
    }

    public function getViewDetailDatPhong($id){
        echo $id;
    }

    public function getNewDatPhong(){
        echo 'Đặt Phòng Mới';
    }

    public function getNewDatPhongById($id){
        echo $id;
    }
}
