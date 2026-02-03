<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// USERS ROUTES
Route::get('/users', [UserController::class, 'show']);

// PRODUCTS ROUTES
Route::get('/products', [ProductController::class, 'show']);

// CART ROUTES
Route::get('/cart', [CartController::class, 'show']);

// CART_ITEMS ROUTES
Route::get('/cart/items', [CartItemsController::class, 'show']);
Route::post('/cart/items', [CartItemsController::class, 'store']);
Route::delete('/cart/items', [CartItemsController::class, 'destroy']);
