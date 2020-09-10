<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <!--Import Google Icon Font-->

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!-- External repositories CSS -->
        <!-- <link href="{{ asset('/submodules/FloatingMenuJS/css/styles.css') }}" rel="stylesheet">

        <link href="{{ asset('submodules/DropdownJS/css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('submodules/SidebarJS/css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('submodules/NavMenuJS/css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('submodules/TabMenuJS/css/styles.css') }}" rel="stylesheet"> -->

        <!-- Layout CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout/home.css') }}" rel="stylesheet">

        <!-- Section CSS -->
        @yield('css')

        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            @yield('nav')
        </header>
                
        <main class="main container-fluid">
            <div class="flex flex-col md:flex-row">
                @yield('main')
            </div>
        </main>

        <footer> 
            @yield('footer')
        </footer>

        <!-- Layout JS -->
        <script type="module" src={{asset('js/jquery/jquery-3.0.0.min.js')}}></script>
        <script type="module" src={{asset('js/popper/popper.min.js')}}></script>
        <script type="module" src={{asset('js/app.js')}}></script>
        <script type="module" src={{asset('js/layout/home.js')}}></script>

        @yield('js')
    </body>
</html>
