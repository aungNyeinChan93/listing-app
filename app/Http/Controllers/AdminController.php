<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;

class AdminController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware(['admin']),
        ];
    }
    // index
    public function index()
    {

        $listings = Listing::query()->with('user')->latest()->paginate('6');
        return Inertia::render('Admin/Home/Index', [
            'listings' => $listings,
            'message' => session('message'),
        ]);
    }
}
