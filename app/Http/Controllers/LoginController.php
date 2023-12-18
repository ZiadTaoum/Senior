<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Perform a basic query to check if the user exists in the database
        $user = User::where('email', $email)->first();

        // Check if the user exists and if the password is correct
        if ($user && Hash::check($password, $user->password)) {
            // Check the role and redirect accordingly
            $role = $user->role; // Assuming there is a 'role' relationship in the User model

            if ($role) {
                if ($role->id == 1) {
                    return redirect()->route('home');
                } elseif ($role->id == 2) {
                    return redirect()->route('items.index');
                } 
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Invalid email or password']);       
         }
    }
}