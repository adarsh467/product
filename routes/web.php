<?php

use App\Http\Controllers\Admin\AddonCat1Controller;
use App\Http\Controllers\Admin\AddonCat2Controller;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\ProductController as UserProductController;
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
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


/**
 * User Routes
 */
Route::get('/', [UserHomeController::class, 'index'])->name('user.home');
Route::get('/shop', [UserProductController::class, 'index'])->name('all.products');
Route::get('/product/details/{id}', [UserProductController::class, 'showProduct'])->name('product.details');


/**
 * Authenticated Admin Routes
 */
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // product routes
    Route::get('/product/list', [ProductController::class, 'index'])->name('product');
    Route::match(['get', 'post'], '/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::get('/product/view/{id}', [ProductController::class, 'view'])->name('product.view');
    Route::match(['get', 'post'], '/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    // addon cat1 routes
    Route::get('/product/{proId}/addon/cat1/list', [AddonCat1Controller::class, 'index'])->name('addon.cat1');
    Route::match(['get', 'post'], '/product/{proId}/addon/cat1/add', [AddonCat1Controller::class, 'add'])->name('addon.cat1.add');
    Route::get('/product/{proId}/addon/cat1/view/{id}', [AddonCat1Controller::class, 'view'])->name('addon.cat1.view');
    Route::match(['get', 'post'], '/product/{proId}/addon/cat1/edit/{id}', [AddonCat1Controller::class, 'edit'])->name('addon.cat1.edit');
    Route::delete('/product/{proId}/addon/cat1/delete/{id}', [AddonCat1Controller::class, 'delete'])->name('addon.cat1.delete');
    
    // addon cat2 routes
    Route::get('/product/{proId}/addon/cat2/{cat1Id}/list', [AddonCat2Controller::class, 'index'])->name('addon.cat2');
    Route::match(['get', 'post'], '/product/{proId}/addon/cat2/{cat1Id}/add', [AddonCat2Controller::class, 'add'])->name('addon.cat2.add');
    Route::get('/product/{proId}/addon/cat2/{cat1Id}/view/{id}', [AddonCat2Controller::class, 'view'])->name('addon.cat2.view');
    Route::match(['get', 'post'], '/product/{proId}/addon/cat2/{cat1Id}/edit/{id}', [AddonCat2Controller::class, 'edit'])->name('addon.cat2.edit');
    Route::delete('/product/{proId}/addon/cat2/{cat1Id}/delete/{id}', [AddonCat2Controller::class, 'delete'])->name('addon.cat2.delete');
});
