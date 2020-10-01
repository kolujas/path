@extends('layouts.exam')

@section('css')
    <link href={{ asset('css/exams/example-exam.css') }} rel="stylesheet">
@endsection

@section('nav')
    @component('components.nav.exam', [
        'exam' => $exam,
    ])
    @endcomponent
@endsection

@section('title')
    Path
@endsection

@section('main')
    <div class="floating-menu top left">
        <span class="floating-button">
            <i class="fas fa-exclamation"></i>
        </span>
    </div>
    <div id="tab-exam" class="col-12 relative tab-menu horizontal p-0">
        <section class="tabs mb-4 mb-md-0">
            @component('components.tab.tab.modules', [
            'modules' => $exam->modules,
            ])
            @endcomponent
        </section>

		<form class="tab-content-list mx-auto" action="{{$exam->id_exam}}/record" method="post">
            @csrf
            @foreach($exam->modules as $module)
                @component("components.tab.content.$exam->level.$module->initials.$module->file")
                @endcomponent
            @endforeach
		</form>
	</div>
@endsection

@section('js')
    <script type="module" src={{ asset('js/exams/example-exam.js') }}></script>
@endsection

@section('footer')
    <!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection
