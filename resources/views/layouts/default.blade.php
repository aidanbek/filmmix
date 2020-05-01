<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Hello, world!</title>
</head>

@include('components.navbar')
@include('components.header')

<body style="background-color: #212529">

<div class="container">
    <div class="card">
        <div class="card-body">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.selectpicker').selectpicker();
    });
</script>
</body>


</html>
