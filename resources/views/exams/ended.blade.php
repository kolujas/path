@extends('layouts.exam')

@section('css')
    <link href={{ asset('css/exams/finished.css') }} rel="stylesheet">
@endsection

@section('title')
    {{ $title }}
@endsection

@section('main')
    <section class="thx col-12 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="logo col-12 d-flex justify-content-center align-items-center">
                <img src={{ asset('img/recursos/logo.png') }} alt="Path logo">
            </div>
            <div class="col-12 text-center mt-4">
                <span class="text">{{ $message }}</span>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="module" src={{ asset('js/exams/finished.js') }}></script>
@endsection