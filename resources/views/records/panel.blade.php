@extends('layouts.panel')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href={{ asset('css/records/panel.css') }} rel="stylesheet">
@endsection

@section('title')
    Admin panel - Records
@endsection

@section('main')
    <div id="tab-records" class="col-12 relative tab-menu vertical p-0">
        <section class="tabs background background-linear">
            @component('components.tab.tab.panel')
            @endcomponent
        </section>

		<section class="tab-content-list mx-auto">
            @component('components.tab.content.records')
            @endcomponent
		</section>
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
        const count = {{ $count }};
        const modules = @json($modules);
    </script>
    <script type="module" src={{ asset('js/records/panel.js') }}></script>
@endsection

@section('footer')
    {{-- @component('components.footer.global', [])
    @endcomponent --}}
@endsection