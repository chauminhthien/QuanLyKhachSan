<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //

    public function getViewCustomer(){
        $customer = Customer::where('remove', 0)->get();
        return view('cate.customer.view', ['customer' => $customer ]);
    }

    public function getCustomer($id){
        $customer = Customer::find($id);
        echo '<div class="LockBody" ><div class="modal">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Thông Tin Khách Hàng</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên Nhân Viên</label>
                                <input type="text" disabled value="'.$customer->name.'" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="email">Ngày Sinh</label>
                                <input type="email" disabled name="email" value="'.$customer->ngaysinh.'"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="email">Số Điện Thoại</label>
                                <input type="email" disabled name="email" value="'.$customer->phone.'"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Địa Chỉ</label>
                                <input type="email" disabled name="email" value="'.$customer->diachi.'"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Giới Tính</label>
                                <input type="email" disabled name="email" value="'.( ($customer->gioitinh == 1) ? 'Nam' : 'Nữ' ).'" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="email">Địa Chỉ Email</label>
                                <input type="email" disabled name="email" value="'.$customer->email.'" class="form-control" >
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

    public function getAddCustomer(){
        return view ('cate.customer.add');
    }

    public function postAddCustomer(Request $request){
        $this->validate($request,[
            'name'                  => 'required|min:3',
            'email'                 => 'required|email|unique:customer',
            'cmnd'                  => 'required|min:3',
        ], [
            'name.required'         => 'Name không được để trống',
            'name.min'              => 'Name quá ngắn',
            'email.required'        => 'Email không được để trống',
            'email.email'           => 'Email không đúng',
            'email.unique'          => 'Email đã tồn tại',
            'cmnd.required'         => 'CMND không được để trống',
            'cmnd.min'              => 'CMND quá ngắn',
        ]);

        $customer = new Customer();

        $customer->name         = $request->name;
        $customer->nameKhongDau = changeTitle($request->name);
        $customer->ngaysinh     = $request->ngaysinh;
        $customer->phone        = $request->phone;
        $customer->email        = $request->email;
        $customer->diachi       = $request->diachi;
        $customer->gioitinh     = $request->gioitinh;
        $customer->cmnd         = $request->cmnd;

        $customer->save();

        return redirect()->back()->with(['thongbao' => 'Thêm mới thành công']);
    }

    public function getEditCustomer($id){
        $customer = Customer::find($id);
        return view ('cate.customer.edit', ['customer' => $customer]);
    }

    public function postEditCustomer(Request $request, $id){
        $this->validate($request,[
            'name'                  => 'required|min:3',
            'cmnd'                  => 'required|min:3',
        ], [
            'name.required'         => 'Name không được để trống',
            'name.min'              => 'Name quá ngắn',
            'cmnd.required'         => 'CMND không được để trống',
            'cmnd.min'              => 'CMND quá ngắn',
        ]);

        $customer = Customer::find($id);

        $customer->name         = $request->name;
        $customer->nameKhongDau = changeTitle($request->name);
        $customer->ngaysinh     = $request->ngaysinh;
        $customer->phone        = $request->phone;
        $customer->diachi       = $request->diachi;
        $customer->gioitinh     = $request->gioitinh;
        $customer->cmnd         = $request->cmnd;

        $customer->save();

        return redirect()->back()->with(['thongbao' => 'Cập nhật thành công']);
    }

    public function getDelCustomer($id){
        $customer = Customer::find($id);
        $customer->remove = 1;

        $customer->save();

        return redirect()->back()->with(['thongbao' => 'Đã xoá thành công']);
    }
}
