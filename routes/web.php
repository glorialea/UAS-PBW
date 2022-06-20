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

Route::get('/home', function () {
    return view('home');
});

Route::get('/dosen', function () {
    return view('dosen');
});

Route::get('/mahasiswa', function () {
    return view('mahasiswa');
});

Route::get('/skripsi', function () {
    return view('skripsi');
});

Route::group(['middleware' => ['auth']], function(){

    Route::get('/mahasiswa', 'MahasiswaController@mahasiswa');

    Route::get('/mahasiswa/cari', 'MahasiswaController@cari');
    
    Route::get('/mahasiswa/formulirmahasiswa', 'MahasiswaController@formulirmahasiswa'); 
    
    Route::post('/mahasiswa/simpanmahasiswa', 'MahasiswaController@simpanmahasiswa');
    
    Route::get('/mahasiswa/editmhs/{id}', 'MahasiswaController@editmhs');
    
    Route::put('/mahasiswa/updatemhs/{id}', 'MahasiswaController@updatemhs');
    
    Route::get('/mahasiswa/deletemhs/{id}', 'MahasiswaController@deletemhs');
    
    Route::get('/dosen', 'DosenController@dosen');

    Route::get('/dosen/cari', 'DosenController@cari');
    
    Route::get('/dosen/formulirdosen', 'DosenController@formulirdosen'); 
    
    Route::post('/dosen/simpandosen', 'DosenController@simpandosen');
    
    Route::get('/dosen/editdosen/{id}', 'DosenController@editdosen');
    
    Route::put('/dosen/updatedosen/{id}', 'DosenController@updatedosen');
    
    Route::get('/dosen/deletedosen/{id}', 'DosenController@deletedosen');
    
    Route::get('/user', 'AuthController@user');
    
    Route::get('/user/formuliruser', 'AuthController@formuliruser');
    
    Route::post('/user/simpanuser', 'AuthController@simpanuser');
    
    Route::get('/user/edituser/{id}', 'AuthController@edituser');
    
    Route::put('/user/updateuser/{id}', 'AuthController@updateuser');
    
    Route::get('/user/deleteuser/{id}', 'AuthController@deleteuser');
    
});

Route::get('/login', 'AuthController@login');

Route::post('/user/ceklogin', 'AuthController@ceklogin');

Route::get('/logout', 'AuthController@logout');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
