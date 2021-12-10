@extends('layouts.panel')

@section('css')
    <link href={{ asset('css/exams/panel.css') }} rel="stylesheet">
@endsection

@section('title')
    Admin panel - Exams
@endsection

@section('main')
    <div id="tab-exams" class="col-12 relative tab-menu vertical p-0">
        <section class="tabs background background-linear">
            @component('components.tab.tab.panel')
            @endcomponent
        </section>

		<section class="tab-content-list mx-auto">
            @component('components.tab.content.exams')
            @endcomponent
		</section>
    </div>
    
    <div class="panel floating-menu bottom right">
        <button class="add-data floating-button">
            <i class="fas fa-plus"></i>
        </button>
    </div>

    @component('components.modal.csv')
    @endcomponent
@endsection

@section('js')
    <script>
        @if($errors->any())
        const errors = @json($errors->messages());
        @else
        const errors = [];
        @endif
        @if(Session::has('status'))
        const status = @json(Session::get('status'));
        @endif
        const validation = @json($validation);
        const exams = @json($exams);
        const candidates = @json($candidates);
    </script>
    <script type="module" src={{ asset('js/exams/panel.js?v=1.0.0') }}></script>
@endsection

@section('footer')
    {{-- @component('components.footer.global', [])
    @endcomponent --}}
@endsection