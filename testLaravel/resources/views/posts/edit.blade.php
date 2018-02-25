@extends('templates.app')
@section('title')Editing {!! $post->title !!}@endsection

@section('content')
    <h1 class="text-center">Editing Post - {!! $post->title !!}</h1>
    <div class="container col-lg-10">
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'body')}}
            {{Form::textarea('body', $post->body, ['class'=>'form-control', 'placeholder'=>'Body Text'])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}

        <div class="row justify-content-center">
            {{Form::submit('Update', ['class'=>'btn btn-success'])}}&nbsp;
            {{Form::reset('Reset', ['class'=>'btn btn-primary'])}}&nbsp;
            <a class="btn btn-primary" href="/posts/">Back</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection