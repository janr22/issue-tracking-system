<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'password' => Hash::make('password'),
            'avatar' => $user->avatar,
        ]);
        if (Auth::attempt(['password' => 'password', 'users.status' => 0])) {
            Auth::login($user, false);
            return redirect()->intended(url('/'));
        } else {
            return redirect()->route('home')->with('status', 'Your account has been deactivated.');
        }
    }
}
