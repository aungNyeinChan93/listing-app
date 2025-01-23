<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfirmPasswordController;

Route::get('/confirm-password', [ConfirmPasswordController::class, 'confirm'])
    ->middleware('auth')->name('password.confirm');

Route::post('/confirm-password', [ConfirmPasswordController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])->name('password.store');
