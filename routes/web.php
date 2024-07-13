<?php

use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\User\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// -------------------------------------------- Users -----------------------------------------------
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware(['auth.user']); // Si ya se autentico permite acceso
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware(['auth.user']);;
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/my-account/{user}', [AccountController::class, 'index'])->name('myAccount')->middleware(['auth', 'auth.usuario']);



// ------------------------------------------- Admin --------------------------------------------------
require __DIR__.'/admin.php';





// Nota: El middleware auth, es un middelware que viene dentro de laravel, se puede usar para saber si un usuario esta autenticado o no, si no esta autenticado laravel por defecto lo lleva hacia la ruta login, es decir: route('login')