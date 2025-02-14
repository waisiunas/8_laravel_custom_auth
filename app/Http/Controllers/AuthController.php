<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            // 'email.required' => "Apna error!"
        ]);

        if (Auth::attempt($request->except(['_token', 'submit']))) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with(['failure' => "Invalid login details!"]);
        }
    }

    public function register_view()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:50', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        if (User::create($data)) {
            return redirect()->back()->with(['success' => "Magic has been spelled!"]);
        } else {
            return redirect()->back()->with(['failure' => "Magic has failed to spell!"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
