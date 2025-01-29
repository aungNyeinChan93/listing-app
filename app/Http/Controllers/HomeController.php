<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    //index
    public function index()
    {
        $listings = request()->user()->role !== 'suspended'? request()->user()->listings()->with('user')->orderBy('approved', 'desc')->paginate(4) :null;
        return Inertia::render('Home/Index', [
            'listings' => $listings,

        ]);
    }
}
