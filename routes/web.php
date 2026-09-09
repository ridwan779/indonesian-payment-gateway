<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Front\HomeController@getIndex')->name('home.index');
Route::post('/payment/process', 'App\Http\Controllers\Front\HomeController@postPaymentProcess')->name('home.payment.process');
Route::get('/payment/pending/{order_no}', 'App\Http\Controllers\Front\HomeController@getPaymentPending')->name('home.payment.pending');
