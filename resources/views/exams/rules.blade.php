@extends('layouts.auth')

@section('css')
<link href={{ asset('css/exams/rules.css') }} rel="stylesheet">
@endsection

@section('nav')
<!-- @component('components.nav.exam', ['current' => 'exam-1'])
    @endcomponent -->
@endsection

@section('title')
Rules
@endsection

@section('main')
<section class="col-12 rules-container">
    <header class="text-center mb-5">
        <h2 class="h1 mb-4">Titulo del examen</h2>
        <span class="text-center timer">00:13:54</span>
    </header>

    <main class="rules-box mt-4">
        <p class="h3 text-left text-uppercase mt-4 pl-4 text text-one">Recordá:</p>
        <p class="rules-p mt-3 px-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit facilis illo sunt
            dolor sit nisi maiores porro asperiores doloribus totam explicabo impedit voluptatum delectus, tenetur
            velit! Cum ipsum nam reiciendis labore quibusdam quis? Rerum blanditiis quia laborum quis, nobis dolores,
            obcaecati pariatur natus corporis nisi perferendis voluptatibus amet. Dicta, culpa dolorum consectetur ex
            eaque recusandae consequuntur sapiente ipsa excepturi suscipit quidem quae ipsam! Quas quos minus quo ipsa
            amet incidunt nam, voluptate magni distinctio laboriosam, facilis vel ex voluptatibus nobis maiores
            reiciendis? Hic molestiae ratione delectus iusto sed error et sequi deleniti veniam in repudiandae aut est
            atque, repellendus voluptate.</p>
        <div class="form-check checkbox-container mt-2 pb-2 ml-4">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                He leido y entiendo las pautas del examen
            </label>
        </div>
        <div class="input-group col-12 mt-5 pb-5">
            <div class="row d-flex justify-content-around w-100">
                <div class="custom-file col-5">
                    <input type="file" class="custom-file-input" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="inputGroupFile04">Elige tu foto</label>
                </div>
                <div class="col-5 d-flex justify-content-end pb-4">
                    <button type="submit"
                        class="ingresarBtn btn background background-one text-white">Comenzar</button>
                </div>
            </div>

        </div>
    </main>
</section>
@endsection

@section('js')
<script type="module" src={{ asset('js/exams/rules.js') }}></script>
@endsection

@section('footer')
<!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection
