<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::orderBy('created_at','desc');
        return view('contact.index',['contacts'=>$contact]);
    }

    public function create(Contact $contacts){

        return view('contact.create',['contacts'=>$contacts]);
    }

    public function store(Request $request){
       
        if(Auth::check()){
            $this->validate(
                $request,[
                    'subject'=>'required',
                    'message'=>'required',
                ]
                );
            $user = new Contact;
            $user->name=Auth::user()->name;
            $user->email=Auth::user()->email;
            $user->subject=$request->subject;
            $user->message=$request->message;
            $user->user_id=Auth::user()->id;
            $user->save();
        }
        else{
            $this->validate(
                $request,[
                    'name'=>'required',
                    'email'=>'required',
                    'subject'=>'required',
                    'message'=>'required',
                ]);
            $user = new Contact;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->subject=$request->subject;
            $user->message=$request->message;
            $user->user_id=null;
            $user->save();
            }
      return back()->with('success','Contact was successfully created');

    }

   
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
