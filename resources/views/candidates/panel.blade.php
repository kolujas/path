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
            @component('components.tab.content.candidates')
            @endcomponent
		</section>
	</div>
@endsection

@section('js')
    <script type="module" src={{ asset('js/candidates/panel.js') }}></script>
@endsection

@section('footer')
    {{-- @component('components.footer.global', [])
    @endcomponent --}}
@endsection