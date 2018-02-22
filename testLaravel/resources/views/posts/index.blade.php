@extends('templates.app')

@section('content')
    <h1 class="text-center">Posts</h1>
    <div class="container col-lg-10">
        {{$posts->links()}}
    </div>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="container col-lg-10">
                <div class="well border" style="background:#eaeaea;padding:3%; margin-bottom: 2%;">
                    <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                    <small>Written on {{$post->created_at}}</small>
                    <p>{{$post->body}}</p>
                </div>
            </div>
        @endforeach
        <div class="container col-lg-10">
            {{$posts->links()}}
        </div>
    @else
        <p>No post found.</p>
    @endif
@endsection