@extends('templates.app')
@section('title', 'Browse Blog')

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
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" />
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h2><a href="/posts/{{$post->id}}">{!! $post->title !!}</a></h2>
                                <small>Written on <?php echo date_format($post->created_at, "Y F d");?> by {{$post->user->name}}</small>
                            </div>
                        </div>
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