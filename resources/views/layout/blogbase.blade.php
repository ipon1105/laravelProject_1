<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="{{ url('css/blog.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ url('css/input.css') }}" > 
        @yield('links')
    </head>
   
    @include('inc.bheader')
    <body>
        @yield('body')
    </body>   

    <footer>
        @yield('footer')
    </footer>
</html>