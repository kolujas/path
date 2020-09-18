@extends('layouts.exam')

@section('css')
<link href={{ asset('css/exams/example-exam.css') }} rel="stylesheet">
@endsection

@section('nav')
@component('components.nav.exam', ['current' => 'example-exam'])
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
    <div class="row px-4 justify-content-lg-center">
        <section id="dropdown-question-1" class="question dropdown dropdown-click closed col-12 col-lg-10 mb-4 mt-5">
            <a href="#" class="dropdown-header">
                <span>1. Match the words to the images.<mark>One is done for you.</mark></span>
                <button class="dropdown-button">
                    <i class="dropdown-icon fas fa-sort-down"></i>
                </button>
            </a>
            <main class="dropdown-menu-content">
                <div>
                    <ol class="my-4 answer-words d-flex justify-content-around justify-content-lg-center">
                        <li class="inline mx-lg-2">Bedroom</li>
                        <li class="inline mx-lg-2">Garden</li>
                        <li class="inline mx-lg-2">Kitchen</li>
                        <li class="inline mx-lg-2">Lounge</li>
                        <li class="inline mx-lg-2">Bathroom</li>
                    </ol>
                </div>
                <div class="row justify-content-md-between justify-content-lg-center">


                    <div class="mb-5 col-md-6 col-lg-2 card-min-width">
                        <div class="card">
                            <img src="../../img/recursos/form-image.jpg" class="img-fluid" alt="image-one-question-one">
                            <div class="card-body mx-auto">
                                <input class="input-one-question-one" type="text" name="answer_one">
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 col-md-6 col-lg-2 card-min-width">
                        <div class="card">
                            <img src="../../img/recursos/form-image.jpg" class="img-fluid" alt="image-one-question-one">
                            <div class="card-body mx-auto">
                                <input class="input-one-question-one" type="text" name="answer_two">
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 col-md-6 col-lg-2 card-min-width">
                        <div class="card">
                            <img src="../../img/recursos/form-image.jpg" class="img-fluid" alt="image-one-question-one">
                            <div class="card-body mx-auto">
                                <input class="input-one-question-one" type="text" name="answer_three">
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 col-md-6 col-lg-2 card-min-width">
                        <div class="card">
                            <img src="../../img/recursos/form-image.jpg" class="img-fluid" alt="image-one-question-one">
                            <div class="card-body mx-auto">
                                <input class="input-one-question-one" type="text" name="answer_four">
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 col-md-6 col-lg-2 card-min-width">
                        <div class="card">
                            <img src="../../img/recursos/form-image.jpg" class="img-fluid" alt="image-one-question-one">
                            <div class="card-body mx-auto">
                                <input class="input-one-question-one" type="text" name="answer_five">
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </section>
        <section id="dropdown-question-2" class="question dropdown dropdown-click closed col-12 col-lg-10 mb-4">
            <a href="#" class="dropdown-header">
                <span>2. Complete</span>
                <button class="dropdown-button">
                    <i class="dropdown-icon fas fa-sort-down"></i>
                </button>
            </a>
            <main class="dropdown-menu-content second-question-container">
                <p>In the bedroom, I can see <strong>a bed</strong> and <input class="input-one-question-two"
                        type="text"></p>
                <p>In the bathroom, I can see <input class="input-one-question-two" type="text"> and <input
                        class="input-one-question-two" type="text"></p>
                <p>In the kitchen, I can see <input class="input-one-question-two" type="text"> and <input
                        class="input-one-question-two" type="text"></p>
            </main>
        </section>
        <section id="dropdown-question-3" class="question dropdown dropdown-click closed col-12 col-lg-10 mb-4">
            <a href="#" class="dropdown-header">
                <span>3. Complete the names of the animals.<mark>One is done for you.</mark></span>
                <button class="dropdown-button">
                    <i class="dropdown-icon fas fa-sort-down"></i>
                </button>
            </a>
            <main class="dropdown-menu-content second-question-container">

            </main>
        </section>
        <section id="dropdown-question-4" class="question dropdown dropdown-click closed col-12 col-lg-10 mb-4">
            <a href="#" class="dropdown-header">
                <span>4a. Read about Alice, then fill the spaces with <strong>am, is </strong>or <strong>are</strong>.<mark>One is done for you.</mark></span>
                <button class="dropdown-button">
                    <i class="dropdown-icon fas fa-sort-down"></i>
                </button>
            </a>
            <main class="dropdown-menu-content second-question-container">
                <div>
                    <p>Hello! My friend Beth and I <input class="input-underline input-one-question-four" type="text"> good friends. She <input class="input-underline input-one-question-four" type="text">10 years old and I <input class="input-underline input-one-question-four" type="text">.My hair <input class="input-underline input-one-question-four" value="is" type="text">short. Beth's hair <input class="input-underline input-one-question-four" type="text">long. </p>
                </div>
            </main>
        </section>

        <section id="dropdown-question-5" class="question dropdown dropdown-click closed col-12 col-lg-10 mb-4">
            <a href="#" class="dropdown-header">
                <span>4b. Who is Alice? Who is Beth? Write their names under the pictures.</span>
                <button class="dropdown-button">
                    <i class="dropdown-icon fas fa-sort-down"></i>
                </button>
            </a>
            <main class="dropdown-menu-content second-question-container">
                <div class="row">
                    <div class="mb-5 col-md-6 col-lg-2 card-min-width">
                            <div class="card">
                                <img src="../../img/recursos/form-image.jpg" class="img-fluid" alt="image-one-question-one">
                                <div class="card-body mx-auto">
                                    <input class="input-one-question-one" type="text" name="answer_five_one">
                                </div>
                            </div>
                        </div>
                        <div class="mb-5 col-md-6 col-lg-2 card-min-width">
                        <div class="card">
                            <img src="../../img/recursos/form-image.jpg" class="img-fluid" alt="image-one-question-one">
                            <div class="card-body mx-auto">
                                <input class="input-one-question-one" type="text" name="answer_five_two">
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </section>
        <section id="dropdown-question-6" class="question dropdown dropdown-click closed col-12 col-lg-10 mb-4">
            <a href="#" class="dropdown-header">
                <span>5. Write about your friend.</span>
                <button class="dropdown-button">
                    <i class="dropdown-icon fas fa-sort-down"></i>
                </button>
            </a>
            <main class="dropdown-menu-content fifth-question-container">
                <div class="row">
                    <div class="mx-auto mb-5 mt-0 position-relative">
                        <span class="my-friend">My friend:</span>
                        <textarea name="data_text" class="pl-2"></textarea>
                    </div>
                </div>
            </main>
        </section>
        
    </div>
</section>
@endsection

@section('js')
<script type="module" src={{ asset('js/exams/example-exam.js') }}></script>
@endsection

@section('footer')
<!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection
