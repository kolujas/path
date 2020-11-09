@extends('pdf.exam')

@section('css')
    
@endsection

@section('title')
    <span style="font-size: 1.5rem;">{{ $evaluation->exam->name }}</span>
@endsection

@section('main')
    <header>
        <h2 style="text-align: center; padding-top: 2rem;">{{ $module->folder }} {{ ucfirst($module->file) }}</h2>
        @if ($candidate->full_name)
            <h3 style="text-align: center; color: #0091B7;">{{ $candidate->full_name }} ({{ $candidate->candidate_number }})</h3>
        @else
            <h3 style="text-align: center; color: #0091B7;">Candidate Number ({{ $candidate->candidate_number }})</h3>
        @endif
        <p style="text-align: center;">Strikes: {{ $answers['strikes'] }}</p>
    </header>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">1. Match the words to the images. <mark>One is done for you</mark>.</h3>
        </header>
        <main>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['A1_Entry:W1'][1]))
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">{{$answers['A1_Entry:W1'][1]}}</span>
                @else
                    <span style="margin: .5rem 2rem;">null</span>
                @endif
                @if (isset($answers['A1_Entry:W1'][2]))
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">{{$answers['A1_Entry:W1'][2]}}</span>
                @else
                    <span style="margin: .5rem 2rem;">null</span>
                @endif
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Pencil</span>
                @if (isset($answers['A1_Entry:W1'][3]))
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">{{$answers['A1_Entry:W1'][3]}}</span>
                @else
                    <span style="margin: .5rem 2rem;">null</span>
                @endif
                @if (isset($answers['A1_Entry:W1'][4]))
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">{{$answers['A1_Entry:W1'][4]}}</span>
                @else
                    <span style="margin: .5rem 2rem;">null</span>
                @endif
            </p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. You are at school. What can <mark>you see in these places?</mark>.</h3>
        </header>
        <main class="writing-question-two">
            <p style="padding: 0 4rem; color: #000;">In the classroom, I can see a desk and <mark>{!! $answers['A1_Entry:W2'][1] !!}</mark></p>
            <p style="padding: 0 4rem; color: #000;">In the library, I can see <mark>{!! $answers['A1_Entry:W2'][2] !!}</mark> and <mark>{!! $answers['A1_Entry:W2'][3] !!}</mark></p>
            <p style="padding: 0 4rem; color: #000;">In the playground, I can see <mark>{!! $answers['A1_Entry:W2'][4] !!}</mark> and <mark>{!! $answers['A1_Entry:W2'][5] !!}</mark></p>
            </div>
        </main>
    </section>
    
    <pagebreak />

    <section>
        {{--  --}}
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4. Read about Ivan and Julie. Then fill the spaces with <b>am, is </b>or <b>are</b>. <mark>One is done for you</mark>.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">Hello! My friend Beth and I <mark>{!! $answers['A1_Entry:W4'][1] !!}</mark> good friends. She <mark>{!! $answers['A1_Entry:W4'][2] !!}</mark> 10 years old and I <mark>{!! $answers['A1_Entry:W4'][3] !!}</mark>. My hair is short. Beth's hair <mark>{!! $answers['A1_Entry:W4'][4] !!}</mark> long.</p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">5. Write about your friend.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">My friend:</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! $answers['A1_Entry:W5'][1] !!}</mark></p>
        </main>
    </section>
@endsection