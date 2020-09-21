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
    <div class="floating-menu top left">
        <span class="floating-button">
            <i class="fas fa-question"></i>
        </span>
    </div>
    <div id="tab-exam" class="col-12 relative tab-menu horizontal p-0">
		@component('components.tab.tab.modules')
		@endcomponent

		<section class="tab-content-list mx-auto">
            @component('components.tab.content.writing')
            @endcomponent
            @component('components.tab.content.listening')
            @endcomponent
		</section>
	</div>
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
@endsection

@section('js')
<script type="module" src={{ asset('js/exams/example-exam.js') }}></script>
@endsection

@section('footer')
<!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection
