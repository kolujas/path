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
    {{ $exam->name }}
@endsection

@section('main')
    <div class="example-exam floating-menu top left">
        <span class="floating-button mr-2 mr-lg-0" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, voluptatibus dignissimos? Modi doloremque tempora quisquam ea vero asperiores nobis molestiae. <br /> <br /> {{ $exam->rules }}">
            <i class="fas fa-exclamation"></i>
        </span>
    </div>

    <div class="example-exam floating-menu bottom right">
        <button class="save-button btn btn-one mr-4 hidden">
            SAVE
            <b class="timer ml-1"></b>
        </button>
    </div>
    
    <div id="tab-exam" class="col-12 relative tab-menu horizontal p-0">
        <section class="tabs mb-4 mb-md-0">
            @component('components.tab.tab.modules', [
                'modules' => $exam->modules,
            ])
            @endcomponent
        </section>

		<form class="tab-content-list mx-auto" action="/exam/{{$exam->id_exam}}/record" method="post">
            @csrf
            <input class="strikes" type="hidden" name="strikes" value="0">
            @foreach($exam->modules as $module)
                @component("components.tab.content.$module->file", [
                    'module' => $module
                ])
                @endcomponent
            @endforeach
		</form>
    </div>
    
    @component('components.modal.strikes') 

    @endcomponent

    @component('components.modal.confirm')        
    @endcomponent

@endsection

@section('js')
    <script>
        const exam = @json($exam);
    </script>
    <script type="module" src={{ asset('js/exams/example-exam.js') }}></script>
@endsection

@section('footer')
    <!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection
