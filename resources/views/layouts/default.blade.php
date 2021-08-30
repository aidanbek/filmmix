<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" href="{{ asset('favicon.png')}}">
</head>

@include('components.navbar', compact('navbarLinkGroups'))
@include('components.header')

<body>

<div class="container">
    <div class="card">
        <div class="card-body">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
</body>


</html>
