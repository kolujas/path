@extends('layouts.index')

@section('head')
    <!-- Layout CSS -->
    <link href={{ asset('css/layouts/exam.css') }} rel="stylesheet">

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
    <script type="module" src={{ asset('js/layouts/exam.js?v=1.0.0') }}></script>

    <!-- Section JS -->
    @yield('js')
@endsection