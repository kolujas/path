@extends('layouts.panel')

@section('css')
    <link href={{ asset('css/exams/panel.css') }} rel="stylesheet">
@endsection

@section('title')
    Admin panel - Exams
@endsection

@section('main')
    <div id="tab-exams" class="col-12 relative tab-menu vertical p-0">
        <section class="tabs background background-one">
            <header class="tab-header logo">
                <img src={{ asset('img/recursos/logo_white.png') }} alt="Path">
                <h1 class="mb-0">Path</h1>
            </header>

            @component('components.tab.tab.panel')
            @endcomponent

            <footer class="tab-footer">
                <!--  -->
            </footer>
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
@endsection

@section('js')
    <script>
        const rules = @json($validation->rules);
        const messages = @json($validation->messages);
        const exams = @json($exams);
        const candidates = @json($candidates);
    </script>
    <script type="module" src={{ asset('js/exams/panel.js') }}></script>
@endsection

@section('footer')
    {{-- @component('components.footer.global', [])
    @endcomponent --}}
@endsection