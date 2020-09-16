@extends('layouts.exam')

@section('css')
    <link href={{ asset('css/exams/exam-1.css') }} rel="stylesheet">
@endsection

@section('nav')
    @component('components.nav.exam', ['current' => 'exam-1'])
    @endcomponent
@endsection

@section('title')
    Path
@endsection

@section('main')
    <!-- <section class="col-12 mt-4">
        <main class="row">
            <div class="col-4">
                <button type="button" class="btn btn-info text-white text-uppercase">Module 1: writing</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-info text-white text-uppercase">Module 2: listening</button>
            </div>
        </main>
    </section> -->
    <section class="questions col-12">
        <div class="row">
            <section id="dropdown-question-1" class="question dropdown dropdown-click closed col-12">
                <a href="#" class="dropdown-header">
                    <span><i class="fas fa-alert"></i>Pregunta salvaje</span>
                    <button class="dropdown-button">
                        <i class="dropdown-icon fas fa-sort-down"></i>
                    </button>
                </a>
                <main class="dropdown-menu-content">
                    <header>
                        <h2>¿Está usted seguro de que le gusta el arte?</h2>
                    </header>
                    <div>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </main>
            </section>
            <section id="dropdown-question-2" class="question dropdown dropdown-click closed col-12">
                <a href="#" class="dropdown-header">
                    <span><i class="fas fa-alert"></i>Pregunta salvaje</span>
                    <button class="dropdown-button">
                        <i class="dropdown-icon fas fa-sort-down"></i>
                    </button>
                </a>
                <main class="dropdown-menu-content">
                    <header>
                        <h2>¿Está usted seguro de que le gusta el arte?</h2>
                    </header>
                    <div>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </main>
            </section>
        </div>
    </section>
    <!-- <section class="col-12 mt-4">
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
    </section>
    <section class="pregunta-3 position-relative border">
        <span class="border rounded-circle border-info text-info text-center">3</span>
        <ol class="pl-0 pt-3" type="a">
            <li class="pr-1">Read about Alice, then fill spaces with am, is or are.</li>
        <ol>
    </section> -->
@endsection

@section('js')
    <script type="module" src={{ asset('js/exams/example-exam.js') }}></script>
@endsection

@section('footer')
    <!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection