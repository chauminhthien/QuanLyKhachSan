<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\HangPhong;
use App\Lau;

class PhongController extends Controller
{
    //

    public function getViewPhong(){
        $phong = Phong::where('remove', 0)->get();
        return view('cate.phong.view', ['phong' => $phong]);
    }

    public function getAddPhong(){
        $hangphong = HangPhong::all();
        $lau = Lau::all();

        return view('cate.phong.add', ['hangphong' => $hangphong, 'lau' => $lau]);
    }

    public function getGiaPhong($id){
        $hangphong = HangPhong::find($id);
        echo $hangphong->gia;
    }

    public function postAddPhong(Request $request){
        $this->validate($request,[
            'name'      => 'required|min:3',
            'gia'       => 'required',
        ], [
            'name.required'   => 'Name không được để trống',
            'name.min'        => 'Name Quá Ngắn',
            'gia.required'    => 'Giá không được để trống',
        ]);
        
        $phong = new Phong();
        $phong->name            = $request->name;
        $phong->nameKhongDau    = changeTitle($request->name);
        $phong->gia             = $request->gia;
        $phong->idHangPhong     = $request->idHangPhong;
        $phong->idLau           = $request->idLau;
        $phong->save();

        return redirect()->back()->with(['thongbao' => 'Thêm Mới Thành Công']);
    }

    public function getEditPhong($id){
        $hangphong  = HangPhong::all();
        $lau        = Lau::all();
        $phong      = Phong::find($id);

        return view('cate.phong.edit', ['hangphong' => $hangphong, 'lau' => $lau, 'phong' => $phong]);
    }

    public function postEditPhong(Request $request, $id){
        $this->validate($request,[
            'name'      => 'required|min:3',
            'gia'       => 'required',
        ], [
            'name.required'   => 'Name không được để trống',
            'name.min'        => 'Name Quá Ngắn',
            'gia.required'    => 'Giá không được để trống',
        ]);
        
        $phong = Phong::find($id);
        $phong->name            = $request->name;
        $phong->nameKhongDau    = changeTitle($request->name);
        $phong->gia             = $request->gia;
        $phong->idHangPhong     = $request->idHangPhong;
        $phong->idLau           = $request->idLau;
        $phong->save();

        return redirect()->back()->with(['thongbao' => 'Cập Nhật Thành Công']);
    }
}
