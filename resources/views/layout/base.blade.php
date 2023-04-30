    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ url('css/general.css') }}" >
        <title>@yield('title')</title>
        @yield('links')
    </head>

        @include('inc.header')
        <body>
            @yield('body')
        </body>

        <footer>
            @yield('footer')
        </footer>
    </html>