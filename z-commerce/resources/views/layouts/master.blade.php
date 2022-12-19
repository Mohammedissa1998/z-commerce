<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('head')    
</head>
<body>
    
    @include('layouts.partials.nav')
    <main class="page">
    @yield('content')
    </main>
    @include('layouts.partials.footer')

    <script src="{{asset('js/admin.js')}}"></script>
    @stack('script')
</body>
</html>