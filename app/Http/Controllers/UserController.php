<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

        // public function login(Request $request){
        //     $incomingFields = $request->validate([
        //         "loginName" => "required",
        //         "loginPassword" => "required"
        //     ]);

        //     if(auth()->attempt(['name' => $incomingFields["loginName"], 'password' => $incomingFields["loginPassword"]])){
        //         $request ->session() ->regenerate();
        //     }
        //     return redirect("home");
            
        // }

            

        public function logout(){

            auth() ->logout();
            return redirect("/");
            
        }
        public function register(Request $request)
{
   
        $incomingFields = $request->validate([
            "name" => ["required", "min:3", "max:15", Rule::unique('users', 'name')],
            "email" => ["required", "email"],
            "password" => ["required", "min:3", "max:200"],
        ]);

        $incomingFields["password"] = bcrypt($incomingFields["password"]);

        // Explicitly set the 'role_id'
        $incomingFields['role_id'] = 1;

        $user = User::create($incomingFields);

        auth()->login($user);

        return redirect('home');

}

        
}
