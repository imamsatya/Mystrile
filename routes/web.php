<?php
use Illuminate\Http\Request;
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

// Auth::routes();
// Route::get('/ceka', function () {
//     return view('a');
// });


// Route::get('/ucx', function () {

//     return view('uc');
//     // return view('Auth1.login');
// });

// Route::post('/', function () {
    
//     return redirect()->route('home');
// })->name('login.custom');

Route::get('/home/{id}', 'AtributController@share')->name('masadit');

Route::group(['middleware' => ['guest']], function () {
    //
    // Route::get('/', function () {

    //     return view('uc');
    //     // return view('Auth1.login');
    // });
    Route::get('/', 'AuthController@getLogin')->name('login');
Route::post('/', 'AuthController@postLogin')->name('login.post');
});


// Route::get('/', function () {

//     return view('auth.Login_V2.login');
//     // return view('Auth1.login');
// })->name('login1');


    Route::post('/cek', 'AtributController@cek')->name('cek');
           
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/download/pdf', 'AtributController@getDownload');
        Route::get('/about', 'AtributController@about')->name('about');
            Route::get('/home', 'AtributController@index')->name('home');

            Route::get('/home/atribut/create', 'AtributController@atribut_create')->name('harga_barang_create');
            Route::post('/home/atribut/create', 'AtributController@atribut_store')->name('harga_barang_create_post');

            Route::get('/home/atribut/import_atribut', 'AtributController@import_create')->name('atribut_import');
            Route::post('/home/atribut/import_store', 'AtributController@import_store')->name('atribut_import_post');


            Route::post('/home/asd', 'AtributController@index2');

            Route::get('/home/atribut/{id}', 'AtributController@show')->name('show');

            Route::get('/home/atribut/{id}/harga_barang/create', 'AtributController@harga_barang_create')->name('harga_barang_create');
            Route::post('/home/atribut/{id}/harga_barang/create', 'AtributController@harga_barang_store')->name('harga_barang_create_post');

            Route::get('/home/atribut/{id}/sewa_alat/create', 'AtributController@sewa_alat_create')->name('sewa_alat_create');
            Route::post('/home/atribut/{id}/sewa_alat/create', 'AtributController@sewa_alat_store')->name('sewa_alat_create_post');

            Route::get('/home/atribut/{id}/jasa_konstruksi/create', 'AtributController@jasa_konstruksi_create')->name('jasa_konstruksi_create');
            Route::post('/home/atribut/{id}/jasa_konstruksi/create', 'AtributController@jasa_konstruksi_store')->name('jasa_konstruksi_create_post');

            //update
            Route::post('/home/atribut/{id}/update', 'AtributController@atribut_update')->name('atribut_update');
            Route::post('/home/atribut/{id}/harga_barang/update', 'AtributController@harga_barang_update')->name('harga_barang_update');
            Route::post('/home/atribut/{id}/sewa_alat/update', 'AtributController@sewa_alat_update')->name('sewa_alat_update');
            Route::post('/home/atribut/{id}/jasa_konstruksi/update', 'AtributController@jasa_konstruksi_update')->name('jasa_konstruksi_update');


            //delete atribut
            Route::delete('/home/atribut/{id}/delete', 'AtributController@atribut_destroy')->name('atribut_destroy');

            //delete HargaBarang
            Route::delete('/home/atribut/{id}/harga_barang/delete', 'AtributController@harga_barang_destroy')->name('harga_barang_destroy');

            //delete Sewa Alat
            Route::delete('/home/atribut/{id}/sewa_alat/delete', 'AtributController@sewa_alat_destroy')->name('sewa_alat_destroy');



            //tes
            
            //delete Jasa Konstruksi
            Route::delete('/home/atribut/{id}/jasa_konstruksi/delete', 'AtributController@jasa_konstruksi_destroy')->name('sewa_alat_destroy');

            Route::get('/logout', 'AuthController@logout')->name('logout');
        });