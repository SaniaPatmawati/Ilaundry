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

//Route pages
Route::get('/', 'PagesController@index');

// Route::get('/', function() {
// 	return view ('register');
// });

//Route cucian
Route::get('/cucian', 'CucianController@index');
Route::get('/cucian/create', 'CucianController@create');
Route::post('/cucian', 'CucianController@store');
Route::get('/cucian/{id}/edit', 'CucianController@edit');
Route::get('/cucian/{id}', 'CucianController@show');

//Route lokasi
Route::get('/loc', 'LokasiController@getLokasi');

//Route harga
Route::get('/harga', 'RefHargaController@getHarga');
Route::get('/order', 'PagesController@order');
Route::get('/pelanggan', 'PagesController@pelanggan');
Route::get('/lokasi', 'PagesController@lokasi');
Route::get('/user', 'PagesController@user');

// route order
Route::get('/Order/create', 'OrderController@create');
Route::post('order', 'OrderController@simpan');
Route::get('/detailorder/{id}', 'OrderController@detail');
Route::get('/editorder/{id}', 'OrderController@edit');
Route::get('/hapusorder/{id}', 'OrderController@hapus');
Route::post('/editorder', 'OrderController@editorder');

// route pelangan
Route::get('/pelanggan/create', 'PelangganController@create');
Route::post('pelanggan', 'PelangganController@simpan');
Route::get('/detailpelanggan/{id}', 'PelangganController@detail');
Route::get('/editpelanggan/{id}', 'PelangganController@edit');
Route::get('/hapuspelanggan/{id}', 'PelangganController@hapus');
Route::post('/editpelanggan', 'PelangganController@editpelanggan');


//route users
Route::get('/users/create', 'UsersController@create');
Route::post('users', 'UsersController@simpan');
Route::get('/detailuser/{id}', 'UsersController@detail');
Route::get('/edituser/{id}', 'UsersController@edit');
Route::get('/hapususer/{id}', 'UsersController@hapus');
Route::post('/edituser', 'UsersController@editusers');


//route lokasi
Route::get('/lokasi/create', 'LokasiController@create');
Route::post('lokasi', 'LokasiController@simpan');
Route::get('/detaillokasi/{id}', 'LokasiController@detail');
Route::get('/editlokasi/{id}', 'LokasiController@edit');
Route::get('/hapuslokasi/{id}', 'LokasiController@hapus');
Route::post('/editlokasi', 'LokasiController@editlokasi');


// login
Route::get('/home', 'PagesController@index');

Route::get('login2', function() {
	return view ('login2');
});
Route::get('register', function() {
	return view ('welcome');
});

Route::get('/register', 'AuthController@getRegister');
Route::get('/register', 'AuthController@postRegister');
Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');
