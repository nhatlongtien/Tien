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
    return view('welcome');
});

route::get('admin/dangnhap','UserController@getDangnhapAdmin');
route::post('admin/dangnhap','UserController@getpostDangnhapAdmin');

route::get('admin/logout','UserController@getDangxuatAdmin');
route::get('admin/dashboard','dashboardController@getDashboard');
route::group(['prefix'=>'admin','middleware'=>'AdminMiddleware'],function(){
	


	route::group(['prefix'=>'theloai'],function(){
		route::get('danhsach','TheloaiController@getDanhsach');

		route::get('sua/{id}','TheloaiController@getSua');
		route::post('sua/{id}','TheloaiController@getpostSua');

		route::get('them','TheloaiController@getThem');
		route::post('them','TheloaiController@getpostThem');

		route::get('xoa/{id}','TheloaiController@getXoa');
	});
	route::group(['prefix'=>'tintuc'],function(){
		route::get('danhsach','TintucController@getDanhsach');

		route::get('sua/{id}','TintucController@getSua');
		route::post('sua/{id}','TintucController@getpostSua');

		route::get('them','TintucController@getThem');
		route::post('them','TintucController@getpostThem');

		route::get('xoa/{id}','TintucController@getXoa');


		
	});
	route::group(['prefix'=>'loaitin'],function(){
		route::get('danhsach','LoaitinController@getDanhsach');

		route::get('sua/{id}','LoaitinController@getSua');
		route::post('sua/{id}','LoaitinController@getpostSua');

		route::get('them','LoaitinController@getThem');
		route::post('them','LoaitinController@getpostThem');

		route::get('xoa/{id}','LoaitinController@getXoa');
	});
	route::group(['prefix'=>'user'],function(){
		route::get('danhsach','UserController@getDanhsach');
		route::get('sua/{id}','UserController@getSua');
		route::post('sua/{id}','UserController@getpostSua');
		route::get('them','UserController@getThem');
		route::post('them','UserController@getpostThem');
		route::get('xoa/{id}','UserController@getXoa');
	});
	route::group(['prefix'=>'slide'],function(){
		route::get('danhsach','SlideController@getDanhsach');
		route::get('sua/{id}','SlideController@getSua');
		route::post('sua/{id}','SlideController@getpostSua');
		route::get('them','SlideController@getThem');
		route::post('them','SlideController@getpostThem');
		route::get('xoa/{id}','SlideController@getXoa');
	});
	route::group(['prefix'=>'ajax'],function(){
		route::get('loaitin/{idTheLoai}','AjaxController@getLoaitin');
	});

	route::get('comment/{id}/{idTinTuc}','CommentController@getComment');
});


route::get('trangchu','PagesController@TrangChu');
route::get('lienhe','PagesController@LienHe');
route::get('gioithieu','PagesController@GioiThieu');
route::get('loaitin/{id}/{TenKhongDau}.html','PagesController@LoaiTin');
route::get('tintuc/{id}/{TieuDeKhongDau}.html','PagesController@TinTuc');

route::get('dangky','UserController@getDangKy');
route::post('dangky','UserController@getpostDangKy');

route::get('dangnhap','UserController@getDangNhap');
route::post('dangnhap','UserController@getpostDangNhap');

route::get('dangxuat','UserController@getDangXuat');

route::get('timkiem','PagesController@getTimKiem');

route::post('comment/{id}','CommentController@getpostComment');