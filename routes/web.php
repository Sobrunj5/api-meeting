<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function()  {
    return view('templates.adminmitrahome');
});

Route::post('/finish', function () {
    return redirect()->route('welcome');
})->name('donation.finish');

Route::group(['prefix' => 'superadmin'], function () {

    Route::get('dashboard', 'superadmin\DashboardController@index')->name('dashboards.index');
    //Data Mitra
    Route::get('datamitra', 'superadmin\DataMitraController@index')->name('datamitra.index');
    Route::post('datamitra/store', 'superadmin\DataMitraController@store')->name('datamitra.store');
    Route::post('datamitra/store', 'superadmin\DataMitraController@store')->name('datamitra.store');
    Route::get('datamitra/edit/{id}','superadmin\DataMitraController@edit')->name('datamitra.edit');
    Route::patch('datamitra/update{id}','superadmin\DataMitraController@update')->name('datamitra.update');
    Route::get('datamitra/show{id}','superadmin\DataMitraController@show')->name('datamitra.show');
    Route::get('datamitra/destroy/{id}','superadmin\DataMitraController@destroy')->name('datamitra.destroy');
    //Ruang Meeting
    Route::get('ruangmeeting', 'superadmin\RuangMeetingController@index')->name('ruangmeetings.index');
    Route::get('ruangmeeting/edit/{id}', 'superadmin\RuangMeetingController@edit')->name('ruangmeetings.edit');
    Route::patch('ruangmeeting/update/{id}', 'superadmin\RuangMeetingController@update')->name('ruangmeetings.update');
    Route::get('ruangmeeting/destroy/{id}', 'superadmin\RuangMeetingController@destroy')->name('ruangmeetings.destroy');
    Route::get('ruangmeeting/show{id}', 'superadmin\RuangMeetingController@show')->name('ruangmeetings.show');
    Route::get('verifikasi/{id}','superadmin\RuangMeetingController@verifikasi')->name('ruangmeetings.verifikasi');

    Route::get('datatransaksi', 'superadmin\DataTransaksiController@index')->name('datatransaksi.index');
    //Data User
    Route::get('datauser', 'superadmin\DataUserController@index')->name('datauser.index');
});
Route::group(['prefix' => 'adminmitra'], function () {

    Route::get('dashboard', 'adminmitra\DashboardController@index')->name('dashboard.index');


    Route::get('boking', 'adminmitra\BokingMasukController@index')->name('boking.index');
    Route::get('booking/{id}/verifikasi', 'adminmitra\BokingMasukController@verifikasi')->name('booking.verifikasi');
    Route::get('booking/{id}/tolak', 'adminmitra\BokingMasukController@tolak')->name('booking.tolak');

    //profie
    Route::get('profil','adminmitra\ProfilController@index')->name('profil.index');
    Route::patch('profil/update','adminmitra\ProfilController@updateProfil')->name('profil.update');
    //ruang meeting
    Route::get('ruangmeeting', 'adminmitra\RuangMeetingController@index')->name('ruangmeeting.index');
    Route::get('ruangmeeting/create', 'adminmitra\RuangMeetingController@create')->name('ruangmeeting.create');
    Route::post('ruangmeeting/store', 'adminmitra\RuangMeetingController@store')->name('ruangmeeting.store');
    Route::post('ruangmeeting/store', 'adminmitra\RuangMeetingController@store')->name('ruangmeeting.store');
    Route::get('ruangmeeting/edit/{id}', 'adminmitra\RuangMeetingController@edit')->name('ruangmeeting.edit');
    Route::patch('ruangmeeting/update/{id}', 'adminmitra\RuangMeetingController@update')->name('ruangmeeting.update');
    Route::get('ruangmeeting/destroy/{id}', 'adminmitra\RuangMeetingController@destroy')->name('ruangmeeting.destroy');

    //Makanan & Minuman
    Route::get('makanan', 'adminmitra\MakananController@index')->name('makanan.index');
    Route::get('makanan/create', 'adminmitra\MakananController@create')->name('makanan.create');
    //Route::post('makanan/store', 'adminmitra\MakananController@store')->name('makanan.store');
    Route::post('makanan/store', 'adminmitra\MakananController@store')->name('makanan.store');
    Route::get('makanan/edit/{id}', 'adminmitra\MakananController@edit')->name('makanan.edit');
    Route::patch('makanan/update/{id}', 'adminmitra\MakananController@update')->name('makanan.update');
    Route::get('makanan/destroy/{id}', 'adminmitra\MakananController@destroy')->name('makanan.destroy');
    // profil
    Route::get('profil', 'adminmitra\ProfilController@index')->name('profil.index');
    Route::patch('profil/update{id}','adminmitra\ProfilController@update')->name('profi.update');
});

    Route::get('/superadmin-login', 'superadmin\Auth\LoginController@showLoginForm')->name('superadmin.login');
    Route::post('/superadmin-login', 'superadmin\Auth\LoginController@login')->name('superadmin.login.submit');
    Route::get('/superadmin-register', 'superadmin\Auth\RegisterController@showRegisterForm')->name('superadmin.register');
    Route::post('/superadmin-register', 'superadmin\Auth\RegisterController@store')->name('superadmin.register.submit');
    Route::get('/superadmin-logout', 'superadmin\Auth\LoginController@logout')->name('superadmin.logout');

    Route::get('/adminmitra-login', 'adminmitra\Auth\LoginController@showLoginForm')->name('adminmitra.login');
    Route::post('/adminmitra-login', 'adminmitra\Auth\LoginController@login')->name('adminmitra.login.submit');
    Route::get('/adminmitra-register', 'adminmitra\Auth\RegisterController@showRegisterForm')->name('adminmitra.register');
    Route::post('/adminmitra-register', 'adminmitra\Auth\RegisterController@store')->name('adminmitra.register.submit');
    Route::get('/adminmitra-logout', 'adminmitra\Auth\LoginController@logout')->name('adminmitra.logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
