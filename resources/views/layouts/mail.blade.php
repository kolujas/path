<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <style>
            body {
                background-image: linear-gradient(45deg, #0B5F83, #004D64);
            }
        </style>
        @yield('css')
    </head>
    <body>
        <img src="{{ asset('img/recursos/logo_white.png') }}" style=" width: 100%; height: 10rem; object-fit: contain;" alt="Path logo">
        @yield('body')
    </body>
</html>