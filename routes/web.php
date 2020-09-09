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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middlewares' => ['auth']], function() {
    Route::resource('phongbans','PhongbanController');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('nhanviens','NhanvienController');
    Route::resource('stuffs','StuffController');
    Route::get('/nhanviens/show/{id}','NhanvienController@show')->name('Nhanvien.show');
    Route::get('/stuffs/show/{id}','StuffController@show')->name('Stuff.show');
});
