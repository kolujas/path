@extends('layouts.panel')

@section('css')
    <link href={{ asset('css/exams/panel.css') }} rel="stylesheet">
@endsection

@section('title')
    Admin panel - Exams
@endsection

@section('main')

@endsection

@section('js')
    <script type="module" src={{ asset('js/exams/panel.js') }}></script>
@endsection

@section('footer')
    @component('components.footer.global', [])
    @endcomponent
@endsection