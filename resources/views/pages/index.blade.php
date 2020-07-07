@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Home</h1>
    <p>Welcome to Laravel!</p>
    <p class="row">
        <a class="btn btn-primary btn-md" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-md" href="/register" role="button">Register</a>
    </p>
  </div>
@endsection
