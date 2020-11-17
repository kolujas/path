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
            <h3 style="padding-top: 2rem;">1. You will hear a conversation between two friends who haven’t seen each other for a while. Listen, then answer the questions.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> Alex...</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['B2_Competency:L1'][1]) && $answers['B2_Competency:L1'][1] == '...believes he should be respectful with his ex-teacher at all times')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...believes he should be respectful with his ex-teacher at all times.</span>
                @else
                    <span style="margin: .5rem 2rem;">...believes he should be respectful with his ex-teacher at all times.</span>
                @endif
                <br />
                @if (isset($answers['B2_Competency:L1'][1]) && $answers['B2_Competency:L1'][1] == '...finds it easy to be on casual terms with his ex-teacher')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...finds it easy to be on casual terms with his ex-teacher.</span>
                @else
                    <span style="margin: .5rem 2rem;">...finds it easy to be on casual terms with his ex-teacher.</span>
                @endif
                <br />
                @if (isset($answers['B2_Competency:L1'][1]) && $answers['B2_Competency:L1'][1] == '...feels uneasy about referring to his ex-teacher by her first name')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...feels uneasy about referring to his ex-teacher by her first name.</span>
                @else
                    <span style="margin: .5rem 2rem;">...feels uneasy about referring to his ex-teacher by her first name.</span>
                @endif
            </p>

            <p style="padding: 0 4rem; color: #000;"><b>b.</b> Alex...</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['B2_Competency:L1'][2]) && $answers['B2_Competency:L1'][2] == '...has two daughters from a previous marriage')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...has two daughters from a previous marriage.</span>
                @else
                    <span style="margin: .5rem 2rem;">...has two daughters from a previous marriage.</span>
                @endif
                <br />
                @if (isset($answers['B2_Competency:L1'][2]) && $answers['B2_Competency:L1'][2] == '...has two daughters from his current marriage')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...has two daughters from his current marriage.</span>
                @else
                    <span style="margin: .5rem 2rem;">...has two daughters from his current marriage.</span>
                @endif
                <br />
                @if (isset($answers['B2_Competency:L1'][2]) && $answers['B2_Competency:L1'][2] == '...has one daughter from a previous marriage, and one from his current marriage')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...has one daughter from a previous marriage, and one from his current marriage.</span>
                @else
                    <span style="margin: .5rem 2rem;">...has one daughter from a previous marriage, and one from his current marriage.</span>
                @endif
            </p>

            <p style="padding: 0 4rem; color: #000;"><b>c.</b> Zoe...</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['B2_Competency:L1'][3]) && $answers['B2_Competency:L1'][3] == '...is fully up to date with information technology')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...is fully up to date with information technology.</span>
                @else
                    <span style="margin: .5rem 2rem;">...is fully up to date with information technology.</span>
                @endif
                <br />
                @if (isset($answers['B2_Competency:L1'][3]) && $answers['B2_Competency:L1'][3] == '...prefers traditional technologies')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...prefers traditional technologies.</span>
                @else
                    <span style="margin: .5rem 2rem;">...prefers traditional technologies.</span>
                @endif
                <br />
                @if (isset($answers['B2_Competency:L1'][3]) && $answers['B2_Competency:L1'][3] == '...uses a tablet with an electronic pen')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...uses a tablet with an electronic pen.</span>
                @else
                    <span style="margin: .5rem 2rem;">...uses a tablet with an electronic pen.</span>
                @endif
            </p>

            <p style="padding: 0 4rem; color: #000;"><b>d.</b> Zoe...</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['B2_Competency:L1'][4]) && $answers['B2_Competency:L1'][4] == '...thought the food in Mexico was awful')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...thought the food in Mexico was awful.</span>
                @else
                    <span style="margin: .5rem 2rem;">...thought the food in Mexico was awful.</span>
                @endif
                <br />
                @if (isset($answers['B2_Competency:L1'][4]) && $answers['B2_Competency:L1'][4] == '...thought the food in Mexico could kill you')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...thought the food in Mexico could kill you.</span>
                @else
                    <span style="margin: .5rem 2rem;">...thought the food in Mexico could kill you.</span>
                @endif
                <br />
                @if (isset($answers['B2_Competency:L1'][4]) && $answers['B2_Competency:L1'][4] == '...thought the food in Mexico was delicious')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...thought the food in Mexico was delicious.</span>
                @else
                    <span style="margin: .5rem 2rem;">...thought the food in Mexico was delicious.</span>
                @endif
            </p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. You will hear a university lecturer discussing a theory with two students. Listen twice, then fill the spaces in the notes, <mark>using your own words</mark>.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> What childhood memory does Katie describe?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Competency:L2'][1]) !!}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>b.</b> Which part of her story does the lecturer suggest may be inaccurate?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Competency:L2'][2]) !!}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>c.</b> What childhood memory does Ben describe?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Competency:L2'][3]) !!}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>d.</b> Which part of his story does Ben discover to be inaccurate?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Competency:L2'][4]) !!}</mark></p>

            <p style="padding: 0 4rem; color: #000;"><b>e.</b> How does the lecturer suggest that memory reconstruction is nothing to worry about?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Competency:L2'][5]) !!}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. You have been asked to attend a speech by a politician, then write a report on what he said. As you listen, make notes. You will hear the speech twice.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">Write notes here</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Competency:L3'][1]) !!}</mark></p>
            
            <h4 style="color: #014969;">Now write your report. (you will have 20 minutes to complete this task once the recording has finished).</h4>

            <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Competency:L3'][2]) !!}</mark></p>
        </main>
    </section>
@endsection