<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Events\TestEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateListingRequest;

class TestController extends Controller
{
    //event
    public function event()
    {
        $user = User::find(Auth::id());
        event(new TestEvent($user));
        dump('Event Fired');
    }

    // class
    public function class()
    {
        $req = new UpdateListingRequest();
        dd($req->rules());
    }

    public function external()
    {
        $inertiaJS = 'https://inertiajs.com/';
        // return redirect()->away($inertiaJS)
        return Inertia::location($inertiaJS);
    }

    // custome route
    public function route(){
        return Inertia::render('Test/CustomeRoute');
    }

    // get
    public function get(Request $request){
        return $request;
    }
}
