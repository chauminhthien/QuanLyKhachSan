<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quyen;

class QuyenController extends Controller
{
    //
    public function getView(){
        $quyen = Quyen::where('remove', 0)->get();
        return view('setting.quyen.view', ['quyen' => $quyen]);
    }

    public function getAddQuyen(){
        return view('setting.quyen.add');
    }

    public function postAddQuyen(Request $request){
        $this->validate($request,[
            'name'                  => 'required|min:3|max:50',
            'url'                   => 'required',
        ], [
            'name.required'         => 'Tên không được để trống',
            'name.min'              => 'Tên Không đúng định dạng',
            'name.max'              => 'Tên quá ngắn',
            'url.required'          => 'Đường dẫn không được để trống',
        ]);

        $quyen = new Quyen();
        $quyen->name = $request->name;
        $quyen->url = $request->url;
        $quyen->save();

        return redirect()->back()->with(['thongbao' => 'Thêm mới thành công']);
    }

    public function getEditQuyen($id){
        $quyen = Quyen::find($id);
        return view('setting.quyen.edit', ['quyen' => $quyen]);
    }

    public function postEditQuyen(Request $request, $id){
        $quyen = Quyen::find($id);

        $this->validate($request,[
            'name'                  => 'required|min:3|max:50',
            'url'                   => 'required',
        ], [
            'name.required'         => 'Tên không được để trống',
            'name.min'              => 'Tên Không đúng định dạng',
            'name.max'              => 'Tên quá ngắn',
            'url.required'          => 'Đường dẫn không được để trống',
        ]);

        $quyen->name = $request->name;
        $quyen->url = $request->url;
        $quyen->save();

        return redirect()->back()->with(['thongbao' => 'Cập nhật thành công']);
    }

    public function getDelQuyen($id){
        $quyen = Quyen::find($id);
        $quyen->remove = 1;
        $quyen->save();

        return redirect()->back()->with(['thongbao' => 'Xoá thành công']);
    }
}
