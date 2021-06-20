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

//user
Route::get('/','UserPagesController@beranda');
Route::get('/login','UserPagesController@getformlogin')->name('login');
Route::get('/forgotpassword','UserPagesController@resetpassword');
Route::get('/panduanaplikasi','UserPagesController@panduanaplikasi');

Route::middleware(['auth'])->group(function(){
    Route::get('/pembayaran','UserPagesController@getformpembayaran');
    Route::get('/profile','UserSystemController@profile');
    Route::get('/editprofile/{id}','UserSystemController@editprofile');
});


Route::get('/logout','UserSystemController@logout');

Route::post('/login','UserSystemController@loginsystem');

Route::post('/editprofile/{id}','UserSystemController@editprofile');


//admin
Route::get('/admin/login','AdminPagesController@loginform')->name('admin/login');
Route::middleware(['admin'])->group(function(){
    Route::get('/admin/beranda','AdminPagesController@beranda');
    Route::get('/admin/datasiswa','AdminPagesController@dataSiswa');
    Route::get('/admin/riwayat','AdminPagesController@riwayat');
    Route::get('/admin/kelasjurusan','AdminPagesController@kelasjurusan');
    //crud Admin datasiswa
    Route::get('/admin/datasiswa/tambahdata','AdminPagesController@tambahData');
    Route::get('/admin/datasiswa/delete/{id}','AdminDataController@destroy');
    Route::get('/admin/datasiswa/editdata/{id}','AdminPagesController@editData');

    //crud admin kelas
    Route::get('/admin/kelas/delete/{id}','AdminSystemController@hapuskelas');
    Route::post('/admin/kelas/edit/{id}','AdminSystemController@ubahkelas');
    //crud admin jurusan
    Route::get('/admin/jurusan/delete/{id}','AdminSystemController@hapusjurusan');
    Route::post('/admin/jurusan/edit/{id}','AdminSystemController@ubahjurusan');
});

//post datasiswa
Route::post('/admin/datasiswa/tambahdata','AdminDataController@create');
Route::post('/admin/datasiswa/editdata/{id}',"AdminDataController@edit");

//post kelas
Route::post('/admin/kelas/tambahkelas','AdminSystemController@tambahkelas');

//post jurusan
Route::post('/admin/jurusan/tambahjurusan','AdminSystemController@tambahjurusan');


Route::get('/admin/logout','AdminSystemController@logout');
Route::post('/admin/login','AdminSystemController@loginsystem');
// Route::post('/admin/register','AdminSystemController@registersystem');
