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
    return view('Auth1.login');
});

Route::post('/cek', 'AtributController@cek')->name('cek');

Route::get('/home', 'AtributController@index')->name('home');

Route::get('/home/atribut/create', 'AtributController@atribut_create')->name('harga_barang_create');
Route::post('/home/atribut/create', 'AtributController@atribut_store')->name('harga_barang_create_post');


Route::post('/home/asd', 'AtributController@index2');

Route::get('/home/beranda/{id}', 'AtributController@show')->name('show');

Route::get('/home/beranda/{id}/harga_barang/create', 'AtributController@harga_barang_create')->name('harga_barang_create');
Route::post('/home/beranda/{id}/harga_barang/create', 'AtributController@harga_barang_store')->name('harga_barang_create_post');

Route::get('/home/beranda/{id}/sewa_alat/create', 'AtributController@sewa_alat_create')->name('sewa_alat_create');
Route::post('/home/beranda/{id}/sewa_alat/create', 'AtributController@sewa_alat_store')->name('sewa_alat_create_post');

Route::get('/home/beranda/{id}/jasa_konstruksi/create', 'AtributController@jasa_konstruksi_create')->name('jasa_konstruksi_create');
Route::post('/home/beranda/{id}/jasa_konstruksi/create', 'AtributController@jasa_konstruksi_store')->name('jasa_konstruksi_create_post');

//update
Route::post('/home/atribut/{id}/update', 'AtributController@atribut_update')->name('atribut_update');
Route::post('/home/beranda/{id}/harga_barang/update', 'AtributController@harga_barang_update')->name('harga_barang_update');
Route::post('/home/beranda/{id}/sewa_alat/update', 'AtributController@sewa_alat_update')->name('sewa_alat_update');
Route::post('/home/beranda/{id}/jasa_konstruksi/update', 'AtributController@jasa_konstruksi_update')->name('jasa_konstruksi_update');


//delete atribut
Route::delete('/home/atribut/{id}/delete', 'AtributController@atribut_destroy')->name('atribut_destroy');

//delete HargaBarang
Route::delete('/home/beranda/{id}/harga_barang/delete', 'AtributController@harga_barang_destroy')->name('harga_barang_destroy');

//delete Sewa Alat
Route::delete('/home/beranda/{id}/sewa_alat/delete', 'AtributController@sewa_alat_destroy')->name('sewa_alat_destroy');



//tes
Route::get('/home/{id}', 'AtributController@masadit')->name('masadit');
//delete Jasa Konstruksi
Route::delete('/home/beranda/{id}/jasa_konstruksi/delete', 'AtributController@jasa_konstruksi_destroy')->name('sewa_alat_destroy');

Auth::routes();
// Route::view('/{path?}', 'app');
// Route::get('/home', 'HomeController@index')->name('home');

