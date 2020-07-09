@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h4">Dashboard</div>
                <div class="panel-body">
                    @include('inc.messages')
                    <h3 class="text-center">Your Blog Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>
                                    <h4>Title</h4>
                                </th>
                                <th class="text-center"></th>
                                <th class="text-center"></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td class="text-primary"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
                                    <td class="text-center">
                                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>
                                    </td>
                                    <td class="text-center">
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' =>
                                        'POST']) !!}
                                            {{ Form::hidden('_method','DELETE') }}
                                            {{ Form::submit('Delete',['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center">Unfortunately you have no posts, please create one!</p>
                    @endif

                    <a href="/posts/create" class="btn btn-primary pull-right">Create a post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection