@extends('layouts.panel')

@section('css')
    <link href={{ asset('css/records/panel.css') }} rel="stylesheet">
@endsection

@section('title')
    Admin panel - Records
@endsection

@section('main')

@endsection

@section('js')
    <script type="module" src={{ asset('js/records/panel.js') }}></script>
@endsection

@section('footer')
    @component('components.footer.global', [])
    @endcomponent
@endsection