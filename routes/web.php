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


Route::get('login',function(){
    return view('admin.login');
});


Route::group(['prefix'=>'admin'],function(){

    
    Route::get('login','LoginController@create');
    Route::post('login','LoginController@store');
    Route::get('logout','LoginController@logout');






    Route::group(['prefix'=>'hoadon'],function(){

        Route::middleware(['login'])->group(function () {

            Route::get('danhsach','ChiTietHoaDonController@listInvoice');
            Route::get('edit/{ma}','ChiTietHoaDonController@edit');
            Route::get('danhsachthanhtoan','ChiTietHoaDonController@listInvoiced');
       
        });
    });       

    Route::group(['prefix'=>'chucvu'],function(){

        Route::middleware(['login'])->group(function () {

            Route::get('them','ChucVuController@create');
            Route::post('them','ChucVuController@store');
            Route::get('xoa/{ma}','ChucVuController@destroy');
            Route::get('sua/{ma}','ChucVuController@edit');
            Route::post('sua/{ma}','ChucVuController@update');
            Route::get('danhsach','ChucVuController@index');

        });
    });




    Route::group(['prefix'=>'theloai'],function(){

        Route::middleware(['login'])->group(function () {
            
            Route::get('them','TheLoaiController@create');
            Route::post('them','TheLoaiController@store');
            Route::get('danhsach','TheLoaiController@index');
            Route::get('xoa/{ma}','TheLoaiController@destroy');
            Route::get('sua/{ma}','TheLoaiController@edit');
            Route::post('sua/{ma}','TheLoaiController@update');
        });
    });

    ///cap nhat san pham
    Route::group(['prefix'=>'sanpham'],function(){

        Route::middleware(['login'])->group(function () {
            Route::get('them','SanPhamController@create');
            Route::post('them','SanPhamController@store');
            Route::get('xoa/{ma}','SanPhamController@destroy');
            Route::get('sua/{ma}','SanPhamController@edit');
            Route::post('sua/{ma}','SanPhamController@update');
            Route::get('danhsach','SanPhamController@index');
        });

    }); 

    
    Route::group(['prefix'=>'nhanvien'],function(){
        Route::middleware(['login'])->group(function () {
            Route::get('them','NhanVienController@create');
            Route::post('them','NhanVienController@store');
            Route::get('xoa/{ma}','NhanVienController@destroy');
            Route::get('sua/{ma}','NhanVienController@edit');
            Route::post('sua/{ma}','NhanVienController@update');
            Route::get('danhsach','NhanVienController@index');
        });
    });

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

    Route::get('yeuthich/{ma}','YeuThichController@show');
    Route::get('themyeuthich/{ma}/{masp}','YeuThichController@store');
    Route::get('xoayeuthich/{ma}/{masp}','YeuThichController@destroy');


    Route::post('timkiem','SanPhamController@search');
    Route::get('timkiemloai/{ten}/{maloai}','SanPhamController@searchType');
    Route::get('timkiemgia/{ten}/{gia}','SanPhamController@searchPrice');
    Route::get('timkiemkhuyenmai/{ten}','SanPhamController@searchDiscount');
    Route::get('timkiemsanphammoi/{ten}','SanPhamController@searchNewProduct');
    Route::get('timkiemcaodenthap/{ten}','SanPhamController@searchPriceHightToLow');
    Route::get('timkiemthapdencao/{ten}','SanPhamController@searchPriceLowToHight');


    Route::post('binhluan/{makh}/{masanpham}','BinhLuanController@addComment');

});

Route::get('sentmail','MailController@basic_email');