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
            <img class="img-fluid" src={{ asset('img/recursos/form-image.jpg') }} alt="Visual image">
        </div>
        <form class="col-10 col-lg-6 p-lg-4" method="post" action="login">
            @csrf
            <div class="text-center mb-4">
                <img class="logo" src={{ asset('img/recursos/logo.png') }} alt="Logo de path">
                <!-- <h2 class="text-center text-uppercase m-0">Path</h2> -->
            </div>
            <div class="form-group mb-4">
                <input id="data" type="text" name="data" class="form-control col-md-6 mx-md-auto col-lg-10 col-xl-8"
                    placeholder="User Name" title="Required">
                @if($errors->has("data"))
                    <span class="support support-box support-data error w-full">{{ $errors->first("data") }}</span>
                @else
                    <span class="support support-box support-data error w-full"></span>
                @endif
            </div>
            <div class="form-group mb-4 position-relative">
                <label for='password' class="see-password">
                    <i class="fas fa-eye"></i>
                </label>
                <input id="password" type="password" name="password" class="form-control col-md-6 mx-md-auto col-lg-10 col-xl-8"
                    placeholder="Password" title="Required">
                @if($errors->has("password"))
                    <span class="support support-box support-password error w-full">{{ $errors->first("password") }}</span>
                @else
                    <span class="support support-box support-password error w-full"></span>
                @endif
            </div>
            <div class="col-12 col-lg-10 mx-lg-auto col-xl-8 p-0 d-flex justify-content-center d-lg-block">
                <button type="submit" class="btn btn-two-transparent">Log In</button>
            </div>
        </form>
    </section>
@endsection

@section('js')
    <script>
        @if(Session::has('status'))
        const status = @json(Session::get('status'));
        @endif
    </script>
    <script type="module" src={{ asset('js/auth/login.js') }}></script>
@endsection