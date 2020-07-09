@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="text-success">Posts</h1>
</div>
@include('inc.messages')
<div>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well well-sm">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <img src="/storage/post_images/{{ $post->cover_image }}" height="150" width="230"  class="" alt="Post Image">
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <h3>{{ $post->title }}</h3>
                        <small>Published on
                            <strong class="text-danger">{{ $post->created_at }}</strong>
                            <h5>by <strong>{{ $post->user->name }}</strong></h5>
                        </small>
                        <div>
                            <a href="/posts/{{ $post->id }}">
                                <button class="btn btn-link">Read More &#10145;</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <div class="well border-danger">
            <p>No posts found</p>
        </div>
    @endif
</div>
@endsection