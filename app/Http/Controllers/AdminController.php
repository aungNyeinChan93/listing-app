<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware(['admin', 'auth', 'verified']),
        ];
    }
    // index
    public function index()
    {
        $users = User::query()->with('listings')->latest()->paginate('10');
        $listings = Listing::query()->with('user')->latest()->paginate('6');
        return Inertia::render('Admin/Home/Index', [
            'listings' => $listings,
            'users' => $users,
            'message' => session('message'),
            'canRoleChange'=> auth()->user()->isAdmin() ?? false,

        ]);
    }
}
