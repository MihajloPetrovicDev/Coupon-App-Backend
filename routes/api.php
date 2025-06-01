<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CouponController;
use App\Http\Middleware\ApiGuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register'])->middleware(ApiGuest::class);

Route::post('/login', [AuthController::class, 'login'])->middleware(ApiGuest::class);

Route::get('/user/coupons', [CouponController::class, 'getUserCoupons'])->middleware('auth:sanctum');