@extends('layouts.app')

@section('content')
    <a class="" href="/posts">
        <button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back</button>
    </a>
    <h1 class="text-center">Create Post</h1>
    <div class="container-fluid">
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
            <div class="form-group input-group-lg">
                {{ Form::label('title','Post Title',['class' => 'h4']) }}
                {{ Form::text('title','',['class' => 'form-control', 'placeholder' => 'Enter the title of your post']) }}
            </div>
            <div class="form-group input-group-lg">
                {{ Form::label('body','Post Body',['class' => 'h4']) }}
                {{ Form::textarea('body','',['class' => 'form-control', 'placeholder' => 'Enter your post description', 'row' => '2']) }}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
