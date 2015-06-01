<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paste - G-Works Oy</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"/>
</head>
<body>
    <header class="top-menu">
        <div class="header-content">@yield('header')</div>
        <h1><img class="logo" src="{{ asset('img/gworks.png') }}"></h1>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="{{ asset('ace/ace.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>