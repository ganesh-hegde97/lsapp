@extends('layouts.app')

@section('content')
    <a class="" href="/posts">
        <button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back</button>
    </a>
    <div>
        <h2 class="text-success">{{$post->title}}</h2>
        <div>
            <p>{{$post->body}}</p>
        </div>
        <hr>
        <small>Written on
            <strong class="text-danger">{{ $post->created_at }}</strong>
            <h5>by <strong>author</strong></h5>
        </small>
        
    </div>
    <div>

    </div>
@endsection