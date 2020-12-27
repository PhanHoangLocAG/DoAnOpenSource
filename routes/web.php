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
    
});

Route::get('sentmail','MailController@basic_email');