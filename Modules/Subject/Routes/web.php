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

Route::prefix('subject')->group(function() {
    Route::get('/', 'SubjectController@index');
});
Route::prefix('/nhanvien')->middleware('auth')->group(function (){
    Route::get('/','NhanvienController@index')->name('nhanvien.index');
    Route::get('/show/{id}','NhanvienController@show')->name('nhanvien.show');
    Route::get('/create','NhanvienController@create')->name('nhanvien.create');
    Route::post('/store','NhanvienController@store')->name('nhanvien.store');
    Route::get('/edit/{id}','NhanvienController@edit')->name('nhanvien.edit');
    Route::post('/update/{id}','NhanvienController@update')->name('nhanvien.update');
    Route::post('/destroy','NhanvienController@destroy')->name('nhanvien.destroy');
});

Route::prefix('/phongban')->middleware('auth')->group(function (){
    Route::get('/','PhongbanController@index')->name('phongban.index');
    Route::get('/show/{id}','PhongbanController@show')->name('phongban.show');
    Route::get('/create','PhongbanController@create')->name('phongban.create');
    Route::post('/store','PhongbanController@store')->name('phongban.store');
    Route::get('/edit/{id}','PhongbanController@edit')->name('phongban.edit');
    Route::post('/update/{id}','PhongbanController@update')->name('phongban.update');
    Route::post('/destroy','PhongbanController@destroy')->name('phongban.destroy');
});
