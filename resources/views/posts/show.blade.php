@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')" style="background-color: red;">Delete</button>
                    </form>
                </div>   
            </div>
        </div>
    </div>

    <div class="container mt-6 ">
        <h3>Comments</h3>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-10">
                @foreach($comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <p>{{$comment->content}}</p>
                        <small>Posted by : {{$comment->user->name}}</small>
                        <div class="mt-2">
                            <form action="{{route('comments.destory',$comment->id)}}" method="POST" style="display: inline;">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclicke="return confrim('are you sure you want to delete this comment?')" style="background-color:red;">Delete</button>
                        </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                <form action="{{route('comments.store',$post->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="content">Add Comment:</label>
                        
                        <textarea class="from-control" name="content" rows="10" required></textarea>
                    </div>
                    <input type="hidden" name='post_id' value="{{$post->id}}">
                    <button type="submit" class="btn btn-primary" style="background-color: #007bff;">Add Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
