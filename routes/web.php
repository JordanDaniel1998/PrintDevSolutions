<?php

use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\User\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/my-account', [AccountController::class, 'index'])->name('myAccount')->middleware(['auth']);







// Nota: El middleware auth, es un middelware que viene dentro de laravel, se puede usar para saber si un usuario esta autenticado o no, si no esta autenticado laravel por defecto lo lleva hacia la ruta login, es decir: route('login')