@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h4">Dashboard</div>
                <div class="panel-body">
                    @include('inc.messages')
                    <h3>Your Blog Posts <a href="/posts/create" class="btn btn-primary pull-right">Create a post</a></h3>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
