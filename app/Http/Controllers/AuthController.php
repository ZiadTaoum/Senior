<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function registrationPost(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role_id' => Role::where('name', 'user')->first()->id
        ]);

        Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        $request->session()->regenerate();

        return redirect(route('home'))->with('success', 'registration success ');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect(route('welcome'));
    }
}
