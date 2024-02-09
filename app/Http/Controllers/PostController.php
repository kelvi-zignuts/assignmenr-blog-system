<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
  
    public function index()
    {
        $posts= Post::orderBy('created_at','desc')->paginate(6);
        return view('posts.index', compact('posts'));
    }
 
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();
        

        // $postData = $request->except(['_token']);

        // Post::create($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('succes', 'Post created successfully.');
    }

    public function show($id)
    {
        // $post = Post::with('comments')->findOrFail($id);
        $post = Post::find($id);
        $comment = $post->comments;
        // $comment = Comment::where('post_id', $post->id)->first();
        // $comment = Comment::find($id)->comments()
        //             ->where('post_id', $post->id)
        //             ->first();

        // return $this->hasMany(Comment::class, 'foreign_key');
        return view('posts.show', compact('post','comment'));
    }

    public function edit(Post $post)
    {
        if(Auth::user()->id!==$post->user_id){
            abort(403,'unauthorized account');
        }
        // $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);

        $postData = $request->except(['_token', '_method']);
        $post->update($postData);

        return redirect()->route('posts.index');
    }

   
    public function destroy(Post $post)
    {
        if(Auth::user()->id!==$post->user_id){
            abort(403,'unauthorized account');
        }
        // $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
