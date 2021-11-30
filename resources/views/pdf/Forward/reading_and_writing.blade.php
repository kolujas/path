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
            <h3 style="padding-top: 2rem;">1. Read the text then answer the questions on the following page.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>1a.</b> Of the components described, which are sometimes added by water authorities? Do you agree with these additions? Explain your answer.</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW1'][1] }}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>1b.</b> Of the components described, which are unintended? What solutions would you suggest?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW1'][2] }}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>1c.</b> How does the article make you feel about drinking a. tap water and b. bottled water?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW1'][3] }}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Below are three opinions related to money. Choose one and write your personal evaluation of the opinion, offering support or counterarguments as appropriate.</h3>
        </header>
        <main>
            @if (isset($answers['Forward:RW2']) && isset($answers['Forward:RW2'][1]))
                <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW2'][1] }}</mark></p>
            @else
                <p style="padding: 0 4rem; color: #000;"><mark>null</mark></p>
            @endif
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW2'][2]) !!}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. Native speakers of English sometimes say one thing but mean another. Below are six comments that could have a coded or hidden message. Choose three, and interpret their meaning.</h3>
        </header>
        <main>
            @if (isset($answers['Forward:RW3']) && isset($answers['Forward:RW3']['1a']) && isset($answers['Forward:RW3']['1b']))
                <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW3']['1a'] }}</mark></p>
            @else
                <p style="padding: 0 4rem; color: #000;"><mark>null</mark></p>
            @endif
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW3']['1b']) !!}</mark></p>
        </main>
        <main>
            @if (isset($answers['Forward:RW3']) && isset($answers['Forward:RW3']['2a']) && isset($answers['Forward:RW3']['2b']))
                <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW3']['2a'] }}</mark></p>
            @else
                <p style="padding: 0 4rem; color: #000;"><mark>null</mark></p>
            @endif
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW3']['2b']) !!}</mark></p>
        </main>
        <main>
            @if (isset($answers['Forward:RW3']) && isset($answers['Forward:RW3']['3a']) && isset($answers['Forward:RW3']['3b']))
                <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['Forward:RW3']['3a'] }}</mark></p>
            @else
                <p style="padding: 0 4rem; color: #000;"><mark>null</mark></p>
            @endif
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW3']['3b']) !!}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4. Below is a draft email written by one of your company interns. On reading it you find that the draft is confusing, too informal (this email will also go to company directors), contains irrelevancies and is poorly punctuated. Revise the email to make it more formal and coherent.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['Forward:RW4'][1]) !!}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">5. Choose one of the following tasks:</h3>
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