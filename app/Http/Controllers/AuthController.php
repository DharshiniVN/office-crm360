<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('accounts.login');
    }

    // Show registration form
    public function showRegister()
    {
        return view('accounts.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:4|confirmed',
        ]);

        // Store in session (no database)
        Session::put('user', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect('/login')->with('success', 'Registered successfully! Please log in.');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Session::get('user');

        if ($user && $user['username'] === $request->username && $user['password'] === $request->password) {
            Session::put('logged_in', true);
            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    // Logout
    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
