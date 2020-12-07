@extends('layouts.exam')

@section('css')
    <link href={{ asset('css/exams/rules.css') }} rel="stylesheet">
@endsection

@section('nav')
    <div class="rules-header text-center mb-5">
        <div class="background background-linear mb-4">
            <img class="logo" src={{ asset('img/recursos/logo_white.png') }} alt="Path">
            <h1 class="h1">Path</h1>
        </div>
        @if ($evaluation->candidate->full_name)
            <span class="text-center pt-3">Hi, <b>{{ $evaluation->candidate->full_name }}</b>!</span>
        @endif
        <h2 class="mb-2">{{ $evaluation->exam->name }}@if($evaluation->candidate && $evaluation->candidate->member): {{$evaluation->candidate->member}}@endif</h2>
        <span class="text-center timer">Your exam will start in...</span>
        <div class="spans-timer">
            <span class="ml-4 hours">Hours</span>
            <span class="ml-4 mr-5">Minutes</span>
            <span>Seconds</span>
        </div>
        
        <div class="clock m-auto">
			<div class='second-hand'>I</div>
		</div>
    </div>
@endsection

@section('title')
    Rules
@endsection

@section('main')
    <section class="col-12 rules-container">
        <main class="rules-box">
            <form id="rules-form" action="/auth/exam/{{$evaluation->id_evaluation}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="rules-text bg-white p-4">
                    <p class="h3 rules-rem text-left mb-4">Remember:</p>
                    <p class="rules-p">{{ $evaluation->exam->rules }}</p>
                </div>
                @if (!$evaluation->confirmed)
                    <div class="form-check checkbox-container col-lg-6 mt-2 pb-2 ml-4" title="Required">
                        <input class="form-input form-check-input" type="checkbox" name="confirmed" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            I have read and understood the exam rules
                        </label>
                    </div>
                    @if($errors->has("confirmed"))
                        <span class="support support-box support-confirmed col-12 pl-4 hidden">{{ $errors->first("confirmed") }}</span>
                    @else
                        <span class="support support-box support-confirmed col-12 pl-4 hidden"></span>
                    @endif
                    <div class="input-group col-12 mt-5 pb-5">
                        <div class="row d-flex justify-content-center w-100 pl-4">
                            <div class="col-12 col-md-3 d-flex justify-content-center pb-4 p-0">
                                <button type="submit" class="form-submit rules-form btn btn-one">Start</button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="input-group col-12 mt-5 pb-5">
                        <div class="row d-flex justify-content-center w-100 pl-4">
                            <div class="col-12 col-md-3 d-flex justify-content-center pb-4 p-0">
                                <a href="/exam/{{ $evaluation->id_evaluation }}" class="btn btn-one">Start</a>
                            </div>
                        </div>
                    </div>
                @endif
            </form>

            <div class="example-exam-logout floating-menu top right">
                <a href="/logout" class="btn btn-one mr-4 hidden logout-lobby">
                    <span class="link-text"><i class="fas fa-sign-out-alt mr-2"></i>LOGOUT</span>
                </a>
            </div>

        </main>
    </section>
@endsection

@section('js')
    <script>
        const evaluation = @json($evaluation);
        @if(Session::has('status'))
        const status = @json(Session::get('status'));
        @elseif(isset($status))
        const status = @json($status);
        @endif
        const rules = @json($validation->rules);
        const messages = @json($validation->messages);
    </script>
    <script type="module" src={{ asset('js/exams/rules.js') }}></script>
@endsection

@section('footer')
    <!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection
