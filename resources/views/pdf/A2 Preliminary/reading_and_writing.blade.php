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
            <h3 style="padding-top: 2rem;">1.a. Look at the pictures below and compare them thinking about your holiday. Complete these sentences giving your opinion.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">a. Safe When I go on holiday, I usually travel by plane because it's safer than other transports.</p>
            <p style="padding: 0 4rem; color: #000;">b. Exciting <mark>{{ $answers['A2_Preliminary:W1A'][1] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">c. Hot <mark>{{ $answers['A2_Preliminary:W1A'][2] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">d. Bad <mark>{{ $answers['A2_Preliminary:W1A'][3] }}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">1.b. What did you do on your last holiday?</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['A2_Preliminary:W1B'][1]) !!}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Write about things you must, can’t and don’t have to do when you are in an exam.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">a. I must <mark>{{ $answers['A2_Preliminary:W2'][1] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">b. I can’t <mark>{{ $answers['A2_Preliminary:W2'][2] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">c. I don’t have to <mark>{{ $answers['A2_Preliminary:W2'][3] }}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. Explain <mark>one</mark> of the following:</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['A2_Preliminary:W3'][1]) !!}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4. Read Jenny’s anecdote, then ask her 3 questions, and write her possible answers.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">Question 1: <mark>{{ $answers['A2_Preliminary:W4'][1] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">Answer 1: <mark>{{ $answers['A2_Preliminary:W4'][2] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">Question 2: <mark>{{ $answers['A2_Preliminary:W4'][3] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">Answer 2: <mark>{{ $answers['A2_Preliminary:W4'][4] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">Question 3: <mark>{{ $answers['A2_Preliminary:W4'][5] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">Answer 3: <mark>{{ $answers['A2_Preliminary:W4'][6] }}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">5. Write about a time when you saw, or did, something amazing.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['A2_Preliminary:W5'][1]) !!}</mark></p>
        </main>
    </section>
@endsection