<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel & VUE</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-p-3 mb-2 text-white" style="background-color: #002752;">
    <!--Logo de navbar-->
    <a class="navbar-brand" href="{{url('/')}}"><img src="https://umg.edu.gt/assets/umg.png" alt="" width="80" class="rounded-circle"></a>
</nav>
<div class="container">

    @yield('content')

</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
