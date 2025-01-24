<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    //index
    public function index(Request $request)
    {
        return Inertia::render('Profile/Index', [
            'user' => auth()->user(), // $request->user()
            'success' => $request->session()->get('success'), //session('success')
        ]);
    }

    // update
    public function update(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            [Rule::unique('users')->ignore(auth()->id())],
        ]);

        // auth()->user()->update($fields); // don't use for email verification
        $request->user()->fill($fields);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
