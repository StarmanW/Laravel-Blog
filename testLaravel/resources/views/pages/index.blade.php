@extends('templates.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit nulla ac enim pellentesque venenatis. Aenean a venenatis ipsum.</p>
        <p>
            <a href="/login" class="btn btn-primary btn-lg" role="button" style="margin-right: 1%;">LOGIN</a>
            <a href="/register" class="btn btn-success btn-lg" role="button">SIGN UP</a>
        </p>
    </div>
@endsection
