@extends('layouts.app')

@section('content')
    @include('inc.messages')
    <a class="" href="/posts">
        <button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back</button>
    </a>
    <div>
        <h2 class="text-success">{{$post->title}}</h2>
        <div class="text-center">
            <img src="/storage/post_images/{{ $post->cover_image }}" height="300" width="450" alt="Post Image">
        </div>
        <br>
        <div class="text-center">
            <h4>{!! $post->body !!}</h4>
        </div>
        <br>
        @if (!Auth::guest())
            @if (Auth::user()->id == $post->user_id)
                <div class="margin-top-xl">
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-info">Edit</a>
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=> 'pull-right']) !!}
                        {{ Form::hidden('_method','DELETE') }}
                        {{ Form::submit('Delete',['class' => 'btn btn-danger']) }}
                    {!! Form::close() !!}
                </div>
            @else
                <hr>
            <h5 class="text-danger">You're not <strong>{{ $post->user->name }}</strong>, Only the owner of the post can <em><strong>Edit</strong></em> or <em><strong>Delete</strong></em></h5>
            @endif
        @else
            <hr>
            <h5 class="text-danger">Only the owner of the post can <em><strong>Edit</strong></em> or <em><strong>Delete</strong></em>, Please Login!</h5>
        @endif
        <hr>
        <small>Published on
            <strong class="text-info">{{ $post->created_at }}</strong>
            <h5>by <strong>{{ $post->user->name }}</strong></h5>
        </small>
    </div><br><br><br>
    
@endsection
