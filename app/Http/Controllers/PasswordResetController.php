<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{
    /**
     * Summary of request
     * @return \Inertia\Response
     */
    public function request()
    {
        return Inertia::render('PasswordReset/Request', [
            'status' => session('status'),
        ]);
    }

    /**
     * Summary of email
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function email(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Summary of reset
     * @param string $token
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function reset(string $token, Request $request)
    {
        return Inertia::render('PasswordReset/Reset', [
            'token' => $token,  // $request->route('token'),
            'email' => request('email'), // $request->email
        ]);
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PasswordReset
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
