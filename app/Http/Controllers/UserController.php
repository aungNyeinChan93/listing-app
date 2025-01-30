<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index

    public function index(Request $request)
    {

        $users = User::query()
            ->when($request->search, function ($query) use ($request) {
                $query->whereAny(['name', 'email'], 'like', "%{$request->search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10)->withQueryString();


        return Inertia::render('Users/Index', [
            'users' => $users,
            'search' => $request->search
        ]);
    }

    public function show(User $user)
    {
        return Inertia::render('Users/Show', [
            'user' => $user,
        ]);
    }

    public function changeRole(Request $request, User $user)
    {
        dd('hit',$user);
    }
}
