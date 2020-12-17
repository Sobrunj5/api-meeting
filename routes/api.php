<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' =>'user'],function (){
    Route::post('register', 'V1\user\Auth\RegisterController@register');
    Route::post('login','V1\user\Auth\LoginController@login');
    Route::get('email/verify/{id}', 'V1\user\Auth\VerificationController@verify')->name('api.verification.verify');
    Route::get('email/resend', 'V1\user\Auth\VerificationController@resend')->name('api.verification.resend');
    Route::get('profile', 'V1\user\UserController@profile');
    Route::post('profile/profile', 'V1\user\UserController@update');
});

Route::get('ruangmeeting','V1\user\RuanganController@getRuangMeeting');
Route::post('ruangmeeting/search', 'V1\user\RuanganController@search');

Route::get('makanan/{id_mitra}', 'V1\user\MakananController@makanan');

Route::post('order','V1\user\BookingController@booking');
Route::get('order/user', 'V1\user\BookingController@bookingByUser');
Route::post('order/{id}/update', 'V1\user\BookingController@update');
Route::get('order/{id}/cancel', 'V1\user\BookingController@cancel');

Route::post('snap', 'V1\user\BookingController@snapToken');
Route::post('snap/charge', 'V1\user\BookingController@snapToken');

Route::get('partner', 'V1\user\MitraController@getPartners');
Route::post('partner/search', 'V1\user\MitraController@search');

Route::get('room/promo', 'V1\user\RuanganController@promo');
Route::get('room/{id_partner}','V1\user\RuanganController@roomByPartner');

Route::get('food/{id_partner}','V1\user\MakananController@makanan');