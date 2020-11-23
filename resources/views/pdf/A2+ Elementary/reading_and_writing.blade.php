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
            <h3 style="padding-top: 2rem;">1. Read the text below, then answer the questions on the next page.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> What can we learn from this story?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['A2_Elementary:W1'][1]) !!}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>b.</b> What do you think of the judge’s decision?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['A2_Elementary:W1'][2]) !!}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Imagine you are the young girl Sarah in the story. You are walking along a road when you see a bag of gold coins. Complete your thoughts:</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> If I take this bag to my father, <mark>{{ $answers['A2_Elementary:W2'][1] }}</mark>.</p>
            <p style="padding: 0 4rem; color: #000;"><b>b.</b> If <mark>{{ $answers['A2_Elementary:W2'][2] }}</mark>, someone else will find the bag.</p>
            <p style="padding: 0 4rem; color: #000;"><b>c.</b> If <mark>{{ $answers['A2_Elementary:W2'][3] }}</mark>.</p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. What changes have been made in your town or city in your lifetime?</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> Public transport <mark>{{ $answers['A2_Elementary:W3'][1] }}</mark>.</p>
            <p style="padding: 0 4rem; color: #000;"><b>b.</b> Road traffic <mark>{{ $answers['A2_Elementary:W3'][2] }}</mark>, someone else will find the bag.</p>
            <p style="padding: 0 4rem; color: #000;"><b>c.</b> (Your choice) <mark>{{ $answers['A2_Elementary:W3'][3] }}</mark>.</p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4. Write about an important event that happened this year in your country. Include information about what you were doing at that time.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['A2_Elementary:W4'][1]) !!}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">5. Write about the most exciting place you have visited. Include information about it, why you liked it, and the activities you did.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['A2_Elementary:W5'][1]) !!}</mark></p>
        </main>
    </section>
@endsection