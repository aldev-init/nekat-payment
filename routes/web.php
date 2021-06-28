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
// Route::get('/forgotpassword','UserPagesController@resetpassword');
Route::get('/panduanaplikasi','UserPagesController@panduanaplikasi');

Route::middleware(['auth','cantback'])->group(function(){
    Route::get('/pembayaran','UserPagesController@getformpembayaran');
    Route::get('/profile','UserSystemController@profile');
    Route::get('/riwayat','UserPagesController@riwayat');
    Route::get('/editprofile/{id}','UserSystemController@editprofile');
});


Route::get('/logout','UserSystemController@logout');

Route::post('/login','UserSystemController@loginsystem');

Route::post('/editprofile/{id}','UserSystemController@editprofile');

//User Payment
Route::post('/pembayaran/bayar','UserSystemController@payment');
Route::get('/pembayaran/selesai','UserSystemController@paymentfinish')->name('selesai');



//admin
Route::get('/admin/login','AdminPagesController@loginform')->name('admin/login');
Route::middleware(['admin','cantback'])->group(function(){
    Route::get('/admin/beranda','AdminPagesController@beranda');
    Route::get('/admin/datasiswa','AdminPagesController@dataSiswa');
    Route::get('/admin/riwayat','AdminPagesController@riwayat');
    Route::get('/admin/kelasjurusan','AdminPagesController@kelasjurusan');
    Route::get('/admin/transaksisiswa','AdminPagesController@riwayat');
    Route::get('/admin/nominalpembayaran','AdminPagesController@nominalpembayaran');
    Route::get('/admin/rekap','AdminPagesController@rekap');
    //crud Admin datasiswa
    Route::get('/admin/datasiswa/tambahdata','AdminPagesController@tambahData');
    Route::get('/admin/datasiswa/delete/{id}','AdminDataController@destroy');
    Route::get('/admin/datasiswa/editdata/{id}','AdminPagesController@editData');
    //DataSiswa Import CSV\Excel
    Route::post('/admin/datasiswa/import','AdminSystemController@importexcel');

    //crud admin kelas
    Route::get('/admin/kelas/delete/{id}','AdminSystemController@hapuskelas');
    Route::post('/admin/kelas/edit/{id}','AdminSystemController@ubahkelas');
    //crud admin jurusan
    Route::get('/admin/jurusan/delete/{id}','AdminSystemController@hapusjurusan');
    Route::post('/admin/jurusan/edit/{id}','AdminSystemController@ubahjurusan');
    //crud admin nominal pembayaran
    Route::post('/admin/nominalpembayaran/tambahpembayaran','AdminSystemController@tambahpembayaran');
    Route::get('/admin/nominalpembayaran/delete/{id}','AdminSystemController@hapuspembayaran');
    Route::post('/admin/nominalpembayaran/edit/{id}','AdminSystemController@editpembayaran');
    //crud rekap
    Route::post('/admin/rekap/custom/','AdminSystemController@customrekap');
    //crud riwayat transaksi
    Route::post('/admin/transaksi/custom','AdminSystemController@customtransaksi');
    //load view pdf sekaligus print
    Route::get('/admin/pdfrekap','AdminPagesController@loadview');
    //Print PDF
    // Route::get('/admin/rekap/pdf','AdminSystemController@printPDF')->name('print');
    //crud todolist
    Route::post('/admin/todo/tambah','AdminSystemController@tambahtodo');
    Route::get('/admin/todo/delete/{id}','AdminSystemController@hapustodo');
    Route::get('/admin/todo/selesai/{id}','AdminSystemController@todoselesai');
});

//post datasiswa
Route::post('/admin/datasiswa/tambahdata','AdminDataController@create');
Route::post('/admin/datasiswa/editdata/{id}',"AdminDataController@edit");
Route::post('/admin/datasiswa/search','AdminSystemController@search');

//post kelas
Route::post('/admin/kelas/tambahkelas','AdminSystemController@tambahkelas');

//post jurusan
Route::post('/admin/jurusan/tambahjurusan','AdminSystemController@tambahjurusan');


Route::get('/admin/logout','AdminSystemController@logout');
Route::post('/admin/login','AdminSystemController@loginsystem');
// Route::post('/admin/register','AdminSystemController@registersystem');
