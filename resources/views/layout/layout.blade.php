<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title", config("app.name"))</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset("css/app.css") }}"/>
    @stack("styles")

    <script type="text/javascript" src="{{ asset("js/app.js") }}"></script>
    @stack("scripts")

</head>
<body>
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
@endif
@yield("content")
</body>
</html>
