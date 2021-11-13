<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;


class PostController extends Controller
{
   //get all posts
    public function index(){
        $post = Post::orderBy('created_at', 'desc')->paginate(3);
        $truncated = Str::words('post', 100, '...');
        return view('post.index',['posts'=>$post,$truncated]);
    }

    public function create(){
        $post= Post::all();
        return view('post.create',compact($post));
    }

    // create post
    function store(Request $request)
    {   
        $this->validate($request,[
            'image'=> 'mimes:jpg,png,jpeg|max:5048',
            'post' => 'required'
        ]);
                        //time - name of image - and extension of image
        $newImageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$newImageName);
       
          $request->user()->posts()->create([
            'image'=>$newImageName,
            'post'=> $request->input('post')
      ]);
        
        # Redirect back with success message
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {  
       return view('post.show',['post'=>$post]); 
    }

    // edit post
    public function edit(Post $post)
    {
        return view('post.edit',['post'=>$post]);
    }

    //update post with validation
    public function update(Post $post)
    {
        
        request()->validate([
            'post'=>'required'
        ]);
        $post->update([
            'post'=>request('post'),
        ]);
        return redirect()->route('post.index')->with('success','Your post was successfully updated');
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success','Your post was successfully deleted');
    }

    public function imageUpdate(Request $request, $id){
        $this->validate($request,[
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $user = auth()->user()->posts()->image;
        $image=Post::find($id);
        dd($user);
        $image->image=$request->input('image');
        $image->save();
       
        return back()->with('success','Image updated');
    }
}
