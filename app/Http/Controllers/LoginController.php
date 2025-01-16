<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //login
    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    //login Process
    public function store(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!auth()->attempt($fields)) {
            return back()->withErrors([
                'email' => "Your Crendial Wrong!"
            ])->onlyInput('email');
        }

        Auth::login($user);

        return to_route('home')->with('message', 'Login Success!');
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return to_route("login")->with('message', 'Logout Success!');
    }

}
