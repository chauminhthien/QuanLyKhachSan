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

Route::get('/dang-nhap.html', 'UserController@getLogin');
Route::post('/dang-nhap.html', 'UserController@postLogin');

Route::group(['prefix' => '/', 'middleware' => 'userMiddleware' ],function(){
	Route::get('/dang-xuat.html', 'UserController@getDangXuat');

	Route::group(['prefix' => 'dashboard'],function(){

        Route::get('/', 'DashboardController@index');

		// Route::get('danh-sach-quyen', 'PrivilegeController@getDSQuyen');

		// Route::get('them-quyen-moi', 'PrivilegeController@getThemQuyen');
		// Route::post('them-quyen-moi', 'PrivilegeController@postThemQuyen');

		// Route::get('sua-quyen/{id}', 'PrivilegeController@getSuaQuyen');
		// Route::post('sua-quyen/{id}', 'PrivilegeController@postSuaQuyen');

		// Route::get('xoa-quyen/{id}', 'PrivilegeController@getXoaQuyen');


	});

	Route::group(['prefix' => 'user'],function(){

		Route::get('/profile/{url}.html', 'UserController@getProfile');
		Route::post('/profile/{url}.html', 'UserController@postProfile');

	});


});