<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @yield('meta')
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
@include('partials/navbar')
<div class="container content">
    @yield('content')
</div>
<script src="/js/all.js"></script>
</body>
</html>
