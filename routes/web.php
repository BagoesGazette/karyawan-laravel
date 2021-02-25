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

Route::get('/', 'AuthController@index')->name("login");
Route::post('/postLogin', 'AuthController@postLogin')->name('postLogin');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth','CekLevel:super-admin,staf,karyawan']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name("dashboard");
});
Route::group(['middleware' => ['auth','CekLevel:super-admin,staf']], function () {
    
    Route::get('/dataKaryawan','KaryawanController@index')->name('karyawan');
    Route::get('karyawan/create','KaryawanController@create')->name('karyawanCreate');
    Route::post('karyawan/store','KaryawanController@store')->name('karyawanStore');
    Route::get('karyawan/edit/{id}','KaryawanController@edit');
    Route::post('karyawan/update','KaryawanController@update')->name('karyawanUpdate');
    Route::get('karyawan/destroy/{name}','KaryawanController@destroy');

    Route::get('approval','ApprovalController@index')->name('approval');
    Route::get('approval/check/{id}','ApprovalController@check')->name('check');
    Route::get('pengajuan','PengaduanController@pengajuanAll')->name('pengajuanAll');
});

Route::group(['middleware' => ['auth','CekLevel:karyawan']], function () {
    Route::get('pengaduan','PengaduanController@index')->name('pengaduan');
    Route::get('pengaduan/create','PengaduanController@create')->name('pengaduanCreate');
    Route::post('pengaduan/store','PengaduanController@store')->name('pengaduanStore');

});