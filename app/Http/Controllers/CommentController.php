<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  
    //need to be checked wheather working or not
    public function store(Request $request,Post $post){
       
        $postId=$post->id;
        $comment = new Comment;
        // $comment = Comment::orderBy('created_at', 'desc');
        $comment::create([
            'comment'=>$request->comment,
            'post_id'=>$postId,
        ]);
      return back()->with('success','Successfully added comment');
   }

   public function update(Request $request,$id){
    $this->validate($request,[
        'comment'=>'required'
    ]);
    $comment=Comment::find($id);
    $comment->comment=$request->input('comment');
    $comment->save();

    return back()->with('success','comment updated');
   }
    //  post comment
    public function edit($id)
    {
       $comment = Comment::find($id);
       return view('post.modals.comment')->with('comment',$comment);
    }

    public function destroy($id)
    {      
            $comment = Comment::find($id);
            $comment->delete();
        return back()->with('success','deleted comment');

    }

}
