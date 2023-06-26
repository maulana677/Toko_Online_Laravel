<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');
Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/success', [App\Http\Controllers\CartController::class, 'success'])->name('success');

Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register-success');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//Product
Route::get('/dashboard/products', [App\Http\Controllers\DashboardProductController::class, 'index'])->name('dashboard-product');
Route::get('/dashboard/products/create', [App\Http\Controllers\DashboardProductController::class, 'create'])->name('dashboard-product-create');
Route::get('/dashboard/products/{id}', [App\Http\Controllers\DashboardProductController::class, 'details'])->name('dashboard-product-details');

//transaction
Route::get('/dashboard/transactions', [App\Http\Controllers\DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', [App\Http\Controllers\DashboardTransactionController::class, 'details'])->name('dashboard-transaction-details');

//Setting
Route::get('/dashboard/settings', [App\Http\Controllers\DashboardSettingController::class, 'store'])->name('dashboard-settings-store');
//Account
Route::get('/dashboard/account', [App\Http\Controllers\DashboardSettingController::class, 'account'])->name('dashboard-settings-account');

// ->middleware(['auth','admin'])
Route::prefix('admin')->namespace('Admin')->group(function() {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category_create');
    Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category_store');
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category_edit');
    Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category_update');
    Route::delete('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category_destroy');

    //Users
    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
    Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user_create');
    Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user_store');
    Route::get('/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user_edit');
    Route::post('/user/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user_update');
    Route::delete('/user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user_destroy');

    //Product
    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
    Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product_create');
    Route::post('/product/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product_store');
    Route::get('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('product_edit');
    Route::post('/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product_update');
    Route::delete('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('product_destroy');

    //Product
    Route::get('/product-gallery', [App\Http\Controllers\Admin\ProductGalleryController::class, 'index'])->name('product-gallery');
    Route::get('/product-gallery/create', [App\Http\Controllers\Admin\ProductGalleryController::class, 'create'])->name('product-gallery_create');
    Route::post('/product-gallery/store', [App\Http\Controllers\Admin\ProductGalleryController::class, 'store'])->name('product-gallery_store');
    Route::delete('/product-gallery/delete/{id}', [App\Http\Controllers\Admin\ProductGalleryController::class, 'destroy'])->name('product-gallery_destroy');
});

Auth::routes();

