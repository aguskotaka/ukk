<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        // $admin = 'admin';
        // $hash = Hash::make($admin);
        // echo($hash);

        $check = $request->only('email', 'password');

        if (Auth::attempt($check)) {
            return redirect()->route('dashboard')->with('success', 'Success');
        }

        return redirect()->back()->with('error', 'Emaill or Password WRONG');
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'So You Decided to Log-Out');
    }
}
