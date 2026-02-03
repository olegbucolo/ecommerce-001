<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/cart/items', [CartController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
