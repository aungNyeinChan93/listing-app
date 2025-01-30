<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // index
    public function index(){

        $listings= Listing::query()->with('user')->latest()->paginate('6');
        return Inertia::render('Admin/Home/Index',[
            'listings'=>$listings,
            'message'=>session('message'),
        ]);
    }
}
