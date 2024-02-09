<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    
    public function store(Request $request)
    {
        
        $request->validate([
            'content'=> 'required',
            // 'post_id'=>'required',
        
        ]);
        
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id=auth()->id();
        $comment->post_id = $request->post_id;  
        $comment->save();
        return redirect()->back()->with('success','comment added successfully');
    }
    // public function edit($id)
    // {
    //     $comment = Comment::findOrFail($id);
    //     return view ('posts.show',compact('posts'));
    // }
    public function update(Request $request,$id)
    {
        $request->validate([
            'content'=>'required',
        ]);
        $comment = Comment::findOrFail($id);
        $comment->content=$request->content;
        $comment->save();
        return redirect()->back()->with('success','comment updated successfully');
    }

    public function destory($id)
    {
        $comment=Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with('success','comment deleted successfully');
    }
   
}
