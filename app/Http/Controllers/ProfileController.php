<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //index
    public function index(){
        return Inertia::render('Profile/Index');
    }
}
