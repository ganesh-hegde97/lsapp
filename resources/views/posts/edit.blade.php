@extends('layouts.app')

@section('content')
<a class="" href="/posts/{{ $post->id }}">
        <button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back</button>
    </a>
    <h1 class="text-center">Edit Post</h1>
    @include('inc.messages')
    <div class="container-fluid">
        {!! Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'POST']) !!}
            <div class="form-group input-group-lg">
                {{ Form::label('title','Post Title',['class' => 'h4']) }}
                {{ Form::text('title',$post->title,['class' => 'form-control', 'placeholder' => 'Enter the title of your post']) }}
            </div>
            <div class="form-group input-group-lg">
                {{ Form::label('body','Post Body',['class' => 'h4']) }}
                {{ Form::textarea('body',$post->body,['class' => 'form-control', 'id' => 'article-ckeditor', 'placeholder' => 'Enter your post description']) }}
            </div>
            {{ Form::hidden('_method','PUT') }}
            {{ Form::submit('Save',['class' => 'btn btn-default']) }}
        {!! Form::close() !!}
    </div>
@endsection
