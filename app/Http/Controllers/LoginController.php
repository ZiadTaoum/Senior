<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = User::where('email', $request->get('email'))->first()->role;
            if ($role) {
                if ($role->name == 'admin') {
                    return redirect()->route('items.index');
                } else{
                    return redirect()->route('home');
                } 
            }
        }else{
            return redirect()->back()->withInput()->withErrors(['error' => 'Invalid email or password']);   
        }

    }
}