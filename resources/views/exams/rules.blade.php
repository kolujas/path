@extends('layouts.exam')

@section('css')
    <link href={{ asset('css/exams/rules.css') }} rel="stylesheet">
@endsection

@section('nav')
    <div class="text-center mb-5">
        <h2 class="h1 mb-4 background background-linear">{{ $exam->name }}</h2>
        <span class="text-center timer">Scheduled time: {{ $exam->scheduled_date_time }}</span>
    </div>
@endsection

@section('title')
    Rules
@endsection

@section('main')
    <section class="col-12 rules-container">
        <main class="rules-box mt-4">
            <form action="auth/exam/{{$exam->id_exam}}" method="post" enctype="multipart/form-data">
                @csrf
                <p class="h3 text-left text-uppercase mt-4 pl-4 text text-one">Rememeber:</p>
                <p class="rules-p mt-3 px-4">{{ $exam->rules }}</p>
                <div class="form-check checkbox-container col-lg-6 mt-2 pb-2 ml-4" title="Required">
                    <input class="form-check-input" type="checkbox" name="accept" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        I have read and understand the exam rules
                    </label>
                </div>
                @if($errors->has("accept"))
                    <span class="support support-box support-accept error col-12 pl-4">{{ $errors->first("accept") }}</span>
                @else
                    <span class="support support-box support-accept error col-12 pl-4"></span>
                @endif
                <div class="input-group col-12 mt-5 pb-5">
                    <div class="row d-flex justify-content-between w-100 pl-4">
                        <div class="col-5 p-0">
                            <input id="ID"
                                class="input-maked"
                                type="file"
                                name="ID"
                                data-text="ID"
                                data-notfound="Image not choose." title="Required">
                            @if($errors->has("ID"))
                                <span class="support support-box support-ID error">{{ $errors->first("ID") }}</span>
                            @else
                                <span class="support support-box support-ID error"></span>
                            @endif
                        </div>
                        <div class="col-5 d-flex justify-content-end pb-4 p-0">
                            <button type="submit" class="btn btn-one">Start</button>
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
    </script>
    <script type="module" src={{ asset('js/exams/rules.js') }}></script>
@endsection

@section('footer')
    <!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection
