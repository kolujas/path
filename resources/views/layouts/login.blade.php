@extends('layouts.index')

@section('head')
    <!-- Layout CSS -->
    <link href="{{ asset('css/layouts/login.css') }}" rel="stylesheet">

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
@endsection

@section('extras')
    <!-- Layout CSS -->
    <script src="{{asset('js/layouts/login.js')}}"></script>

    <!-- Section JS -->
    @yield('js')
@endsection