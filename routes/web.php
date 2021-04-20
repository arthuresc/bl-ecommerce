<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TagsGroupsController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route Group
Route::group(['middleware' => 'isAdmin'], function(){
//Products
Route::resource('/product', ProductsController::class);
Route::get('/trash/product', [ProductsController::class, 'trash'])->name('product.trash');
Route::patch('/product/restore/{id}', [ProductsController::class, 'restore'])->name('product.restore');
//Tag
Route::resource('/tag', TagsController::class);
Route::get('/trash/tag', [TagsController::class, 'trash'])->name('tag.trash');
Route::patch('/tag/restore/{id}', [TagsController::class, 'restore'])->name('tag.restore');
//TagGroup
Route::resource('/tagGroup', TagsGroupsController::class);
Route::get('/trash/tagGroup', [TagsGroupsController::class, 'trash'])->name('tagGroup.trash');
Route::patch('/tagGroup/restore/{id}', [TagsGroupsController::class, 'restore'])->name('tagGroup.restore');
//Categories
Route::resource('/category', CategoriesController::class);
Route::get('/trash/category', [CategoriesController::class, 'trash'])->name('category.trash');
Route::patch('/category/restore/{id}', [CategoriesController::class, 'restore'])->name('category.restore');
});
require __DIR__.'/auth.php';
