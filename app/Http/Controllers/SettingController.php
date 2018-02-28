<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoKhachSan;
use App\HangPhong;
use App\Lau;

class SettingController extends Controller
{
    //

    public function getInfo(){
        $info = InfoKhachSan::find(1);
        return view('setting.info.view', ['info' => $info]);
    }

    public function postInfo(Request $request){
        $info = InfoKhachSan::find(1);

        $this->validate($request, [
            'email'                 => 'required|email|max:50',
            'name'                  => 'required|min:3|max:50',
            'phone'                 => 'required|min:3|max:50',
            'address'               => 'required|min:3|max:50',
        ], [
            'email.required'        => 'Email không được để trống',
            'email.email'           => 'Email Không đúng định dạng',
            'email.max'             => 'Name quá ngắn',
            'name.min'              => 'Tên quá ngắn',
            'name.max'              => 'Tên quá dài',
            'name.required'         => 'Tên không được để trống',
            'address.min'           => 'Địa Chỉ quá ngắn',
            'address.max'           => 'Địa Chỉ Tên quá dài',
            'address.required'      => 'Địa Chỉ Tên không được để trống',
        ]);

        $info->name     = $request->name;
        $info->email    = $request->email;
        $info->phone    = $request->phone;
        $info->fax      = $request->fax;
        $info->address  = $request->address;

        $info->save();

        return redirect()->back()->with(['thongbao' => 'Cập Nhật Thành Công']);
    }

    public function getHangPhong(){
        $hangphong = HangPhong::all();
        return view('setting.hangphong.view', ['hangphong' => $hangphong ]);
    }

    public function getAddHangPhong(){
        return view('setting.hangphong.add');
    }

    public function postAddHangPhong(Request $request){
        $this->validate($request,[
            'name'                  => 'required|min:3|max:50',
            'gia'                   => 'required',
        ], [
            'name.required'         => 'Tên không được để trống',
            'name.min'              => 'Tên Không đúng định dạng',
            'name.max'              => 'Tên quá ngắn',
            'gia.required'          => 'Giá không được để trống',
        ]);

        $hangphong          = new HangPhong();
        $hangphong->name    = $request->name;
        $hangphong->gia     = $request->gia;

        $hangphong->save();

        return redirect()->back()->with(['thongbao' => 'Thêm Thành Công']);
    }

    public function getEditHangPhong($id){
        $hangphong = HangPhong::find($id);
        return view('setting.hangphong.edit', ['hangphong' => $hangphong]);
    }

    public function postEditHangPhong(Request $request, $id){
        $this->validate($request,[
            'name'                  => 'required|min:3|max:50',
            'gia'                   => 'required',
        ], [
            'name.required'         => 'Tên không được để trống',
            'name.min'              => 'Tên Không đúng định dạng',
            'name.max'              => 'Tên quá ngắn',
            'gia.required'          => 'Giá không được để trống',
        ]);

        $hangphong          = HangPhong::find($id);
        $hangphong->name    = $request->name;
        $hangphong->gia     = $request->gia;

        $hangphong->save();

        return redirect()->back()->with(['thongbao' => 'Cập Nhật Thành Công']);
    }

    public function getDelHangPhong($id){
        $hangphong          = HangPhong::find($id);
        $hangphong->delete();

        return redirect()->back()->with(['thongbao' => 'Xoá Thành Công Thành Công']);
    }

    public function getViewLau(){
        $lau = Lau::all();
        return view('setting.lau.view', ['lau' => $lau]);
    }

    public function getAddLau(){
        return view('setting.lau.add');
    }

    public function postAddLau(Request $request){
        $this->validate($request,[
            'name'                  => 'required|min:3|max:50',
        ], [
            'name.required'         => 'Tên không được để trống',
            'name.min'              => 'Tên Không đúng định dạng',
            'name.max'              => 'Tên quá ngắn',
        ]);

        $lau            = new Lau();
        $lau->name      = $request->name;
        $lau->vitri     = $request->vitri;
        $lau->mota      = $request->mota;

        $lau->save();

        return redirect()->back()->with(['thongbao' => 'Thêm Thành Công']);
    }

    public function getEditLau($id){
        $lau = Lau::find($id);
        return view('setting.lau.edit', ['lau' => $lau]);
    }

    public function postEditLau(Request $request, $id){
        $this->validate($request,[
            'name'                  => 'required|min:3|max:50',
        ], [
            'name.required'         => 'Tên không được để trống',
            'name.min'              => 'Tên Không đúng định dạng',
            'name.max'              => 'Tên quá ngắn',
        ]);

        $lau            = Lau::find($id);
        $lau->name      = $request->name;
        $lau->vitri     = $request->vitri;
        $lau->mota      = $request->mota;

        $lau->save();

        return redirect()->back()->with(['thongbao' => 'Cập Nhật Thành Công']);
    }

    public function getDelLau($id){
        $lau          = Lau::find($id);
        $lau->delete();

        return redirect()->back()->with(['thongbao' => 'Xoá Thành Công Thành Công']);
    }
}
