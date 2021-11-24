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
            <h3 style="padding-top: 2rem;">1. Read the text, then answer the questions on the next page.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> What does the article say about non-verbal communication in different cultures?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW1'][1]) !!}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>b.</b> According to the article, in which situations would a person need to be aware of their non-verbal communication?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW1'][2]) !!}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>c.</b> How is the coronavirus pandemic affecting non-verbal communication in your country? Give examples.</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW1'][3]) !!}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Below you will see three situations for which you need to use diplomatic language. Read each situation, then answer the questions. Try to be as polite as possible.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> You would like to enter a restaurant but two elderly ladies are standing in the entrance having a conversation. What do you say to them?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW2'][1] }}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>b.</b> You are in a taxi when the driver makes an unexpected turn. You think he is now driving in the wrong direction. What do you say?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW2'][2] }}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>c.</b> A passing policeman takes you by the arm and says “I’m arresting you..” but you haven’t done anything! What do you say?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW2'][3] }}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. You will read an extract from an interview with a racing driver, which took place one year ago. First, read the extract.</h3>
        </header>
        <main>
            <h4 style="color: #014969;">Now imagine you are the host of a radio show. You want to report this interview to your listeners, in as much as possible. Write your script below.</h4>

            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW3'][1]) !!}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4. You receive the following email from a company which has organised an online webinar. Write a reply, indicating that you’re not sure about attending, and requesting the following information to help you decide:</h3>
        </header>
        <main>
            <h4 style="color: #014969;">Thank the sender, and use an appropriate salutation and ending.</h4>

            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW4'][1]) !!}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">5. Write an essay on <mark>one</mark> of the following topics, giving examples.</h3>
        </header>
        <main>
            @if (isset($answers['Forward:RW5']) && isset($answers['Forward:RW5'][1]))
                <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW5'][1] }}</mark></p>
            @else
                <p style="padding: 0 4rem; color: #000;"><mark>null</mark></p>
            @endif
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW5'][2]) !!}</mark></p>
        </main>
    </section>
@endsection