@extends('layout.home')

@section('css')
    <!-- <link href={{ asset('css/flickity.css') }} rel="stylesheet" >
    <link href={{ asset('css/slick/slick.css') }} rel="stylesheet" />
    <link href={{ asset('css/slick/slick-theme.css') }} rel="stylesheet" /> -->
    <!-- <link href={{ asset('css/animate/animate.css') }} rel="stylesheet" /> -->
    <!-- <link href={{ asset('submodules/NotificationJS/css/styles.css') }} rel="stylesheet"> -->
    rel="stylesheet">
    <link href={{ asset('css/web/home.css') }} rel="stylesheet">
@endsection

@section('nav')
    @component('components.nav.global', ['current' => 'inicio'])
    @endcomponent
@endsection

@section('title')
    Path
@endsection

@section('main')
    
@endsection

@section('js')
   
    <!-- <script src={{ asset('js/wow/wow.min.js') }}></script> -->
    <script type="module" src={{ asset('js/jquery-3.3.1.min.js') }}></script>
    <!-- <script type="module" src={{ asset('js/slick.js') }}></script>
    <script type="module" src={{ asset('js/flickity.pkgd.min.js') }}></script> -->
    <script type="module" src={{ asset('js/web/home.js') }}></script>
@endsection

@section('footer')
    @component('components.footer.global')
    @endcomponent
@endsection