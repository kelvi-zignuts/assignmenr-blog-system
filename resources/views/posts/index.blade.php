@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 20, '...') }}</p>
                    <p class="author-name" >Posted by: {{$post->user->name}}</p>
                    
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            {{ $posts->links('pagination::bootstrap-5') }} <!-- Pagination links -->
        </div>
    </div>
</div>
@endsection