<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/update.html', function () {
	return redirect()->back()->with(['modal-danger' => 'Chức Năng Đang Được Cập Nhật!']);
});

Route::get('/dang-nhap.html', 'UserController@getLogin');
Route::post('/dang-nhap.html', 'UserController@postLogin');
Route::get('/dang-xuat.html', 'UserController@getDangXuat');

Route::group(['prefix' => '/', 'middleware' => 'userMiddleware' ],function(){

	Route::group(['prefix' => 'dashboard'],function(){

    Route::get('/', 'DashboardController@index');

	});

	Route::group(['prefix' => 'phong'],function(){

		Route::get('/so-do-phong.html', 'PhongController@getSoDoPhong');
		Route::get('/dat-phong/{id}/dat-phong-moi.html', 'DatPhongController@getNewDatPhongById');
		
	});

	Route::group(['prefix' => 'thong-ke'],function(){

		Route::get('/thong-ke-dat-phong.html', 'ThongKeController@getThongKeDatPhong');
		Route::get('/thong-ke-doanh-thu.html', 'ThongKeController@getThongKeDoanhThu');
		
	});

	

	Route::group(['prefix' => 'user'],function(){

		Route::get('/profile/{url}.html', 'UserController@getProfile');
		Route::post('/profile/{url}.html', 'UserController@postProfile');

	});

	Route::group(['prefix' => 'setting'],function(){

		Route::get('/info/thong-tin-khach-san.html', 'SettingController@getInfo');
		Route::post('/info/thong-tin-khach-san.html', 'SettingController@postInfo');

		Route::group(['prefix' => 'hang-phong'],function(){
			Route::get('/view/hang-phong.html', 'SettingController@getHangPhong');

			Route::get('/add/hang-phong.html', 'SettingController@getAddHangPhong');
			Route::post('/add/hang-phong.html', 'SettingController@postAddHangPhong');
	
			Route::get('/edit/{id}/hang-phong.html', 'SettingController@getEditHangPhong');
			Route::post('/edit/{id}/hang-phong.html', 'SettingController@postEditHangPhong');
	
			Route::get('/del/{id}/hang-phong.html', 'SettingController@getDelHangPhong');
		});

		Route::group(['prefix' => 'lau'],function(){
			Route::get('/view/tang-lau.html', 'SettingController@getViewLau');

			Route::get('/add/tang-lau.html', 'SettingController@getAddLau');
			Route::post('/add/tang-lau.html', 'SettingController@postAddLau');

			Route::get('/edit/{id}/tang-lau.html', 'SettingController@getEditLau');
			Route::post('/edit/{id}/tang-lau.html', 'SettingController@postEditLau');

			Route::get('/del/{id}/tang-lau.html', 'SettingController@getDelLau');
		});

		Route::group(['prefix' => 'quyen'],function(){

			Route::get('/view/danh-sach.html', 'QuyenController@getView');

			Route::get('/them-quyen-moi.html', 'QuyenController@getAddQuyen');
			Route::post('/them-quyen-moi.html', 'QuyenController@postAddQuyen');

			Route::get('/edit/{id}/sua-quyen.html', 'QuyenController@getEditQuyen');
			Route::post('/edit/{id}/sua-quyen.html', 'QuyenController@postEditQuyen');

			Route::get('/del/{id}/quyen.html', 'QuyenController@getDelQuyen');
			
		});

	});

	

	Route::group(['prefix' => 'cate'],function(){

		Route::group(['prefix' => 'employees'],function(){

			Route::get('/view/danh-sach-nhan-vien.html', 'EmployeesController@getViewNhanVien');
	
			Route::get('/add/nhan-vien.html', 'EmployeesController@getAddNhanVien');
			Route::post('/add/nhan-vien.html', 'EmployeesController@postAddNhanVien');
	
			Route::get('/edit/{id}/{url}.html', 'EmployeesController@getEditNhanVien');
			Route::post('/edit/{id}/{url}.html', 'EmployeesController@postEditNhanVien');
	
			Route::get('/del/{id}/{url}.html', 'EmployeesController@getDelNhanVien');
	
			Route::get('/getInfo/{id}', 'EmployeesController@getInfo');

			Route::get('/phan-quyen/{id}/minh-thien.html', 'EmployeesController@getPhanQuyen');
			Route::post('/phan-quyen/{id}/minh-thien.html', 'EmployeesController@postPhanQuyen');
			
		});

		Route::group(['prefix' => 'customer'],function(){

			Route::get('/view/danh-sach-khach-hang.html', 'CustomerController@getViewCustomer');
			
			Route::get('/add/khach-hang.html', 'CustomerController@getAddCustomer');
			Route::post('/add/khach-hang.html', 'CustomerController@postAddCustomer');

			Route::get('/edit/{id}/{url}.html', 'CustomerController@getEditCustomer');
			Route::post('/edit/{id}/{url}.html', 'CustomerController@postEditCustomer');

			Route::get('/del/{id}/{url}.html', 'CustomerController@getDelCustomer');
			
		});

		Route::group(['prefix' => 'phong'],function(){

			Route::get('/view/danh-sach-phong.html', 'PhongController@getViewPhong');

			Route::get('/add/them-phong.html', 'PhongController@getAddPhong');
			Route::post('/add/them-phong.html', 'PhongController@postAddPhong');

			Route::get('/edit/{id}/{url}.html', 'PhongController@getEditPhong');
			Route::post('/edit/{id}/{url}.html', 'PhongController@postEditPhong');
			
		});

		Route::group(['prefix' => 'dat-phong'],function(){

			Route::get('/danh-sach.html', 'DatPhongController@getViewDatPhong');
			Route::get('/chi-tiet/{id}/dat-phong.html', 'DatPhongController@getViewDetailDatPhong');
			Route::get('/dat-phong-moi.html', 'DatPhongController@getNewDatPhong');
			Route::post('/dat-phong-moi.html', 'DatPhongController@postNewDatPhong');

			Route::get('/in/{id}/in-hoa-don.html', 'DatPhongController@getInHoaDon');
			Route::get('/thanh-toan/{id}', 'DatPhongController@getThanhToan');
			

			
		});
		
	});

});

Route::group(['prefix' => 'ajax'],function(){

	Route::get('/getInfo/{id}', 'EmployeesController@getInfo');
	Route::get('/getCustomer/{id}', 'CustomerController@getCustomer');
	Route::get('/getGiaPhong/{id}', 'PhongController@getGiaPhong');
	Route::get('/getViewPhong/{id}', 'PhongController@getViewSdPhong');
	Route::get('/getViewMorePhong/{id}/{st}', 'PhongController@getViewMorePhong');
	Route::get('/postEditStPhong/{id}/{data}', 'PhongController@postEditStPhong');
	Route::get('/getPhongDP/{id}/{idp}', 'DatPhongController@getPhongDP');
	Route::get('/getInfoPhongDP/{id}', 'DatPhongController@getInfoPhongDP');
	Route::get('/postThongKe', 'ThongKeController@postThongKe');
	Route::get('/postThongKeDoanhThu', 'ThongKeController@postThongKeDoanhThu');

	

});