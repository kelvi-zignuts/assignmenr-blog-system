@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    @if(Auth::user()->id === $post->user_id)
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5">{{ $post->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: blue;">Update Post</button>
                    </form>
                    @else
                    <p>You are not authoeized to edit this post.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection