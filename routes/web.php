<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PremiumPaymentController;
use App\Http\Controllers\MultiPaymentController;


Route::get('/pay', [PaymentController::class, 'processPayment']);
Route::get('/premium-pay', [PremiumPaymentController::class, 'processPayment']);
Route::get('/list-payments', [MultiPaymentController::class, 'listPayments']);
