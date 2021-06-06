<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TagsGroupsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InfosController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => 'isAdmin'], function() {
    Route::resource('/product', ProductsController::class, ['except' => ['show']]);
    Route::get('/trash/product', [ProductsController::class, 'trash'])->name('product.trash');
    Route::patch('/product/restore/{id}', [ProductsController::class, 'restore'])->name('product.restore');

    Route::resource('/tag', TagsController::class, ['except' => ['show']]);
    Route::get('/trash/tag', [TagsController::class, 'trash'])->name('tag.trash');
    Route::patch('/tag/restore/{id}', [TagsController::class, 'restore'])->name('tag.restore');

    Route::resource('/tagGroup', TagsGroupsController::class, ['except' => ['show']]);
    Route::get('/trash/tagGroup', [TagsGroupsController::class, 'trash'])->name('tagGroup.trash');
    Route::patch('/tagGroup/restore/{id}', [TagsGroupsController::class, 'restore'])->name('tagGroup.restore');

    Route::resource('/category', CategoriesController::class, ['except' => ['show']]);
    Route::get('/trash/category', [CategoriesController::class, 'trash'])->name('category.trash');
    Route::patch('/category/restore/{id}', [CategoriesController::class, 'restore'])->name('category.restore');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/cart', [CartsController::class, 'show'])->name('cart.show');
    Route::match(['get', 'post'],'/cart/add/{product}', [CartsController::class, 'add'])->name('cart.add');
    Route::match(['get', 'post'],'/cart/remove/{product}', [CartsController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/payment', [CartsController::class, 'payment'])->name('cart.payment');

    Route::resource('/address', AddressController::class);

    Route::post('/order/add', [OrderController::class, 'add'])->name('order.add');
    Route::get('/order', [OrderController::class, 'show'])->name('order.show');
});

Route::resource('/product', ProductsController::class, ['only' => ['show']]);
Route::get('/search', [ProductsController::class, 'search'])->name('product.search');
Route::get('/about', [InfosController::class, 'about'])->name('infos.about');
Route::get('/contact', [InfosController::class, 'contact'])->name('infos.contact');
Route::resource('/tag', TagsController::class, ['only' => ['show']]);
Route::resource('/category', CategoriesController::class, ['only' => ['show']]);



require __DIR__.'/auth.php';
