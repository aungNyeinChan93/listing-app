<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    //index
    public function index(){
        return Inertia::render('Home/Index');
    }
}
