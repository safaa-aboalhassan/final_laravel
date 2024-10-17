<!DOCTYPE html>
<html lang="en" dir="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<x-nav.navbar />

<section class="container">
    
@yield('body')

</section>
<x-foot.footer />
@yield('js')
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>