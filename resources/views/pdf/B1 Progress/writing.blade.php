@extends('pdf.exam')

@section('css')
    
@endsection

@section('title')
    <span style="font-size: 1.5rem;">{{ $evaluation->exam->name }}</span>
@endsection

@section('main')
    <header>
        <h2 style="text-align: center; padding-top: 2rem;">{{ $module->folder }} {{ ucfirst($module->file) }}</h2>
        <h3 style="text-align: center; color: #0091B7;">Candidate Number: ({{ $candidate->candidate_number }})</h3>
        <p style="text-align: center;">Strikes: {{ $answers['strikes'] }}</p>
    </header>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">1. Read an article about the benefits of being outdoors, then answer the questions on the next page.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> Of the deterrents to going outside mentioned in the article, which affect you the most?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Progress:W1'][1]) !!}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>b.</b> What does the writer say about the opportunities and benefits of exercising indoors?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Progress:W1'][2]) !!}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Read the following anecdote, then complete the sentence as if you are the person telling the anecdote.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">I wish <mark>{!! nl2br($answers['B1_Progress:W2'][1]) !!}</mark></p>
            <p style="padding: 0 4rem; color: #000;">I hope <mark>{!! nl2br($answers['B1_Progress:W2'][2]) !!}</mark></p>
            <p style="padding: 0 4rem; color: #000;">I don’t expect <mark>{!! nl2br($answers['B1_Progress:W2'][3]) !!}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. You overhear the following conversation in a café. Believing the man is in danger, you go to the police and they ask you to report the conversation. Complete the report form below.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Progress:W3'][1]) !!}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4. You have been sent a special offer from a hotel you once stayed in. The offer is for a free third night if you book two nights in June.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Progress:W4'][1]) !!}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">5. Give your opinion <mark>to one</mark> of the following statements, including reasons and examples.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Progress:W5'][1]) !!}</mark></p>
        </main>
    </section>
@endsection