<?php

namespace App\Http\Controllers;

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

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // $credentials = $request->only('email','password');
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        if(Auth::attempt($credentials)){
            dd($request->all());
            $user = User::where('email', $request->get('email'))->first();
            Auth::login($user->id);
            return redirect()->route('home');
            // return redirect()->intended(route('home'))->with('success', 'Login successful');
        }
       
    }

    public function registrationPost(Request $request)
    {
     $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect(route('registration'))->with('error', 'Login details are not valid');
        }
        return redirect(route('home'))->with('success', 'registration success ');

    }

    public function logout(){
        Session::flush();
        Auth::logout();

         return redirect(route('welcome'));
    }
}

