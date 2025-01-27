<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

require_once __DIR__ . '/test.php';
require_once __DIR__ . '/emailVerification.php';
require_once __DIR__ . '/passwordReset.php';
require_once __DIR__ . '/confirmPassword.php';

Route::middleware(['guest'])->group(function () {

    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth','notSuspended'])->group(function () {

    // Logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Home
    Route::get('/', [HomeController::class, 'index'])->middleware('verified')->name('home');

    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/detail/{user}', [UserController::class, 'show'])->name('users.show');

    // Profile
    Route::get('profile', [ProfileController::class, 'index'])
        ->middleware(['password.confirm'])->name('profile.index');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'passwordUpdate'])->name('profilePassword.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // listings
    Route::get('listings/testing',[ListingController::class,'test']);
    Route::get('listings/non-approved',[ListingController::class,'non_approved'])->name('listings.non-approved');
    Route::resource('listings', ListingController::class);
});


