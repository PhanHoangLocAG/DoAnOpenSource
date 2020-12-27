<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['prefix'=>'admin'],function(){

    
    Route::get('login','LoginController@create');
    Route::post('login','LoginController@store');
    Route::get('logout','LoginController@logout');
});


Route::group(['prefix'=>'frontend'],function(){
    
    Route::get('dangnhap','KhachHangController@formdangnhap');
    Route::post('dangnhap','KhachHangController@dangnhap');
    Route::get('dangky','KhachHangController@create');
    Route::post('dangky','KhachHangController@store');
    Route::get('edit/{ma}','KhachHangController@edit');
    Route::get('dangxuat','KhachHangController@dangxuat');
    Route::post('sua/{ma}','KhachHangController@update');
    Route::post('update/{ma}','KhachHangController@updatePass');
    Route::get('trangchu','SanPhamController@ShowProduct');
    Route::get('detailProduct/{ma}','SanPhamController@show');
    
    Route::get('giohang','GioHangController@index');
    Route::get('add/{ma}','GioHangController@Addcart');
    Route::get('add/{ma}/{mkh}','GioHangController@AddcartFromWish');
    Route::get('deleteCart/{ma}','GioHangController@Deletecart');
    Route::get('editCart','GioHangController@UpdateCart');

    Route::get('dathang/{ma}' , 'ChiTietHoaDonController@index');
    Route::post('muahang/{ma}' , 'ChiTietHoaDonController@store');
    Route::get('donhang/{ma}' , 'ChiTietHoaDonController@show');
    Route::get('huydon/{ma}' , 'ChiTietHoaDonController@destroy');

});

Route::get('sentmail','MailController@basic_email');