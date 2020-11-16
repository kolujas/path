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
            <h3 style="padding-top: 2rem;">1. Listen to the conversation, then select the correct answer.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> Abigail, Charlie and Julian are the new...</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['B1_Progress:L1'][1]) && $answers['B1_Progress:L1'][1] == '...Sales Team')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...Sales Team.</span>
                @else
                    <span style="margin: .5rem 2rem;">...Sales Team.</span>
                @endif
                @if (isset($answers['B1_Progress:L1'][1]) && $answers['B1_Progress:L1'][1] == '...Zoom Team')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...Zoom Team.</span>
                @else
                    <span style="margin: .5rem 2rem;">...Zoom Team.</span>
                @endif
                @if (isset($answers['B1_Progress:L1'][1]) && $answers['B1_Progress:L1'][1] == '...Marketing Team')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...Marketing Team.</span>
                @else
                    <span style="margin: .5rem 2rem;">...Marketing Team.</span>
                @endif
            </p>

            <p style="padding: 0 4rem; color: #000;"><b>b.</b> Charlie has been with the company for...</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['B1_Progress:L1'][2]) && $answers['B1_Progress:L1'][2] == '...two years')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...two years.</span>
                @else
                    <span style="margin: .5rem 2rem;">...two years.</span>
                @endif
                @if (isset($answers['B1_Progress:L1'][2]) && $answers['B1_Progress:L1'][2] == '...one week')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...one week.</span>
                @else
                    <span style="margin: .5rem 2rem;">...one week.</span>
                @endif
                @if (isset($answers['B1_Progress:L1'][2]) && $answers['B1_Progress:L1'][2] == '...two weeks')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...two weeks.</span>
                @else
                    <span style="margin: .5rem 2rem;">...two weeks.</span>
                @endif
            </p>

            <p style="padding: 0 4rem; color: #000;"><b>c.</b> In her spare time, Charlie...</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['B1_Progress:L1'][3]) && $answers['B1_Progress:L1'][3] == '...only watches TV')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...only watches TV.</span>
                @else
                    <span style="margin: .5rem 2rem;">...only watches TV.</span>
                @endif
                @if (isset($answers['B1_Progress:L1'][3]) && $answers['B1_Progress:L1'][3] == '...is only interested in keeping fit')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...is only interested in keeping fit.</span>
                @else
                    <span style="margin: .5rem 2rem;">...is only interested in keeping fit.</span>
                @endif
                <br />
                @if (isset($answers['B1_Progress:L1'][3]) && $answers['B1_Progress:L1'][3] == '...enjoys a mixture of keeping fit and relaxing')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...enjoys a mixture of keeping fit and relaxing.</span>
                @else
                    <span style="margin: .5rem 2rem;">...enjoys a mixture of keeping fit and relaxing.</span>
                @endif
            </p>

            <p style="padding: 0 4rem; color: #000;"><b>d.</b> Julian has been with the company...</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['B1_Progress:L1'][4]) && $answers['B1_Progress:L1'][4] == '...longer than Charlie')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...longer than Charlie.</span>
                @else
                    <span style="margin: .5rem 2rem;">...longer than Charlie.</span>
                @endif
                @if (isset($answers['B1_Progress:L1'][4]) && $answers['B1_Progress:L1'][4] == '...less time than Charlie')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...less time than Charlie.</span>
                @else
                    <span style="margin: .5rem 2rem;">...less time than Charlie.</span>
                @endif
                @if (isset($answers['B1_Progress:L1'][4]) && $answers['B1_Progress:L1'][4] == '...for the same amount of time as Charlie')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...for the same amount of time as Charlie.</span>
                @else
                    <span style="margin: .5rem 2rem;">...for the same amount of time as Charlie.</span>
                @endif
            </p>

            <p style="padding: 0 4rem; color: #000;"><b>e.</b> Abigail is the...</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['B1_Progress:L1'][5]) && $answers['B1_Progress:L1'][5] == '...Head of Netflix')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...Head of Netflix.</span>
                @else
                    <span style="margin: .5rem 2rem;">...Head of Netflix.</span>
                @endif
                @if (isset($answers['B1_Progress:L1'][5]) && $answers['B1_Progress:L1'][5] == '...Head of Marketing')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...Head of Marketing.</span>
                @else
                    <span style="margin: .5rem 2rem;">...Head of Marketing.</span>
                @endif
                @if (isset($answers['B1_Progress:L1'][5]) && $answers['B1_Progress:L1'][5] == '...Marketing Team Leader')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...Marketing Team Leader.</span>
                @else
                    <span style="margin: .5rem 2rem;">...Marketing Team Leader.</span>
                @endif
            </p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Listen to a conversation between Martha, a woman who looks after student happiness at a university, and Katya, an unhappy student. Then answer the questions in your own words.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> What are Katya’s problems?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['B1_Progress:L2'][1] }}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>b.</b> What are Martha’s solutions?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['B1_Progress:L2'][2] }}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>c.</b> Who wins the discussion? Explain your answer</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['B1_Progress:L2'][3] }}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. Listen to what happened to Lee. How do you think the story ends?</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['B1_Progress:L3'][1] }}</mark></p>
        </main>
    </section>
@endsection