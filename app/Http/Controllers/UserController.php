<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index

    public function index(){
        return Inertia::render('Users/Index',[
            'users'=>User::query()->paginate(10),
        ]);
    }

    public function show(User $user){
        return Inertia::render('Users/Show',[
            'user'=>$user,
        ]);
    }
}
