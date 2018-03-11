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

    public function getSoDoPhong(){
        return view('phong.view');
    }

    public function getViewSdPhong($id){
        if($id < 0 )
            $phong = Phong::where(['remove'=> 0 ])->get();
        else if($id == 2 || $id == 3)
            $phong = Phong::where(['remove'=> 0, 'st' => $id])->get();
        else
            $phong = Phong::where(['remove'=> 0, 'isU' => $id])->get();

        $txt = '';
        if(count($phong) > 0 ){
            foreach($phong as $p){
                $txt .= '<div class="col-md-3">
                            <div id="'.$p->id.'" st="'.$id.'" class=" row phong room-'.( ($p->isU == 1 && $p->st == 0) ? '1' : $p->st ).' sdp-column-4" >
                                <div class=" mg0 broom-top" title="Phòng: 2-008 - Hạng phòng: 2">
                                    <div class="box-room">
                                    <span class="b-name">'. $p->name .'</span>
                                    </div>
                                </div>
                                <div class=" mg0 broom-ct clearfix">
                                    '. ( ($p->isU == 1) ? '<div class="broom-ct-it" title="Khách hàng: Đã Đặt"><span>'.$p->getDatPhong($p->id)->name.'</span></div>
                                                <div class="broom-ct-it" title="Tổng thời gian khách ở: 1h 2p">
                                                    <i class="fa fa-clock-o "></i><span>'. getTime($p->getDatPhong($p->id)->tgianden, time()) .'</span>
                                                </div>
                                                <div class="broom-ct-it" title="Thời gian đến - Thời gian dự kiến đi">
                                                    <i class="fa fa-calendar"></i>
                                                    <span>'. date('d-m-Y', $p->getDatPhong($p->id)->tgianden)  .'</span>
                                                </div>
                                                <div class="broom-ct-icon broom-ct-icon-status ">
                                                </div>' : '') .'
                                </div>
                                <div class="broom-ct-button">
                                    <div class="box-ft">
                                        '.( ($p->isU == 1) 
                                            ? '<a href="../" class="bt-full bt-tp" title="Trả phòng">Trả phòng</a>'
                                            : '<a class="bt-full bt-tp" title="Trả phòng">Đặt phòng</a>') .'
                                        
                                    </div>
                                </div>
                            </div>
                        </div>';
            }
        }
        echo $txt;
    }

    public function getViewMorePhong($id, $st){
        $phong = Phong::where(['remove'=> 0, 'id' => $id])->get()[0];
        $txt = '<div class="Alert-Root">
                    <div class="Alert-Wrapper ">
                    <div>
                        <h2>Phòng: <i><strong>'. $phong->name .'</strong></i></h2>
                    </div>
                    <div class="Alert-Content">';
                        
        if($phong->st == 0 && $phong->isU == 0){
            $txt .= '<div class="col-md-4 col-sm-4 col-xs-6">
                        <a href="../phong/dat-phong/'. $id .'/dat-phong-moi.html" class="btn waves-effect waves-light btn-menu"  title="Đặt phòng">
                            <i class="sdp-icon-menu icon-add-song fa fa-plus"></i>Đặt phòng
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <a href="../cate/dat-phong/danh-sach.html" class="btn waves-effect waves-light btn-menu"  title="Đặt phòng">
                            <i class="sdp-icon-menu icon-add-song fa fa-list-alt"></i>Danh Sách Đặt Phòng
                        </a>
                    </div>';
        }else if($phong->isU == 1){
            $txt .= '<div class="col-md-4 col-sm-4 col-xs-6">
                        <a href="../cate/dat-phong/chi-tiet/'.$phong->getDatPhong($phong->id)->id.'/dat-phong.html" class="btn waves-effect waves-light btn-menu"  title="Đặt phòng">
                            <i class="sdp-icon-menu icon-add-song fa fa-eye"></i>Chi Tiết
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <a href="../cate/dat-phong/chi-tiet/'.$phong->getDatPhong($phong->id)->id.'/dat-phong.html" class="btn waves-effect waves-light btn-menu"  title="Đặt phòng">
                            <i class="sdp-icon-menu icon-add-song fa fa-sign-out"></i>Trả Phòng
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <a class="btn waves-effect waves-light btn-menu"  title="Đặt phòng">
                            <i class="sdp-icon-menu icon-add-song fa fa-refresh"></i>Đổi Phòng
                        </a>
                    </div>';
        }   

        if($phong->st == 2){
            $txt .= '<div class="col-md-4 col-sm-4 col-xs-6">
                        <a class="btn waves-effect waves-light btn-menu editStPhong" data="0" id="'.$id.'" st="'.$st.'"  >
                            <i class="sdp-icon-menu icon-add-song fa fa-external-link"></i>Đã Dọn Phòng
                        </a>
                    </div>';
        }else{
            $txt .= '<div class="col-md-4 col-sm-4 col-xs-6">
                        <a  class="btn waves-effect waves-light btn-menu editStPhong" data="2" id="'.$id.'" st="'.$st.'">
                            <i class="sdp-icon-menu icon-add-song fa fa-external-link"></i>Báo Phòng Bẩn
                        </a>
                    </div>';
        }

        if($phong->st == 3){
            $txt .= '<div class="col-md-4 col-sm-4 col-xs-6">
                        <a  class="btn waves-effect waves-light btn-menu editStPhong" data="0" id="'.$id.'" st="'.$st.'">
                            <i class="sdp-icon-menu icon-add-song fa fa-flash"></i>Phòng Đã Sửa
                        </a>
                    </div>';
        }else{
            $txt .= '<div class="col-md-4 col-sm-4 col-xs-6">
                        <a  class="btn waves-effect waves-light btn-menu editStPhong" data="3" id="'.$id.'" st="'.$st.'">
                            <i class="sdp-icon-menu icon-add-song fa fa-flash"></i>Báo Phòng Hỏng
                        </a>
                    </div>';
        }

        $txt .= '
                    </div>
                    </div>
                </div>';
        
        echo $txt;
    }

    public function postEditStPhong($id, $data){

        $phong = Phong::find($id);
        $phong->st = $data;
        $phong->save();

        echo json_encode(['st' => 1]);
    }
}
