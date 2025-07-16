<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/user/paymentRequest', function () {
    return view('user.paymentRequest.store');
})->name("user.paymentRequest.store");

Route::get('/admin/paymentRequest', function () {
    return view('admin.paymentRequest.index');
})->name("admin.paymentRequest.index");
