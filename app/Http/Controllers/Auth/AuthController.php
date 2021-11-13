<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AuthCheck;

class AuthController extends Controller
{


    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    // register
   public function handleRegister(Request $request){
        //first request validation before register
       $request->validate
        ([ 
        'name'=>'required',
        'username'=>'required|unique:users|max:255',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:5|max:12|confirmed',
        'password_confirmation'=>'required',

        ]);

        //add data to DB
        $user = new User;
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $save=$user->save();

       
           return redirect()->route('auth.login')->with('success','New user was successfully added');
       
    }
    //login credentials check
   public function check(Request $request){
      $credentials=[
        'email'=>$request['email'],
        'password'=>$request['password'],  
      ];
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->route('post.index')->with('You are logged in successfully');
        }
       
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
    
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

    return redirect()->route('auth.login')->with('success','Logged out');
    }
}
