<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    //index
    public function index(){
        $listings = request()->user()->listings()->with('user')->paginate(4);
        return Inertia::render('Home/Index',[
            'listings'=>$listings,

        ]);
    }
}
