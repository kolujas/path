@extends('layouts.index')

@section('css')
    <link href={{ asset('css/web/panel.css') }} rel="stylesheet">
@endsection

@section('nav')
    @component('components.nav.global', ['current' => 'panel'])
    @endcomponent
@endsection

@section('title')
    Admin panel
@endsection

@section('main')

@endsection

@section('js')
    <script type="module" src={{ asset('js/web/panel.js') }}></script>
@endsection

@section('footer')
    @component('components.footer.global', [])
    @endcomponent
@endsection