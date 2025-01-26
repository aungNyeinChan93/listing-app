<?php

use App\Http\Controllers\TestController;
use App\Models\Member;

Route::get('test/event',[TestController::class,'event'])->name('test.event');


Route::get('test/class',[TestController::class,'class'])->name('test.class');

Route::get('test/member',function(){
    $member = new Member();
    $member->test = '1';
    $member->save();
    dd($member->id);
});
