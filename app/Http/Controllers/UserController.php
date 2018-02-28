<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //

    public function getLogin(){
       return view('login.index');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email'                 => 'required|email|max:50',
            'password'              => 'required|min:3|max:50',
        ], [
            'email.required'        => 'Email không được để trống',
            'email.email'           => 'Email Không đúng định dạng',
            'email.max'             => 'Name quá ngắn',
            'password.min'          => 'Mật khẩu quá ngắn',
            'password.max'          => 'Mật khẩu quá dài',
            'password.required'     => 'Mật khẩu không được để trống',
        ]);
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password])){
            return redirect('dashboard');
        }else{
            return redirect('dang-nhap.html')->with('loi','Thông Tin Đăng Nhập Không Đúng');
        }
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect('dang-nhap.html');
    }

    public function getProfile(){
        return view('user.profile');
    }

    public function postProfile(Request $request){
        $id = Auth::User()->id;
        $user = User::find($id);
    	$this->validate($request,[
    			'name' 		=> 'required|min:3|max:32',
    			'password' 	=> 'min:3|max:32'
    		],[
    			'name.required' 		=> 'Chưa Nhập Tên User',
    			'name.min' 				=> 'Tên User quá ngắn',
    			'name.max' 				=> 'Tên User quá dài',
    			'email.required' 		=> 'Chưa Nhập email User',
    			'email.email' 			=> 'Email không đúng định dạng',
    			'email.unique' 			=> 'Email Đã Tồn Tại',
    			'password.min' 			=> 'PassWord quá ngắn',
    			'password.max' 			=> 'PassWord quá dài',
    			
    		]);
    	$user->name = $request->name;

    	if($request->has('password')){
    		$user->password = bcrypt($request->password);
    	}else{
    		$user->password = $user->password;
    	}
    	$user->save();

    	return redirect('user/profile/chau-minh-thien.html')->with('thongbao','Cập Nhật Thành Công');
    }
}
