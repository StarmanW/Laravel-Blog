@extends('templates.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Dashboard</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <a class="btn btn-primary" href="/posts">Browse Blog</a>&nbsp;&nbsp;
                            <a class="btn btn-primary" href="/posts/create">Create New Blog</a>&nbsp;&nbsp;
                        </div>
                        <hr/>
                        <h3>Your Blog Posts</h3>

                        <div class="container" style="margin:auto">
                            <div class="container col-lg-3">
                                {{$posts->links()}}
                            </div>
                            @if(count($posts) > 0)
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <th class="col-lg-10">Blog Post Title</th>
                                    <th class="col-lg-10"></th>
                                    <th class="col-lg-10"></th>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td><a class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                            @csrf
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>You have no posts.</p>
                            @endif
                        </div>
                        <div class="container col-lg-3">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
