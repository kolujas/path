<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/home.css') }}" rel="stylesheet">

<body>
    <header>
        <nav class="navbar navbar-expand-lg text-white navbar-dark bg-info">
            <a class="navbar-brand text-uppercase" href="#">Path</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                </ul>
            </div>
        </nav>
    </header>
    <section class="container">
        <div class="mt-4">
            <button type="button" class="btn btn-info text-white text-uppercase">Module 1: writing</button>
            <button type="button" disabled class="btn btn-info text-white text-uppercase ml-2">Module 2:
                listening</button>
        </div>
        <div class="mt-5">
            <div class="input-group estilo-select mb-3 w-100">
                <div class="d-flex d-flex justify-content-center align-items-center text-center numeroDePregunta">
                    <span class="border rounded-circle border-info text-info">1</span>
                </div>
                <select class="custom-select text-primary pregunta-1 pl-5">
                    <option selected>Match the words to the images.</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="input-group estilo-select mb-3 w-100">
                <div class="d-flex d-flex justify-content-center align-items-center text-center numeroDePregunta">
                    <span class="border rounded-circle border-info text-info">2</span>
                </div>
                <select class="custom-select text-primary pregunta-1 pl-5">
                    <option selected>Complete the names of the animals</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
        <div class="pregunta-3 position-relative border">

            <span class="border rounded-circle border-info text-info text-center">3</span>
            <ol class="pl-0 pt-3" type="a">
                <li class="pr-1">Read about Alice, then fill spaces with am, is or are.</li>
            <ol>
        </div>
    </section>
    <script type="module" src={{asset('js/jquery/jquery-3.0.0.min.js')}}></script>
    <script type="module" src={{asset('js/popper/popper.min.js')}}></script>
    <script type="module" src={{asset('js/app.js')}}></script>
    <script type="module" src={{asset('js/layout/home.js')}}></script>
</body>

</html>
