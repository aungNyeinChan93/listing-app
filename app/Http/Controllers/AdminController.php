<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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

    // index (admins.index)
    public function index(Request $request)
    {
        $approvedList = User::query()->whereHas('listings', function (Builder $builder) {
            $builder->where('approved', true);
        })->with('listings')->latest()->get();

        $listings = Listing::query()->with('user')
            ->filter(request(['search']))
            ->latest()->paginate('6')->withQueryString();

        $users = User::query()
            ->with('listings')
            ->filter(request(['search','role']))
            ->latest()->paginate('10')->withQueryString();


        return Inertia::render('Admin/Home/Index', [
            'approvedList' => $approvedList,
            'listings' => $listings,
            'users' => $users,
            'message' => session('message'),
            'canRoleChange' => auth()->user()->isAdmin() ?? false,
            'search' => $request->search,
            'role'=>$request->role
        ]);
    }
}
