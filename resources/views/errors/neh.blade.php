<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title', 'Blog test')
    </title>
    <meta name="description" content="@yield('description', 'This test blog')" />
    <meta name="keywords" content="@yield('keywords', 'Blog, category, posts')" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>


    <div id="app">

       <h1>Poshel v zhopu</h1>
    </div>
</body>
</html>
