@extends('pdf.exam')

@section('css')
    
@endsection

@section('title')
    <span style="font-size: 1.5rem;">{{ $evaluation->exam->name }}</span>
@endsection

@section('main')
    <header>
        <h2 style="text-align: center; padding-top: 2rem;">{{ $module->folder }} {{ $module->name }}</h2>
        <h3 style="text-align: center; color: #0091B7;">Candidate Number: ({{ $candidate->candidate_number }})</h3>
        <p style="text-align: center;">Strikes: {{ $answers['strikes'] }}</p>
    </header>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">1. Match the words to the images. <mark>One is done for you</mark>.</h3>
        </header>
        <main>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['A1_Entry:RW1'][1]))
                    <span style="margin: .5rem 2rem;">{{$answers['A1_Entry:RW1'][1]}}</span>
                @else
                    <span style="margin: .5rem 2rem;">null</span>
                @endif
                @if (isset($answers['A1_Entry:RW1'][2]))
                    <span style="margin: .5rem 2rem;">{{$answers['A1_Entry:RW1'][2]}}</span>
                @else
                    <span style="margin: .5rem 2rem;">null</span>
                @endif
                <span style="margin: .5rem 2rem;">Pencil</span>
                @if (isset($answers['A1_Entry:RW1'][3]))
                    <span style="margin: .5rem 2rem;">{{$answers['A1_Entry:RW1'][3]}}</span>
                @else
                    <span style="margin: .5rem 2rem;">null</span>
                @endif
                @if (isset($answers['A1_Entry:RW1'][4]))
                    <span style="margin: .5rem 2rem;">{{$answers['A1_Entry:RW1'][4]}}</span>
                @else
                    <span style="margin: .5rem 2rem;">null</span>
                @endif
            </p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. You are at school. What can <mark>you see in these places?</mark></h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">In the classroom, I can see a desk and <mark>{{ $answers['A1_Entry:RW2'][1] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">In the library, I can see <mark>{{ $answers['A1_Entry:RW2'][2] }}</mark> and <mark>{{ $answers['A1_Entry:RW2'][3] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">In the playground, I can see <mark>{{ $answers['A1_Entry:RW2'][4] }}</mark> and <mark>{{ $answers['A1_Entry:RW2'][5] }}</mark></p>
        </main>
    </section>
    
    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. Where Charles lives there are ten houses. Listening to him tell you about each house, then complete the table with the numbers <mark>Two are done for you</mark>.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">fish</p>
            <p style="padding: 0 4rem; color: #000;">m<mark>{{ $answers['A1_Entry:RW3'][1] }}</mark>nk<mark>{{ $answers['A1_Entry:RW3'][2] }}</mark>y</p>
            <p style="padding: 0 4rem; color: #000;">t<mark>{{ $answers['A1_Entry:RW3'][3] }}</mark>g<mark>{{ $answers['A1_Entry:RW3'][4] }}</mark>r</p>
            <p style="padding: 0 4rem; color: #000;">b<mark>{{ $answers['A1_Entry:RW3'][5] }}</mark><mark>{{ $answers['A1_Entry:RW3'][6] }}</mark>d</p>
            <p style="padding: 0 4rem; color: #000;">p<mark>{{ $answers['A1_Entry:RW3'][7] }}</mark>t</p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4. Read about Ivan and Julie. Then fill the spaces with <b>am, is </b>or <b>are</b>. <mark>One is done for you</mark>.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">Hello! I am Ivan. My friend's name <mark>{{ $answers['A1_Entry:RW4'][1] }}</mark> Julie. I <mark>{{ $answers['A1_Entry:RW4'][2] }}</mark> a boy. She <mark>{{ $answers['A1_Entry:RW4'][3] }}</mark> a girl. We <mark>{{ $answers['A1_Entry:RW4'][4] }}</mark> childrens</p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">5. Write about your friend.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['A1_Entry:RW5'][1]) !!}</mark></p>
        </main>
    </section>
@endsection