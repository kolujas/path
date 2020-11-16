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
            <h3 style="padding-top: 2rem;">1. Listen to Jenny and Alan talking about their weekend activities. Match the times to the activities. One time and one activity shown below is not used. <mark>One has been done for you</mark>.</h3>
        </header>
        <main>
            <p style="padding: 0 2rem;"><b class="mr-1">a.</b> I usually get up 10a.m.</p>
            @if (isset($answers['A1_Achiever:L1']))
                <p style="padding: 0 2rem;"><b class="mr-1">b.</b> We eat quite late on Saturdays, at around <mark>{{ $answers['A1_Achiever:L1'][1] }}</mark>.</p>
                <p style="padding: 0 2rem;"><b class="mr-1">c.</b> We always stop for a coffee at <mark>{{ $answers['A1_Achiever:L1'][2] }}</mark> in the morning.</p>
                <p style="padding: 0 2rem;"><b class="mr-1">c.</b> At <mark>{{ $answers['A1_Achiever:L1'][3] }}</mark> in the afternoon we watch a film.</p>
            @else
                <p style="padding: 0 2rem;"><b class="mr-1">b.</b> We eat quite late on Saturdays, at around <mark>null</mark>.</p>
                <p style="padding: 0 2rem;"><b class="mr-1">c.</b> We always stop for a coffee at <mark>null</mark> in the morning.</p>
                <p style="padding: 0 2rem;"><b class="mr-1">c.</b> At <mark>null</mark> in the afternoon we watch a film.</p>
            @endif
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Below are three bingo cards. You will hear a man calling numbers. Cross the numbers. Which card is completed first? Choose the number of the card in the box.</h3>
        </header>
        <main>
            <p style="padding: 0 2rem;">Bingo completed: <mark>{{ $answers['A1_Achiever:L2'][1] }}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. You will hear people talking about the buildings below. Match the buildings to the descriptions. <mark>One has been done for you</mark>.</h3>
        </header>
        <main>
            @if (isset($answers['A1_Achiever:L3']))
                <ol style="margin-left: 2rem;" class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                    <li class="answers inline mx-lg-2">Shopping mall</li>
                    <li class="answers crossed inline mx-lg-2"><mark>{{ $answers['A1_Achiever:L3'][1] }}</mark></li>
                    <li class="answers inline mx-lg-2"><mark>{{ $answers['A1_Achiever:L3'][2] }}</mark></li>
                    <li class="answers inline mx-lg-2"><mark>{{ $answers['A1_Achiever:L3'][3] }}</mark></li>
                </ol>
            @else
                <ol style="margin-left: 2rem;" class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                    <li class="answers inline mx-lg-2">Shopping mall</li>
                    <li class="answers crossed inline mx-lg-2"><mark>null</mark></li>
                    <li class="answers inline mx-lg-2"><mark>null</mark></li>
                    <li class="answers inline mx-lg-2"><mark>null</mark></li>
                </ol>
            @endif
        </main>
    </section>
@endsection