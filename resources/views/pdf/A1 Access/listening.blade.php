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
            <h3 style="padding-top: 2rem;">1. You will hear three sentences, which describe three of the image below. Match each sentence to an image.<mark>Two are not used</mark>.</h3>
        </header>
        <main>
            <ol style="margin-left: 2rem;" class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                <li class="answers crossed inline mx-lg-2"><mark>{{ $answers['A1_Access:L1'][1] }}</mark></li>
                <li class="answers inline mx-lg-2"><mark>{{ $answers['A1_Access:L1'][2] }}</mark></li>
                <li class="answers inline mx-lg-2"><mark>{{ $answers['A1_Access:L1'][3] }}</mark></li>
            </ol>
        </main>
    </section>
    
    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. You will hear Emma asking her friend Lois what she likes to eat and drink. Complete the tabla showing what she loves, likes and doesn't like. <mark>One has been done for you</mark>.</h3>
        </header>
        <table style="margin: auto; border: 1px solid #ccc;">
            <tbody>
                <tr>
                    <th style="border-bottom: 1px solid #ccc; padding: 10px;" scope="col">Meat</th>
                    <th style="background-color: #ccc; padding: 10px;" scope="col">Doesn't like</th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc; padding: 10px;" scope="col">Fish</th>
                    @if (isset($answers['A1_Access:L2']) && isset($answers['A1_Access:L2'][1]))
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>{{ $answers['A1_Access:L2'][1] }}</mark></th>
                    @else
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>null</mark></th>
                    @endif
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc; padding: 10px;" scope="col">Potatoes</th>
                    @if (isset($answers['A1_Access:L2']) && isset($answers['A1_Access:L2'][2]))
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>{{ $answers['A1_Access:L2'][2] }}</mark></th>
                    @else
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>null</mark></th>
                    @endif
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc; padding: 10px;" scope="col">Pasta</th>
                    @if (isset($answers['A1_Access:L2']) && isset($answers['A1_Access:L2'][3]))
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>{{ $answers['A1_Access:L2'][3] }}</mark></th>
                    @else
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>null</mark></th>
                    @endif
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc; padding: 10px;" scope="col">Rice</th>
                    @if (isset($answers['A1_Access:L2']) && isset($answers['A1_Access:L2'][4]))
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>{{ $answers['A1_Access:L2'][4] }}</mark></th>
                    @else
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>null</mark></th>
                    @endif
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc; padding: 10px;" scope="col">Lemonade</th>
                    @if (isset($answers['A1_Access:L2']) && isset($answers['A1_Access:L2'][5]))
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>{{ $answers['A1_Access:L2'][5] }}</mark></th>
                    @else
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>null</mark></th>
                    @endif
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc; padding: 10px;" scope="col">Coke</th>
                    @if (isset($answers['A1_Access:L2']) && isset($answers['A1_Access:L2'][6]))
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>{{ $answers['A1_Access:L2'][6] }}</mark></th>
                    @else
                        <th style="background-color: #ccc; padding: 10px;" scope="col"><mark>null</mark></th>
                    @endif
                </tr>
            </tbody>
        </table>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. After dinner, Emma and Lois play the game 'Rock, Paper, Scissors'. Listen to them play, then full the gaps with <b>my</b> or <b>your</b>.</h3>
        </header>
        <main>
            <p style="padding: 0 2rem;"><b class="mr-1">Lois:</b> <mark>{{ $answers['A1_Access:L3'][1] }}</mark> turn first. Rock! I win! Is it <mark>{{ $answers['A1_Access:L3'][2] }}</mark>turn now or <mark>{{ $answers['A1_Access:L3'][3] }}</mark>turn?</p>
            <p style="padding: 0 2rem;"><b class="mr-1">Emma:</b> It's <mark>{{ $answers['A1_Access:L3'][4] }}</mark> turn because you won.</p>
            <p style="padding: 0 2rem;"><b class="mr-1">Lois:</b> Ok. Paper! Oh i lose. <mark>{{ $answers['A1_Access:L3'][5] }}</mark> turn.</p>
        </main>
    </section>
@endsection