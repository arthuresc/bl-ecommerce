<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

// Products
Route::resource('/product', ProductsController::class);
Route::get('/trash/product', [ProductsController::class, 'trash'])->name('product.trash');
Route::patch('/product/restore/{id}', [ProductsController::class, 'restore'])->name('product.restore');
