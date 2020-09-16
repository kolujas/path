@extends('layouts.index')

@section('head')
    <!-- Layout CSS -->
    <link href={{ asset('css/layouts/auth.css') }} rel="stylesheet">

    <!-- Section CSS -->
    @yield('css')

    <title>@yield('title')</title>
@endsection

@section('body')
    <main class="main container-fluid">
        <div class="row d-flex justify-content-center form-container">
            @yield('main')
        </div>
    </main>
@endsection

@section('extras')
    <!-- Layout CSS -->
    <script src={{ asset('js/layouts/auth.js') }}></script>

    <!-- Section JS -->
    @yield('js')
@endsection