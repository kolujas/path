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
            <h3 style="padding-top: 2rem;">1. Look at the table of colours and items clothing. Write the colours and clothing in the speech fields.<mark>Two have been done for you</mark>.</h3>
        </header>
        <main>
            @if (isset($answers['A1_Access:W1'] && isset($answers['A1_Access:W1'][1])))
            <p style="padding: 0 4rem; color: #000;">I am wearing a <mark>{{ $answers['A1_Access:W1'][1] }}</mark> T-Shirt.</p>
            @else
            <p style="padding: 0 4rem; color: #000;">I am wearing a <mark>null</mark> T-Shirt.</p>
            @endif
            @if (isset($answers['A1_Access:W1'] && isset($answers['A1_Access:W1'][2]) && isset($answers['A1_Access:W1'][3])))
            <p style="padding: 0 4rem; color: #000;">I am wearing a yellow <mark>{{ $answers['A1_Access:W1'][2] }}</mark> and <mark>{{ $answers['A1_Access:W1'][3] }}</mark> trousers</p>
            @elseif (isset($answers['A1_Access:W1'] && isset($answers['A1_Access:W1'][2])))
            <p style="padding: 0 4rem; color: #000;">I am wearing a yellow <mark>{{ $answers['A1_Access:W1'][2] }}</mark> and <mark>null</mark> trousers</p>
            @elseif (isset($answers['A1_Access:W1'] && isset($answers['A1_Access:W1'][3])))
            <p style="padding: 0 4rem; color: #000;">I am wearing a yellow <mark>null</mark> and <mark>{{ $answers['A1_Access:W1'][3] }}</mark> trousers</p>
            @else
            <p style="padding: 0 4rem; color: #000;">I am wearing a yellow <mark>null</mark> and <mark>null</mark> trousers</p>
            @endif
            @if (isset($answers['A1_Access:W1'] && isset($answers['A1_Access:W1'][1])))
            <p style="padding: 0 4rem; color: #000;">I am wearing a Green <mark>{{ $answers['A1_Access:W1'][4] }}</mark></p>
            @else
            <p style="padding: 0 4rem; color: #000;">I am wearing a Green <mark>null</mark></p>
            @endif
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2.a. Fill the gaps in the words, then match the words to the activities shown in the table. <mark>One is done for you</mark>.</h3>
        </header>
        <table style="margin: auto; border: 1px solid #ccc;">
            <tbody>
                <tr>
                    <th scope="row" style="padding: 1rem 2rem;">Run</th>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">A</td>
                </tr>
                <tr>
                    <th scope="row" style="padding: 1rem 2rem;"><mark>{{ $answers['A1_Access:W2A'][1] }}</mark>rite</th>
                    @if (isset($answers['A1_Access:W2A']) && isset($answers['A1_Access:W2A'][2]))
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>{{ $answers['A1_Access:W2A'][2] }}</mark></td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>null</mark></td>
                    @endif
                </tr>
                <tr>
                    <th scope="row" style="padding: 1rem 2rem;">Dan<mark>{{ $answers['A1_Access:W2A'][3] }}</mark>e</th>
                    @if (isset($answers['A1_Access:W2A']) && isset($answers['A1_Access:W2A'][4]))
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>{{ $answers['A1_Access:W2A'][4] }}</mark></td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>null</mark></td>
                    @endif
                </tr>
                <tr>
                    <th scope="row" style="padding: 1rem 2rem;">S<mark>{{ $answers['A1_Access:W2A'][5] }}</mark>im</th>
                    @if (isset($answers['A1_Access:W2A']) && isset($answers['A1_Access:W2A'][6]))
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>{{ $answers['A1_Access:W2A'][6] }}</mark></td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>null</mark></td>
                    @endif
                </tr>
                <tr>
                    <th scope="row" style="padding: 1rem 2rem;">Wat<mark>{{ $answers['A1_Access:W2A'][7] }}</mark>h</th>
                    @if (isset($answers['A1_Access:W2A']) && isset($answers['A1_Access:W2A'][8]))
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>{{ $answers['A1_Access:W2A'][8] }}</mark></td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>null</mark></td>
                    @endif
                </tr>
                <tr>
                    <th scope="row" style="padding: 1rem 2rem;">Re<mark>{{ $answers['A1_Access:W2A'][9] }}</mark>d</th>
                    @if (isset($answers['A1_Access:W2A']) && isset($answers['A1_Access:W2A'][10]))
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>{{ $answers['A1_Access:W2A'][10] }}</mark></td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>null</mark></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2.b. Which activities...</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;">...are good for your body?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A1_Access:W2B'][1] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;">...are good for your brain?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A1_Access:W2B'][2] }}</mark></p>
        </main>
    </section>
    
    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. Match the months to the season for your country. <mark>One is done for you</mark>.</h3>
        </header>
        <table style="margin: auto; border: 1px solid #ccc;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ccc" scope="col" colspan="2"></th>
                    <th style="border: 1px solid #ccc" scope="col">Month</th>
                    <th style="border: 1px solid #ccc" scope="col">season</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="border: 1px solid #ccc" scope="col">1</th>
                    <th style="border: 1px solid #ccc" scope="col">The weather is cooler and the leaves fall off the trees</th>
                    <td style="background-color: #ccc; text-align: center;" scope="col">April</td>
                    @if (isset($answers['A1_Access:W3']) && isset($answers['A1_Access:W3'][1]))
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>{{ $answers['A1_Access:W3'][1] }}</mark></td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>null</mark></td>
                    @endif
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc" scope="col">2</th>
                    <th style="border: 1px solid #ccc" scope="col">The weather gets really hot!</th>
                    @if (isset($answers['A1_Access:W3']) && isset($answers['A1_Access:W3'][2]))
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>{{ $answers['A1_Access:W3'][2] }}</mark></td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>null</mark></td>
                    @endif
                    <td style="background-color: #ccc; text-align: center;" scope="col">Summer</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc" scope="col">3</th>
                    <th style="border: 1px solid #ccc" scope="col">It's cold and it rains a lot!</th>
                    @if (isset($answers['A1_Access:W3']) && isset($answers['A1_Access:W3'][3]))
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>{{ $answers['A1_Access:W3'][3] }}</mark></td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>null</mark></td>
                    @endif
                    <td style="background-color: #ccc; text-align: center;" scope="col">Winter</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc" scope="col">4</th>
                    <th style="border: 1px solid #ccc" scope="col">Flowers start blooming.</th>
                    <td style="background-color: #ccc; text-align: center;" scope="col">September</td>
                    @if (isset($answers['A1_Access:W3']) && isset($answers['A1_Access:W3'][4]))
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>{{ $answers['A1_Access:W3'][4] }}</mark></td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"><mark>null</mark></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4. Write about things you like doing in the summer</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A1_Access:W4'][1] }}</mark></p>
        </main>
    </section>
@endsection