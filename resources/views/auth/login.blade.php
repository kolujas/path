@extends('layouts.auth')

@section('css')
<link href={{ asset('css/auth/login.css') }} rel="stylesheet">
@endsection

@section('title')
Log In Path
@endsection

@section('main')
<section class="centrar-form col-10">
    <div class="col-12 col-lg-6 form-image-container d-none d-lg-block p-0">
        <img class="img-fluid" src="img/recursos/form-image.jpg" alt="">
    </div>
    <form class="col-10 col-lg-6" method="post">
        <div class="text-center my-4">
            <!-- <img src="img/recursos/logo.png" alt="Logo de path"> -->
            <h2 class="text-center text-uppercase mb-2">Path</h2>
        </div>
        <div class="form-group">
            <!-- <label class="text-white text-lg-dark" for="email">Email</label> -->
            <input id="email" type="number" name="usuario" class="form-control col-md-6 mx-md-auto col-lg-10 col-xl-8"
                placeholder="Usuario">
        </div>
        <div class="form-group mt-4">
            <!-- <label class="text-white text-lg-dark" for="pass">Contraseña</label> -->
            <input id="pass" type="password" name="clave" class="form-control col-md-6 mx-md-auto col-lg-10 col-xl-8"
                placeholder="Contraseña">
        </div>
        <div class="col-12 col-lg-10 col-xl-8 ml-lg-3 ml-xl-5 d-flex justify-content-center d-lg-block">
            <button type="submit" class="ingresarBtn btn background background-one text-white mt-2">Ingresar</button>
        </div>

    </form>
</section>
@endsection

@section('js')
<script type="module" src={{ asset('js/auth/login.js') }}></script>
@endsection
