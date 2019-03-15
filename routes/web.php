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


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
