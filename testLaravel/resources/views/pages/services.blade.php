@extends('templates.app')
@section('title', 'Services')

@section('content')
    <div class="container text-center col-md-6">
        <h1>{{$title}}</h1>
        <hr />
        @if(count($services) > 0)
            <ul class="list-group" >
                @foreach($services as $service)
                    <li class="list-group-item">{!! $service !!}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
