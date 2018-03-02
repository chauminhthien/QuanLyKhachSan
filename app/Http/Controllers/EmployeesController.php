<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class EmployeesController extends Controller
{
    //

    public function getViewNhanVien(){
        $user = User::where('remove', 0)->get();
        return view('cate.employees.view',['user' => $user]);
    }

    public function getAddNhanVien(){
        return view('cate.employees.add');
    }

    public function postAddNhanVien(Request $request){
        $this->validate($request,[
            'email'                 => 'required|email|unique:users|max:50',
            'password'              => 'required|min:3|max:50',
        ], [
            'email.required'        => 'Email không được để trống',
            'email.email'           => 'Email Không đúng định dạng',
            'email.max'             => 'Name quá ngắn',
            'email.unique'          => 'Email đã tồn tại',
            'password.min'          => 'Mật khẩu quá ngắn',
            'password.max'          => 'Mật khẩu quá dài',
            'password.required'     => 'Mật khẩu không được để trống',
        ]);

        $user                   = new User();
        $user->name             = $request->name;
        $user->nameKhongDau     = changeTitle($request->name);
        $user->email            = $request->email;
        $user->password         = bcrypt($request->password);
        $user->remember_token   = $request->_token;
        $user->save();

        return redirect()->back()->with(['thongbao' => 'Thêm Thành Công']);
    }

    public function getEditNhanVien($id){
        if(Auth::user()->id == $id)
            return redirect('user/profile/'.Auth::user()->nameKhongDau.'.html');

        $user = User::find($id);
        return view('cate.employees.edit', ['user' => $user]);
    }

    public function postEditNhanVien(Request $request, $id){
        $this->validate($request,[
            'name'                  => 'required|min:3|max:50',
            'password'              => 'max:50',
        ], [
            'name.required'         => 'Email không được để trống',
            'name.min'              => 'Name quá ngắn',
            'name.max'              => 'Name quá dài',
            'password.max'          => 'Mật khẩu quá dài',
        ]);

        $user                   = User::find($id);
        $user->name             = $request->name;
        $user->nameKhongDau     = changeTitle($request->name);
        if($request->has('password')){
    		$user->password = bcrypt($request->password);
    	}else{
    		$user->password = $user->password;
    	}
        $user->save();

        return redirect()->back()->with(['thongbao' => 'Cập Nhật Thành Công']);
    }

    public function getDelNhanVien($id){
        if(Auth::user()->id == $id)
            return redirect()->back()->with(['loi' => 'Bạn Không Thể xoá chính mình']);

        $user = User::find($id);
        $user->remove = 1;
        $user->save();

        return redirect()->back()->with(['thongbao' => 'Đã xoá thành công']);
    }

    public function getInfo($id){
        $user = User::find($id);
        echo '<div class="LockBody" ><div class="modal">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Thông Tin Nhân Viên</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên Nhân Viên</label>
                                <input type="text" disabled value="'.$user->name.'" required class="form-control" id="name" placeholder="Nhập Tên Nhân Viên">
                            </div>
                            <div class="form-group">
                                <label for="email">Địa Chỉ Email</label>
                                <input type="email" disabled name="email" value="'.$user->email.'" required class="form-control" id="email" placeholder="Nhập Địa Chỉ Email">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="closeModal btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div></div>';
    }
}
