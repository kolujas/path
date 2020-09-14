@extends('layouts.auth')

@section('css')
    <link href={{ asset('css/auth/login.css') }} rel="stylesheet">
@endsection

@section('title')
    Log In Path
@endsection

@section('main')    
    <section class="centrar-form mx-auto">        
        <form class="col-12" method="post">
            <div class="text-center mb-5">
                <h2 class="h2">Ingresá para comenzar</h2>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="correo" class="form-control">
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input id="pass" type="password" name="clave" class="form-control">
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn background background-one text-white">Ingresar</button>
            </div>
            
        </form>
    </section>
@endsection

@section('js')
    <script type="module" src={{ asset('js/auth/login.js') }}></script>
@endsection