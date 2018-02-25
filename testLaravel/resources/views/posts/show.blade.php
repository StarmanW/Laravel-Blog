@extends('templates.app')
@section('title'){!! $post->title !!}@endsection
@section('content')
    <div class="container col-lg">
        <div class="well border" style="background:#eaeaea;padding:3%; margin-bottom: 2%;">
            <h1 class="text-center">{!! $post->title !!}</h1>
            <p class="text-center" style="font-size: 90%">Written
                on <?php echo date_format($post->created_at, "Y F d");?></p>

            <div class="container" style="padding:auto">
                <div class="row justify-content-center">
                    <a class="btn btn-primary" href="/posts/">Back</a>&nbsp;&nbsp;

                    @auth
                        @if(\Illuminate\Support\Facades\Auth::user()->id === $post->user_id)
                        <a class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a>&nbsp;&nbsp;
                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        @endif
                    @endauth
                </div>
            </div>
            <hr>
            <div class="container" style="margin-top: 4%;">
                <p>{!! $post->body !!}</p>
            </div>
        </div>
    </div>
@endsection