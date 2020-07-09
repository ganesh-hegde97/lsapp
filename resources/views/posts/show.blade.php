@extends('layouts.app')

@section('content')
    <a class="" href="/posts">
        <button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back</button>
    </a>

    @include('inc.messages')
    <div>
        <h2 class="text-success">{{$post->title}}</h2>
        <div class="text-center">
            <p>{!! $post->body !!}</p>
        </div>
        <div class="margin-top-xl">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-info">Edit</a>
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=> 'pull-right']) !!}
                {{ Form::hidden('_method','DELETE') }}
                {{ Form::submit('Delete',['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        </div>
        <hr>
        <small>Published on
            <strong class="text-danger">{{ $post->created_at }}</strong>
            <h5>by <strong>{{ $post->user->name }}</strong></h5>
        </small>
    </div>
    
@endsection
