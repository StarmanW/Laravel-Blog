@extends('templates.app')
@section('title', 'Create Post')

@section('content')
    <h1 class="text-center">Create Post</h1>
    <div class="container col-lg-10">
        {!! Form::open(['action' => 'PostsController@store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'title'])}}
        </div>

        <div class="form-group">
            {{Form::label('body', 'body')}}
            {{Form::textarea('body', '', ['class'=>'form-control', 'placeholder'=>'Body Text'])}}
        </div>

        <div class="container" style="padding:auto">
            <div class="container">
                {{Form::file('cover_image')}}
            </div>
            <div class="row justify-content-center">
                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}&nbsp;&nbsp;
                {{Form::reset('Reset', ['class'=>'btn btn-primary'])}}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection