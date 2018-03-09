<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatPhong;
use App\HangPhong;
use App\Phong;
use App\InfoKhachSan;

class DatPhongController extends Controller
{
    //

    public function getViewDatPhong(){
        $datphong = DatPhong::all();
        return view('cate.datphong.view', ['datphong' => $datphong]);
    }

    public function getViewDetailDatPhong($id){
        $hangphong = HangPhong::all();
        $datphong = DatPhong::find($id);
        return view('phong.chitiet', ['hangphong' => $hangphong, 'datphong' => $datphong]);
    }

    public function getNewDatPhong(){
        $hangphong = HangPhong::all();

        return view('phong.datphong', ['hangphong' => $hangphong]);
    }

    public function getNewDatPhongById($id){
        $hangphong = HangPhong::all();
        $phong = Phong::find($id);
        if($phong->isU == 1)
            return redirect()->back()->with(['modal-danger' => 'Phòng Đã Có Người Đặt']);

        return view('phong.datphong', ['hangphong' => $hangphong, 'phong' => $phong]);
    }

    public function getPhongDP($id, $idp){
        $phong = Phong::where(['remove' => 0, 'idHangPhong' => $id, 'isU' => 0, 'st' => 0])->get();
        foreach($phong as $p){
            echo '<option '.( ($idp == $p->id) ? 'selected="selected"' : '' ).' value="'.$p->id.'">'.$p->name.'</option>';
        }
    }

    public function getInfoPhongDP($id){
        $phong = Phong::find($id);
        $d = ['gia' => ''];
        if(isset($phong->gia)) $d['gia'] = $phong->gia;
        echo json_encode($d);
    }

    public function postNewDatPhong(Request $request){
        $id = $request->idPhong;
        $phong = Phong::find($id);
        $phong->isU = 1;

        $datphong = new DatPhong();
        $datphong->name            = $request->name;
        $datphong->cmnd            = $request->cmnd;
        $datphong->phone           = $request->phone;
        $datphong->email           = $request->email;
        $datphong->tgianden        = time();
        $datphong->idPhong         = $request->idPhong;
        $datphong->pthucthanhtoan  = $request->pthucthanhtoan;
        $datphong->tientratruoc    = $request->tientratruoc;

        $phong->save();
        $datphong->save();
        return redirect('/cate/dat-phong/danh-sach.html')->with(['thongbao' => "Đặt Phòng Thành công"]);

    }

    public function getInHoaDon($id){
        $info = InfoKhachSan::find(1);
        $datphong = DatPhong::find($id);
        return view('hoadon.invoice', ['info' => $info, 'datphong' => $datphong]);
    }

    public function getThanhToan($id){
        $datphong = DatPhong::find($id);
        $idPhong = $datphong->idPhong;

        $phong = Phong::find($idPhong);

        $datphong->tgiandi = time();
        $datphong->st = 1;

        $phong->isU = 0;
        $phong->st  = 2;

        $datphong->save();
        $phong->save();

        return redirect('cate/dat-phong/in/'.$id.'/in-hoa-don.html');
    }

    
}
