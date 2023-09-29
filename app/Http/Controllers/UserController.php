<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login() {
        return view('pages.login');
    }

    public function login_action(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong email or password',
        ]);
    }

    function register() {
        return view('pages.register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'balance' => 0,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ]);
        $user->UserDetail()->create();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
