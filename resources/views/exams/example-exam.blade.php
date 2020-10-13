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
    <div class="example-exam floating-menu top left">
        <span class="floating-button mr-4 mr-lg-0" data-toggle="tooltip" data-placement="bottom" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, voluptatibus dignissimos? Modi doloremque tempora quisquam ea vero asperiores nobis molestiae.">
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
            <input class="strikes" type="hidden" name="strikes">
            @foreach($exam->modules as $module)
                @component("components.tab.content.$exam->level.$module->folder.$module->file")
                @endcomponent
            @endforeach
		</form>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">WARNING!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>No te copies porque te vas funado</p>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('js')
    <script type="module" src={{ asset('js/exams/example-exam.js') }}></script>
@endsection

@section('footer')
    <!-- @component('components.footer.call_to_action', [])
    @endcomponent -->
@endsection
