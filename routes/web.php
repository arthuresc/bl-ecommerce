<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TagsGroupsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\AddressController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

// Route::group(['middleware' => 'isAdmin'], function(){});

// //Products
Route::group(['middleware' => 'auth'], function(){
    Route::resource('/product', ProductsController::class, ['except' => ['show']]);
    Route::get('/trash/product', [ProductsController::class, 'trash'])->name('product.trash');
    Route::patch('/product/restore/{id}', [ProductsController::class, 'restore'])->name('product.restore');

    Route::resource('/tag', TagsController::class);
    Route::get('/trash/tag', [TagsController::class, 'trash'])->name('tag.trash');
    Route::patch('/tag/restore/{id}', [TagsController::class, 'restore'])->name('tag.restore');

    Route::resource('/tagGroup', TagsGroupsController::class);
    Route::get('/trash/tagGroup', [TagsGroupsController::class, 'trash'])->name('tagGroup.trash');
    Route::patch('/tagGroup/restore/{id}', [TagsGroupsController::class, 'restore'])->name('tagGroup.restore');

    Route::resource('/category', CategoriesController::class);
    Route::get('/trash/category', [CategoriesController::class, 'trash'])->name('category.trash');
    Route::patch('/category/restore/{id}', [CategoriesController::class, 'restore'])->name('category.restore');
});
Route::resource('/product', ProductsController::class, ['only' => ['show']]);

// TODO resolver regra do carrinho e autenticação

Route::get('/cart', [CartsController::class, 'show'])->name('cart.show');
Route::match(['get', 'post'],'/cart/add/{product}', [CartsController::class, 'add'])->name('cart.add');
Route::match(['get', 'post'],'/cart/remove/{product}', [CartsController::class, 'remove'])->name('cart.remove');
Route::get('/cart/payment', [CartsController::class, 'payment'])->name('cart.payment');

Route::resource('/address', AddressController::class);

require __DIR__.'/auth.php';
