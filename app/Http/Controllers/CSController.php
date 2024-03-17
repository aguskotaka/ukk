<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Monolog\Level;

class CSController extends Controller
{

    public function index()
    {
        if (auth() && auth()->user()->level === 'admin') {
            $users = User::all();
            return view('register', compact('users'));
        }
        return redirect()->route('dashboard')->with('error', 'You are not HIM');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'password' => 'required',
        ]);
        try {
            User::create($user);
            return redirect()->route('register.index')->with('success', 'Horay New User');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'You Messed Up Bro' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try{
        $user  = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'level' => 'required',
        ]);

            User::findOrFail($id)->update($user);
            return redirect()->route('register.index')->with('success', 'So You Updated User');
        }catch(\Exception $e)
        {
            return redirect()->back()->with('error', 'You Messed Up Bro'.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('register.index')->with('success', 'I just wondering why you deleted that ?');

    }
}