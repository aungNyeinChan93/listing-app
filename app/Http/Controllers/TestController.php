<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\TestEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    //event
    public function event()
    {
        $user = User::find(Auth::id());
        event(new TestEvent($user));
        dump('Event Fired');
    }
}
