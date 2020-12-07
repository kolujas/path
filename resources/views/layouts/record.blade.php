@extends('layouts.index')

@section('head')
    <!-- Layout CSS -->
    <link href={{ asset('css/layouts/record.css') }} rel="stylesheet">

    <!-- Section CSS -->
    @yield('css')

    <title>@yield('title')</title>
@endsection

@section('body')
    <header>
        @yield('nav')
    </header>
            
    <main class="main container-fluid">
        <div class="row">
            @yield('main')
        </div>
    </main>

    <footer> 
        @yield('footer')
    </footer>
@endsection

@section('extras')
    <!-- Layout CSS -->
    <script type="module" src={{ asset('js/layouts/record.js') }}></script>

    <!-- Section JS -->
    @yield('js')
@endsection