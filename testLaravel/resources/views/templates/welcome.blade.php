@extends('templates.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Welcome to StarmanW's Blogging, {{ $user->name }}!</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        You have successfully logged in!
                        <hr/>
                        <div class="container">
                            <a class="btn btn-primary" href="/posts">Browse Blog</a>&nbsp;&nbsp;
                            <a class="btn btn-primary" href="/posts/create">Create New Blog</a>&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
