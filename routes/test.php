<?php

use App\Http\Controllers\TestController;

Route::get('test/event',[TestController::class,'event'])->name('test.event');
