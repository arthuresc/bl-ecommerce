<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;

Route::get('/', function () {
    return view('welcome');
});

// Products
Route::resource('/product', ProductsController::class);
Route::get('/trash/product', [ProductsController::class, 'trash'])->name('product.trash');
Route::patch('/product/restore/{id}', [ProductsController::class, 'restore'])->name('product.restore');

Route::resource('/tag', TagsController::class);
Route::get('/trash/tag', [TagsController::class, 'trash'])->name('tag.trash');
Route::patch('/tag/restore/{id}', [TagsController::class, 'restore'])->name('tag.restore');