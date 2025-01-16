<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');


Route::get('register',[RegisterController::class,'register'])->name('register');
Route::post('register',[RegisterController::class,'store'])->name('register.store');

Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'store'])->name('login.store');
Route::post('logout',[LoginController::class,'logout'])->name('logout');
