<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/test.php';
require_once __DIR__ . '/emailVerification.php';
require_once __DIR__ . '/passwordReset.php';

Route::middleware(['guest'])->group(function () {

    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', [HomeController::class, 'index'])->middleware('verified')->name('home');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/detail/{user}', [UserController::class, 'show'])->name('users.show');
});


