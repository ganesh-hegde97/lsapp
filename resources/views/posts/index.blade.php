@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="text-success">Posts</h1>
</div>
<div>
    @if(count($posts) > 1)
        @foreach($posts as $post)
            <div class="well well-sm">
                <h3>{{ $post->title }}</h3>
                <small>Written on
                    <strong class="text-danger">{{ $post->created_at }}</strong>
                </small>
                <div>
                    <a href="/posts/{{ $post->id }}">
                        <button class="btn btn-link">Read More</button>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <div class="well border-danger">
            <p>No posts found</p>
        </div>
    @endif
</div>
@endsection