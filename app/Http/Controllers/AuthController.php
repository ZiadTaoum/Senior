<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

        $subject = 'Welcome to Our Website';
        $body = 'Thank you for registering on our website! We\'re excited to have you as a member.';
        Mail::to($user->email)->send(new TestMail($subject, $body));

            
        Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        $request->session()->regenerate();

        Session::put('success', 'registration success ');

        return redirect(route('home'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect(route('welcome'));
    }
}
