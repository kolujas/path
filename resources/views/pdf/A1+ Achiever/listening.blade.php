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
            <h3 style="padding-top: 2rem;">1. Listen to Jenny and Alan talking about their weekend activities. Match the times to the activities. One time and one activity shown below is not used. <mark>One has been done for you</mark>.</h3>
        </header>
        <main>
            <p style="padding: 0 2rem;"><b class="mr-1">a.</b> I usually get up 10a.m.</p>
            @if (isset($answers['A1_Achiever:L1']) && isset($answers['A1_Achiever:L1'][1]))
                <p style="padding: 0 2rem;"><b class="mr-1">b.</b> We eat quite late on Saturdays, at around <mark>{{ $answers['A1_Achiever:L1'][1] }}</mark>.</p>
            @else
                <p style="padding: 0 2rem;"><b class="mr-1">b.</b> We eat quite late on Saturdays, at around <mark>null</mark>.</p>
            @endif
            @if (isset($answers['A1_Achiever:L1']) && isset($answers['A1_Achiever:L1'][2]))
                <p style="padding: 0 2rem;"><b class="mr-1">c.</b> We always stop for a coffee at <mark>{{ $answers['A1_Achiever:L1'][2] }}</mark> in the morning.</p>
            @else
                <p style="padding: 0 2rem;"><b class="mr-1">c.</b> We always stop for a coffee at <mark>null</mark> in the morning.</p>
            @endif
            @if (isset($answers['A1_Achiever:L1']) && isset($answers['A1_Achiever:L1'][3]))
                <p style="padding: 0 2rem;"><b class="mr-1">d.</b> At <mark>{{ $answers['A1_Achiever:L1'][3] }}</mark> in the afternoon we watch a film.</p>
            @else
                <p style="padding: 0 2rem;"><b class="mr-1">d.</b> At <mark>null</mark> in the afternoon we watch a film.</p>
            @endif
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Below are three bingo cards. You will hear a man calling numbers. Cross the numbers. Which card is completed first? Choose the number of the card in the box.</h3>
        </header>
        <main>
            @if (isset($answers['A1_Achiever:L2']) && isset($answers['A1_Achiever:L2'][1]))
                <p style="padding: 0 2rem;">Bingo completed: <mark>{{ $answers['A1_Achiever:L2'][1] }}</mark></p>
            @else
                <p style="padding: 0 2rem;">Bingo completed: <mark>null</mark></p>
            @endif
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. You will hear people talking about the buildings below. Match the buildings to the descriptions. <mark>One has been done for you</mark>.</h3>
        </header>
        <main>
            <ol style="margin-left: 2rem;" class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                <li class="answers inline mx-lg-2">1. Shopping mall</li>
                @if (isset($answers['A1_Achiever:L3']) && isset($answers['A1_Achiever:L3'][1]))
                    <li class="answers crossed inline mx-lg-2">2. <mark>{{ $answers['A1_Achiever:L3'][1] }}</mark></li>
                @else
                    <li class="answers crossed inline mx-lg-2">2. <mark>null</mark></li>
                @endif
                @if (isset($answers['A1_Achiever:L3']) && isset($answers['A1_Achiever:L3'][2]))
                    <li class="answers inline mx-lg-2">3. <mark>{{ $answers['A1_Achiever:L3'][2] }}</mark></li>
                @else
                    <li class="answers inline mx-lg-2">3. <mark>null</mark></li>
                @endif
                @if (isset($answers['A1_Achiever:L3']) && isset($answers['A1_Achiever:L3'][3]))
                    <li class="answers inline mx-lg-2">4. <mark>{{ $answers['A1_Achiever:L3'][3] }}</mark></li>
                @else
                    <li class="answers inline mx-lg-2">4. <mark>null</mark></li>
                @endif
            </ol>
        </main>
    </section>
@endsection