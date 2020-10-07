@extends('layouts.index')

@section('head')
    <!-- Layout CSS -->
    <link href={{ asset('css/layouts/panel.css') }} rel="stylesheet">

    <!-- Section CSS -->
    @yield('css')

    <title>@yield('title')</title>
@endsection

@section('body')
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
    <script type="module" src={{ asset('js/pagination.min.js') }}></script>
    <script type="module" src={{ asset('js/layouts/panel.js') }}></script>

    <!-- Section JS -->
    @yield('js')
@endsection