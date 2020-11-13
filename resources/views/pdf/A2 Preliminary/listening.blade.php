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
            <h3 style="padding-top: 2rem;">1. Listen to comparasions between 3 groups of pictures: A, B and C, then choose the right name or number. <mark>One has been done for you</mark>.</h3>
        </header>
        <main>
            <ol style="margin-left: 2rem;">
                <li>
                    @if (isset($answers['A2_Preliminary:L1']['1a']) && $answers['A2_Preliminary:L1']['1a'] == 'Ben')
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Ben</span>
                    @else
                        <span style="margin: .5rem 2rem;">Ben</span>
                    @endif / 
                    @if (isset($answers['A2_Preliminary:L1']['1b']) && $answers['A2_Preliminary:L1']['1b'] == 'Sid')
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Sid</span>
                    @else
                        <span style="margin: .5rem 2rem;">Sid</span>
                    @endif / 
                    @if (isset($answers['A2_Preliminary:L1']['1c']) && $answers['A2_Preliminary:L1']['1c'] == 'Tom')
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Tom</span>
                    @else
                        <span style="margin: .5rem 2rem;">Tom</span>
                    @endif
                </li>
            </ol>
            <ol style="margin-left: 2rem;">
                <li>
                    @if (isset($answers['A2_Preliminary:L1']['2a']) && $answers['A2_Preliminary:L1']['2a'] == '56')
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">56</span>
                    @else
                        <span style="margin: .5rem 2rem;">56</span>
                    @endif / 
                    @if (isset($answers['A2_Preliminary:L1']['2b']) && $answers['A2_Preliminary:L1']['2b'] == '65')
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">65</span>
                    @else
                        <span style="margin: .5rem 2rem;">65</span>
                    @endif / 
                    @if (isset($answers['A2_Preliminary:L1']['2c']) && $answers['A2_Preliminary:L1']['2c'] == '21')
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">21</span>
                    @else
                        <span style="margin: .5rem 2rem;">21</span>
                    @endif
                </li>
            </ol>
            <ol style="margin-left: 2rem;">
                <li>
                    @if (isset($answers['A2_Preliminary:L1']['3a']) && $answers['A2_Preliminary:L1']['3a'] == '2A')
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">2A</span>
                    @else
                        <span style="margin: .5rem 2rem;">2A</span>
                    @endif / 
                    @if (isset($answers['A2_Preliminary:L1']['3b']) && $answers['A2_Preliminary:L1']['3b'] == '5C')
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">5C</span>
                    @else
                        <span style="margin: .5rem 2rem;">5C</span>
                    @endif / 
                    @if (isset($answers['A2_Preliminary:L1']['3c']) && $answers['A2_Preliminary:L1']['3c'] == '3B')
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">3B</span>
                    @else
                        <span style="margin: .5rem 2rem;">3B</span>
                    @endif
                </li>
            </ol>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. You will hear a radio interview with a woman talking about something that happened to her when she was a child. Listen, then answer the questions.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">a. Who did she go camping with? <mark>{{ $answers['A2_Preliminary:L2'][1] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">b. How many tents did her father put up? <mark>{{ $answers['A2_Preliminary:L2'][2] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">c. What did her mother cook? <mark>{{ $answers['A2_Preliminary:L2'][3] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">d. How many days did the family spend camping? <mark>{{ $answers['A2_Preliminary:L2'][4] }}</mark></p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. You receive a voice message from a friend telling you about a problem he has. Write to him to give some advice.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A2_Preliminary:L3'][1] }}</mark></p>
        </main>
    </section>
@endsection