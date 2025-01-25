<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Profile/Index', [
            'user' => auth()->user(), // $request->user()
            'success' => $request->session()->get('success'), //session('success')
        ]);
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            [Rule::unique('users')->ignore(auth()->id())],
        ]);

        // auth()->user()->update($fields); // don't use for email verification!
        $request->user()->fill($fields);

        if ($request->user()->isDirty('email')) { // if email is changed
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return redirect()->route('profile.index')->with('message', 'Profile updated successfully');
    }

    /**
     * Summary of passwordUpdate
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function passwordUpdate(Request $request)
    {
        // dd($request->user());
        $fields = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8|same:password',
        ]);

        if (
            !Hash::check($fields['current_password'], $request->user()->password)
            || $request->current_password === $request->password
        ) {
            return back()->withErrors(
                [
                    'current_password' => 'The provided password does not match your current password
                    or the new password is the same as the current password',
                ]
            )->onlyInput('current_password');
        }

        $request->user()->password = Hash::make($fields['password']);
        $request->user()->save();

        return redirect()->route('profile.index')->with('message', 'Password updated successfully');
    }
}
