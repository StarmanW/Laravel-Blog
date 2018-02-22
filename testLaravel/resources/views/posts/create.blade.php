@extends('templates.app')

@section('content')
    <h1 class="text-center">Create Post</h1>
    <div class="container col-lg-10">
        {!! Form::open(['action' => 'PostsController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'body')}}
            {{Form::textarea('body', '', ['class'=>'form-control', 'placeholder'=>'Body Text'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection