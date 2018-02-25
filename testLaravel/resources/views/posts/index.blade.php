@extends('templates.app')

@section('content')
    <div class="container col-lg-10">
        <h1 class="text-center">Posts</h1>
        <hr/>
        <div class="container col-lg-2">
            {{$posts->links()}}
        </div>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="container">
                    <div class="well border" style="background:#eaeaea;padding:3%; margin-bottom: 2%;">
                        <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                        <small>Written on <?php echo date_format($post->created_at, "Y F d");?></small>
                    </div>
                </div>
            @endforeach
            <div class="container col-sm-2">
                {{$posts->links()}}
            </div>
        @else
            <p>No post found.</p>
        @endif
    </div>
@endsection