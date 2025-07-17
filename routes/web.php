<?php

use App\Http\Controllers\User\PaymentRequests\CreateController as UserPaymentRequestsCreateController;
use App\Http\Controllers\User\PaymentRequests\StoreController as UserPaymentRequestsStoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::prefix("paymentRequest")->name("paymentRequest.")->group(function () {
        Route::get('/create', UserPaymentRequestsCreateController::class)->name("create");
        Route::post('', UserPaymentRequestsStoreController::class)->name("store");
    });
});

Route::get('/admin/paymentRequest', function () {
    return view('admin.paymentRequest.index');
})->name("admin.paymentRequest.index");
