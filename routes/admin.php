<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminLogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImagenesController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;

/* Route::group(['prefix' => 'admin'], function () {
    /Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
}); */

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'store']);
Route::post('/admin/logout', [AdminLogoutController::class, 'store'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth.admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::post('/imagenes', [ImagenesController::class, 'store'])->name('imagenes.store');
    Route::post('/imagenes/delete', [ImagenesController::class, 'destroy'])->name('imagenes.destroy');
});
