@extends('layouts.app')

@section('content')
    <a class="" href="/posts">
        <button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back</button>
    </a>
    <h1 class="text-center">Create Post</h1>
    @include('inc.messages')
    <div class="container-fluid">
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group input-group-lg">
                {{ Form::label('title','Post Title',['class' => 'h4']) }}
                {{ Form::text('title','',['class' => 'form-control', 'placeholder' => 'Enter the title of your post']) }}
            </div>
            <div class="form-group">
                {{ Form::label('body','Post Body',['class' => 'h4']) }}
                {{ Form::textarea('body','',['class' => 'form-control', 'id' => 'article-ckeditor', 'placeholder' => 'Enter your post description']) }}
            </div>
            <div class="form-group input-group-lg">
                {{ Form::file('cover_image',['class' => 'form-control-file']) }}
            </div>
            {{ Form::submit('Add a post',['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
    </div><br><br><br>
@endsection
