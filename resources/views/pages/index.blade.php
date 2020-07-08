@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        @if (Auth::guest())
            <h1>Voila!</h1>
            <p class="text-warning">Welcome to our blog website using Laravel framework</p>
        @else
            <h1>Voila!&nbsp;<span class="text-primary h2">{{ Auth::user()->name }}</span></h1>
            <p class="text-warning">Welcome to our blog website using Laravel framework</p>
            <a class="btn btn-primary btn-md" href="/posts/create" role="button">Create a post</a>
        @endif  
    </div>
@endsection
