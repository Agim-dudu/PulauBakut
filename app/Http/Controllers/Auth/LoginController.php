<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }
    public function auth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials, $request->checkRemember)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }


        return back()->withErrors([
            'email' => 'Tidak ada akun yang cocok dengan inputan anda'
        ])->onlyInput('email');
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Terjadi kesalahan saat autentikasi dengan Google.');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser, true);
        } else {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->provider = 'google';
            $newUser->provider_id = $user->id;
            $newUser->avatar = $user->avatar;
            $newUser->password = bcrypt('your-random-password');
            $newUser->save();
            Auth::login($newUser, true);
        }

        return redirect()->route('index');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Terjadi kesalahan saat autentikasi dengan Facebook.');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser, true);
        } else {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->provider = 'facebook';
            $newUser->provider_id = $user->id;
            $newUser->avatar = 'https://graph.facebook.com/' . $user->id . '/picture?type=normal';
            $newUser->password = bcrypt('your-random-password');
            $newUser->save();
            Auth::login($newUser, true);
        }

        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
