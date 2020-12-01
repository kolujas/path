@extends('pdf.exam')

@section('css')
    
@endsection

@section('title')
    <span style="font-size: 1.5rem;">{{ $evaluation->exam->name }}</span>
@endsection

@section('main')
    <header>
        <h2 style="text-align: center; padding-top: 2rem;">{{ $module->folder }} {{ $module->name }}</h2>
        @if ($candidate->full_name)
            <h3 style="text-align: center; color: #0091B7;">{{ $candidate->full_name }} ({{ $candidate->candidate_number }})</h3>
        @else
            <h3 style="text-align: center; color: #0091B7;">Candidate Number ({{ $candidate->candidate_number }})</h3>
        @endif
        <p style="text-align: center;">Strikes: {{ $answers['strikes'] }}</p>
    </header>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">1. Match the words to the images.<mark> One is done for you.</mark></h3>
        </header>
        <main>
            <ol style="margin-left: 2rem;" class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                @if (isset($answers['DEMO:RW1']) && isset($answers['DEMO:RW1'][1]))
                    <li class="answers inline mx-lg-2"><mark>{{ $answers['DEMO:RW1'][1] }}</mark></li>
                @else
                    <li class="answers inline mx-lg-2"><mark>null</mark></li>
                @endif
                @if (isset($answers['DEMO:RW1']) && isset($answers['DEMO:RW1'][2]))
                    <li class="answers inline mx-lg-2"><mark>{{ $answers['DEMO:RW1'][2] }}</mark></li>
                @else
                    <li class="answers inline mx-lg-2"><mark>null</mark></li>
                @endif
                <li class="answers inline mx-lg-2">Bedroom</li>
                @if (isset($answers['DEMO:RW1']) && isset($answers['DEMO:RW1'][3]))
                    <li class="answers inline mx-lg-2"><mark>{{ $answers['DEMO:RW1'][3] }}</mark></li>
                @else
                    <li class="answers inline mx-lg-2"><mark>null</mark></li>
                @endif
                @if (isset($answers['DEMO:RW1']) && isset($answers['DEMO:RW1'][4]))
                    <li class="answers inline mx-lg-2"><mark>{{ $answers['DEMO:RW1'][4] }}</mark></li>
                @else
                    <li class="answers inline mx-lg-2"><mark>null</mark></li>
                @endif
            </ol>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Complete</h3>
        </header>
        <main class="writing-question-two">
            <div style="margin-left: 4rem;" class="py-4 px-2 px-md-3">
                <p class="mb-4">In the bedroom, I can see a bed and <mark>{{ $answers['DEMO:RW2']['1'] }}</mark>.</p>
                <p class="mb-4">In the bathroom, I can see <mark>{{ $answers['DEMO:RW2']['2'] }}</mark> and <mark>{{ $answers['DEMO:RW2']['3'] }}</mark>.</p>
                <p class="mb-0">In the kitchen, I can see <mark>{{ $answers['DEMO:RW2']['4'] }}</mark> and <mark>{{ $answers['DEMO:RW2']['5'] }}</mark>.</p>
            </div>
        </main>
    </section>
    
    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. Complete the names of the animals.<mark> One is done for you.</mark></h3>
        </header>
        <main>
            <ol style="margin-left: 2rem;" class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                <li class="answers crossed inline mx-lg-2">horse</li>
                <li class="answers inline mx-lg-2">c<mark>{{ $answers['DEMO:RW3']['1'] }}</mark>ic<mark>{{ $answers['DEMO:RW3']['1c'] }}</mark>en</li>
                <li class="answers inline mx-lg-2">p<mark>{{ $answers['DEMO:RW3']['3'] }}</mark>g</li>
                <li class="answers inline mx-lg-2"><mark>{{ $answers['DEMO:RW3']['4a'] }}{{ $answers['DEMO:RW3']['4b'] }}</mark>e<mark>{{ $answers['DEMO:RW3']['4c'] }}</mark>p</li>
                <li class="answers inline mx-lg-2">c<mark>{{ $answers['DEMO:RW3']['5a'] }}{{ $answers['DEMO:RW3']['5b'] }}</mark></li>
            </ol>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4a. Read about Alice, then fill the spaces with <strong>am, is </strong>or <strong>are</strong>.<mark> One is done for you.</mark></h3>
        </header>
        <main>
            <p style="padding: 0 2rem;">Hello! My friend Beth and I <mark>{{ $answers['DEMO:RW4A']['1'] }}</mark> good friends. She <mark>{{ $answers['DEMO:RW4A']['2'] }}</mark> 10 years old and I <mark>{{ $answers['DEMO:RW4A']['3'] }}</mark>.
                My hair is short. Beth's hair <mark>{{ $answers['DEMO:RW4A']['4'] }}</mark> long. </p>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4b. Who is Alice? Who is Beth? Write their names under the pictures.</h3>
        </header>
        <main>
            <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                
            <ol style="margin-left: 2rem;">
                <li><mark>{{ $answers['DEMO:RW4B']['1'] }}</mark></li>
                <li><mark>{{ $answers['DEMO:RW4B']['2'] }}</mark></li>
            </ol>
                
            </div>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">5. Write about your friend.</h3>
        </header>
        <main>
        <p style="padding: 0 4rem; color: #000;">My friend: <mark>{{ $answers['DEMO:RW5']['1'] }}</amrk></p>
        </main>
    </section>
@endsection