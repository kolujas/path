@extends('layouts.exam')

@section('css')
    <link href={{ asset('css/exams/rules.css') }} rel="stylesheet">
@endsection

@section('nav')
    <div class="text-center mb-5">
        <div class=" background background-linear mb-4">
            <img class="logo" src={{ asset('img/recursos/logo_white.png') }} alt="Path">
            <h1 class="h1">Path</h1>
        </div>
        <h2 class="mb-2">{{ $exam->name }}</h2>
        <span class="text-center timer">Scheduled time: {{ $exam->scheduled_date_time }}</span>
        {{-- <span class="text-center timer">
            <span class="hour">10684</span>
            <span class="dots">:</span>
            <span class="minute">06</span>
            <span class="dots">:</span>
            <span class="second">06</span>
        </span> --}}
    </div>
@endsection

@section('title')
    Rules
@endsection

@section('main')
    <section class="col-12 rules-container">
        <main class="rules-box">
            <form id="rules-form" action="/auth/exam/{{$exam->id_exam}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="rules-text bg-white p-4">
                    <p class="h3 rules-rem text-left text-uppercase mb-0 text text-one">Remember:</p>
                    <p class="rules-p">{{ $exam->rules }}</p>
                </div>
                <div class="form-check checkbox-container col-lg-6 mt-2 pb-2 ml-4" title="Required">
                    <input class="form-input form-check-input" type="checkbox" name="accept" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        I have read and understand the exam rules
                    </label>
                </div>
                @if($errors->has("accept"))
                    <span class="support support-box support-accept col-12 pl-4 hidden">{{ $errors->first("accept") }}</span>
                @else
                    <span class="support support-box support-accept col-12 pl-4 hidden"></span>
                @endif
                <div class="input-group col-12 mt-5 pb-5">
                    <div class="row d-flex justify-content-center w-100 pl-4">
                        <div class="col-12 col-md-3 p-0 mb-4">
                            <input id="ID"
                                class="form-input input-maked"
                                type="file"
                                name="ID"
                                data-text="ID"
                                data-notfound="Image not choose." title="Required">
                            @if($errors->has("ID"))
                                <span class="support support-box support-ID hidden">{{ $errors->first("ID") }}</span>
                            @else
                                <span class="support support-box support-ID hidden"></span>
                            @endif
                        </div>
                        <div class="col-12 col-md-3 d-flex justify-content-center pb-4 p-0">
                            <button type="submit" class="form-submit rules-form btn btn-one">Start</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </section>
@endsection

@section('js')
    <script>
        const exam = @json($exam);
        @if(Session::has('status'))
        const status = @json(Session::get('status'));
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
