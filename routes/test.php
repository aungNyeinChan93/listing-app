<?php

use App\Http\Controllers\TestController;

Route::get('test/event',[TestController::class,'event'])->name('test.event');


Route::get('test/class',[TestController::class,'class'])->name('test.class');
