<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //register
    public function register(){
        return Inertia::render('Auth/Register');
    }

    // store
    public function store(Request $request){

        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create($fields);

        Auth::login($user);

        return to_route('home')->with('message','Register success!');

    }
}
