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
		@component('components.tab.tab.modules', [
            'modules' => $modules,
        ])
		@endcomponent

		<section class="tab-content-list mx-auto">
            @component("components.tab.content.$exam->level.writing")
            @endcomponent
            @component("components.tab.content.$exam->level.listening")
            @endcomponent
		</section>
	</div>
@endsection

@section('js')
    <script type="module" src={{ asset('js/exams/example-exam.js') }}></script>
@endsection

@section('footer')
    <!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection
