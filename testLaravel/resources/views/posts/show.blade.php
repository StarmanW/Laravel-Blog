@extends('templates.app')

@section('content')

    <div class="container col-lg">
        <div class="well border" style="background:#eaeaea;padding:3%; margin-bottom: 2%;">
            {{--<a href="/posts" class="btn btn-primary btn-md">Back</a>--}}
            <h1 class="text-center">{{$post->title}}</h1>
            <p class="text-sm-center" style="padding-bottom: 2%; font-size: 90%">Written on <?php echo date_format($post->created_at, "Y F d");?> </p>
            <p>{{$post->body}}</p>
        </div>
    </div>
@endsection