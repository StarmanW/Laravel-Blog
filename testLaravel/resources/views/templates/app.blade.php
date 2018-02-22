<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{config('app.name', 'StarmanW')}}</title>
</head>
<body>
    @include('templates.navbar')
    <div class="container" style="margin-top:2%">
        @yield('content')
    </div>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>