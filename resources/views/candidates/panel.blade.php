@extends('layouts.panel')

@section('css')
    <link href={{ asset('css/candidates/panel.css') }} rel="stylesheet">
@endsection

@section('title')
    Admin panel - Candidates
@endsection

@section('main')
    <div id="tab-candidates" class="col-12 relative tab-menu vertical p-0">
        <section class="tabs background background-linear">
            @component('components.tab.tab.panel')
            @endcomponent
        </section>

		<section class="tab-content-list mx-auto">
            @component('components.tab.content.candidates')
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
        @if($errors->any())
        const errors = @json($errors->messages());
        @else
        const errors = [];
        @endif
        @if(Session::has('status'))
        const status = @json(Session::get('status'));
        @endif
        const validation = @json($validation);
        const candidates = @json($candidates);
        const modules = @json($modules);
    </script>
    <script type="module" src={{ asset('js/candidates/panel.js') }}></script>
@endsection

@section('footer')
    {{-- @component('components.footer.global', [])
    @endcomponent --}}
@endsection