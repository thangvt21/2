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

Auth::routes();
Route::prefix('/phongban')->middleware('auth')->group(function (){
    Route::get('/','PhongbanController@index')->name('phongban.index');
    Route::get('/show/{id}','PhongbanController@show')->name('phongban.show');
    Route::get('/create','PhongbanController@create')->name('phongban.create');
    Route::post('/store','PhongbanController@store')->name('phongban.store');
    Route::get('/edit/{id}','PhongbanController@edit')->name('phongban.edit');
    Route::post('/update/{id}','PhongbanController@update')->name('phongban.update');
    Route::post('/destroy','PhongbanController@destroy')->name('phongban.destroy');
});
