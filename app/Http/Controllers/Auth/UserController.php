<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
     //getting edit page for use data
     public function index(){
        return view('auth.edit');
    }

    public function editProfil(User $user){
        $user = Auth::user();
        return view('auth.edit',['user'=>$user]);
    }

    public function updateProfil(Request $request){
        //auth hashed user password declaring (current user)
        $user = auth()->user();
        //to update only username when needed
        $email = User::where('email', '=', $user)->first();
        if($email){
            $this->validate
            ($request, [ 
            'name'=>'required',
            'email' => 'required|email|max:255|unique:users',
        ]);
        }else{
            $this->validate
            ($request, [ 
            'name'=>'required',
            'email' => 'required|email|max:255',
        ]);
        }
        
        $user->update([
               'name'=>request('name'),
               'email'=>request('email'),
            ]);

        return redirect()->back()->with('success','Your user data were successfully updated');
        
    }

    public function editPassword(User $user)
    {
        $user = Auth::user()->id;
        return view('auth.password.edit',['user'=>$user]);
    }

    public function updatePassword(Request $request)
    {
        $this->validate
        ($request, [ 
        'name'=>'required',
        'username'=>'required',
        'email'=>'required|email',
        'old_password'=>'required',
        'new_password'=>'required',
        'password_confirmation'=>'required|same:new_password',
        ]);

        //auth hashed user password declaring (current user)
        $user = auth()->user();
       
       
        //comparign old password with our inputted password 
        if(Hash::check($request->old_password,$user->password)){

            $user->update([
                'password'=>Hash::make(request('new_password')),
            ]);

            return redirect()->back()->with('success','Your user data were successfully updated');
        }else{
            return redirect()->back()->with('error', 'Old password does not matchetd!');
        }

        
    }
}
