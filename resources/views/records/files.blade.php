@extends('layouts.record')

@section('css')
    <link href={{ asset('css/records/files.css') }} rel="stylesheet">
@endsection

@section('nav')
    @component('components.nav.files', [
        'record' => $record,
    ])
    @endcomponent
@endsection

@section('title')
    {{ $record->exam()->name }}: {{ $record->candidate()->full_name }} modules
@endsection

@section('main')
    <section class="col-12 mt-3">
        <div class="cards row justify-content-center flex-wrap">
            @foreach ($record->files() as $file)
                <a class="btn btn-one card col-2 mx-2" target="_blank" href="/storage/records/{{ $record->id_record }}/{{ $file->url }}">
                    <span>{{ $file->folder }}:</span>
                    <span>{{ $file->name }}</span>
                </a>
            @endforeach
        </div>
    </section>
@endsection

@section('js')
    <script type="module" src={{ asset('js/records/files.js?v=1.0.0') }}></script>
@endsection

@section('footer')

@endsection