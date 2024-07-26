<?php

use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\LogoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\Blog\BlogerController;
use App\Http\Controllers\Frontend\Post\PostController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DirectionController;
use App\Http\Controllers\Frontend\User\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// -------------------------------------------- Users -----------------------------------------------
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware(['auth.user']); // Si ya se autenticó permite acceso
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware(['auth.user']);;
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/my-account/{user}/edit', [AccountController::class, 'index'])->name('myAccount')->middleware(['auth', 'auth.checkUserOwner']);
Route::get('/my-account/{user}/direction', [DirectionController::class, 'index'])->name('myAccount.direction')->middleware(['auth', 'auth.checkUserOwner']);
Route::get('/my-account/{user}/orders', [OrderController::class, 'index'])->name('myAccount.orders')->middleware(['auth', 'auth.checkUserOwner']);

Route::get('/posts/{user:username}', [PostController::class, 'index'])->name('posts.index')->middleware(['auth', 'auth.checkUserOwner']);;


Route::get('/blogs', [BlogerController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogerController::class, 'show'])->name('blogs.show');



// ------------------------------------------- Admin --------------------------------------------------
require __DIR__.'/admin.php';





// Nota: El middleware auth, es un middelware que viene dentro de laravel, se puede usar para saber si un usuario esta autenticado o no, si no esta autenticado laravel por defecto lo lleva hacia la ruta login, es decir: route('login')
