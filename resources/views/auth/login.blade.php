@extends('layouts.auth')

@section('css')
    <link href={{ asset('css/auth/login.css') }} rel="stylesheet">
@endsection

@section('title')
    Log In Path
@endsection

@section('main')
    <section class="centrar-form col-12 col-lg-10">
        <div class="col-12 col-lg-6 form-image-container d-none d-lg-block p-0">
            <img class="img-fluid" src="img/recursos/form-image.jpg" alt="">
        </div>
        <form class="col-10 col-lg-6 p-lg-4" method="post" action="/login">
            @csrf
            <div class="text-center mb-4">
                <!-- <img src="img/recursos/logo.png" alt="Logo de path"> -->
                <h2 class="text-center text-uppercase m-0">Path</h2>
            </div>
            <div class="form-group mb-4">
                <input id="email" type="text" name="data" class="form-control col-md-6 mx-md-auto col-lg-10 col-xl-8"
                    placeholder="Usuario">
            </div>
            <div class="form-group mb-4">
                <input id="pass" type="password" name="password" class="form-control col-md-6 mx-md-auto col-lg-10 col-xl-8"
                    placeholder="Contraseña">
            </div>
            <div class="col-12 col-lg-10 mx-lg-auto col-xl-8 p-0 d-flex justify-content-center d-lg-block">
                <button type="submit" class="btn btn-two-transparent">Ingresar</button>
            </div>
        </form>
    </section>
@endsection

@section('js')
    <script type="module" src={{ asset('js/auth/login.js') }}></script>
@endsection