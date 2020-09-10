
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!-- External repositories CSS -->
        <link rel="stylesheet" href="{{asset('submodules/SidebarJS/css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('submodules/NavMenuJS/css/styles.css')}}">

        <!-- Layout CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

        <!-- Section CSS -->
        @yield('head')
    </head>
    <body>
        @yield('body')

        <!-- Layout JS -->
        <script type="module" src={{asset('js/app.js')}}></script>

        <!-- Added extras section -->
        @yield('extras')
    </body>
</html>