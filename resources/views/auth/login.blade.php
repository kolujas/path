@extends('layouts.auth')

@section('css')
    <link href={{ asset('css/auth/login.css') }} rel="stylesheet">
@endsection

@section('title')
    Log In Path
@endsection

@section('main')
    <section class="centrar-form col-12 col-lg-10">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-4 form-image-container d-none d-lg-block p-0">
                <img class="img-fluid" src={{ asset('img/recursos/background/auth.jpg') }} alt="Visual image">
            </div>
            <form id="login-form" class="col-10 col-lg-6 col-xl-4 p-lg-4 px-xl-5" method="post" action="">
                @csrf
                <div class="text-center">
                    <picture>
                        <source class="logo" srcset="{{ asset('img/recursos/logo_white.png') }}" media="(max-width: 768px)">
                        <img class="logo" src="{{ asset('img/recursos/logo.png') }}" alt="Path">
                    </picture>
                    <!-- <h2 class="text-center text-uppercase m-0">Path</h2> -->
                </div>
                <div class="form-group mb-4 position-relative">
                    <input id="data" type="text" name="data" class="form-input form-control col-md-6 mx-md-auto col-lg-10 col-xl-12"
                        placeholder="Username" title="Required">
                    @if($errors->has("data"))
                        <span class="support support-box support-data hidden col-md-6 mx-md-auto col-lg-10 col-xl-12">{{ $errors->first("data") }}</span>
                    @else
                        <span class="support support-box support-data hidden col-md-6 mx-md-auto col-lg-10 col-xl-12"></span>
                    @endif
                </div>
                <div class="form-group mb-5 position-relative">
                    <label for='password' class="see-password">
                        <i class="fas fa-eye"></i>
                    </label>
                    <input id="password" type="password" name="password" class="form-input form-control col-md-6 mx-md-auto col-lg-10 col-xl-12"
                        placeholder="Password" title="Required">
                    @if($errors->has("password"))
                        <span class="support support-box support-password hidden col-md-6 mx-md-auto col-lg-10 col-xl-12">{{ $errors->first("password") }}</span>
                    @else
                        <span class="support support-box support-password hidden col-md-6 mx-md-auto col-lg-10 col-xl-12"></span>
                    @endif
                </div>
                <div class="col-12 col-md-6 mx-md-auto col-lg-10 col-xl-12 p-0 d-flex justify-content-center d-lg-block">
                    <button type="button" class="form-submit login-form btn btn-two loading-dots"></button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script>
        @if(Session::has('status'))
        const status = @json(Session::get('status'));
        @elseif(isset($status))
        const status = @json($status);
        @endif
        const rules = @json($validation->rules);
        const messages = @json($validation->messages);
    </script>
    <script type="module" src={{ asset('js/auth/login.js?v=1.0.0') }}></script>
@endsection