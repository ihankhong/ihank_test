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


Route::get('shipping', 'ShippingController@index');

Route::get('avatar', 'UploadAvatarController@index')->name('avatar.index');

Route::post('avatar', 'UploadAvatarController@store')->name('avatar.store');

