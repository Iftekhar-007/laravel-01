<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // default
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Login now!');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('name', $request->name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    // public function dashboard() {
    //     $user = Session::get('user');
    //     if(!$user) return redirect()->route('login');
    //     return view('dashboard', compact('user'));
    // }

    public function dashboard() {
    $user = Session::get('user');
    if(!$user) return redirect()->route('login');

    // যদি user admin হয়, all users pass করো
    $allUsers = [];
    if($user->role === 'admin'){
        $allUsers = \App\Models\User::all();
    }

    return view('dashboard', compact('user', 'allUsers'));
}


    public function logout() {
        Session::forget('user');
        return redirect()->route('login');
    }
}
