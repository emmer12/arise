<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> ::Arise Room::</title>
    <!-- {{ config('app.name', '::Arise Room::') }} -->
    <!-- Scripts -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href={{asset('fonts/Montserrat-Black.ttf') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

   
 
</head>

<body>
    <div id="app">
       @include('partials.nav')
        <main class="">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        let el=document.querySelector('#bar');
        let drop=document.querySelector('.drop');
        el.addEventListener('click',function(e){
             drop.classList.toggle('added')          
        })
        new WOW().init()
    </script>
</body>
</html>
