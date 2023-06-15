<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = $request->validate([
            'UsernameInput' => 'required',
            'emailInput' => 'required|email',
            'passwordInput' => 'required|min:8|confirmed',
        ]);


        $query = User::create([
            'name' => $request->UsernameInput,
            'email' => $request->emailInput,
            'password' => Hash::make($request->passwordInput)
        ]);


        if ($query) {
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }
}
