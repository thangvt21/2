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
Route::group(['middlewares' => ['auth']], function() {
    Route::resource('stuffs', 'StuffController');
    Route::get('/stuffs/show/{id}', 'StuffController@show')->name('Stuff.show');
});
