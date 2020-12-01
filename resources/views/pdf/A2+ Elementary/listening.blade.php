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
            <h3 style="padding-top: 2rem;">1. Listen to a conversation between a man and a woman, then tick the correct boxes.</h3>
        </header>
        <table style="margin: auto; border: 1px solid #ccc;">
            <thead>
                <tr style="background-color: #fff;">
                    <th style="padding: 1rem 2rem;" scope="col">Who...</th>
                    <th style="padding: 1rem 2rem;" scope="col">Man</th>
                    <th style="padding: 1rem 2rem;" scope="col">Woman</th>
                    <th style="padding: 1rem 2rem;" scope="col">Both</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" style="background-color: #ccc; padding: 1rem 2rem;">...has a pet?</th>
                    @if (isset($answers['A2_Elementary:L1'][1]) && $answers['A2_Elementary:L1'][1] == 'Man')
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Man</td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"></td>
                    @endif
                    @if (isset($answers['A2_Elementary:L1'][1]) && $answers['A2_Elementary:L1'][1] == 'Woman')
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Woman</td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"></td>
                    @endif
                    @if (isset($answers['A2_Elementary:L1'][1]) && $answers['A2_Elementary:L1'][1] == 'Both')
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Both</td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"></td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">...enjoys being close to the river?</th>
                    @if (isset($answers['A2_Elementary:L1'][2]) && $answers['A2_Elementary:L1'][2] == 'Man')
                        <td style="text-align: center;">Man</td>
                    @else
                        <td style="text-align: center;"></td>
                    @endif
                    @if (isset($answers['A2_Elementary:L1'][2]) && $answers['A2_Elementary:L1'][2] == 'Woman')
                        <td style="text-align: center;">Woman</td>
                    @else
                        <td style="text-align: center;"></td>
                    @endif
                    @if (isset($answers['A2_Elementary:L1'][2]) && $answers['A2_Elementary:L1'][2] == 'Both')
                        <td style="text-align: center;">Both</td>
                    @else
                        <td style="text-align: center;"></td>
                    @endif
                </tr>
                <tr>
                    <th scope="row" style="background-color: #ccc; padding: 1rem 2rem;">...describes an accident?</th>
                    @if (isset($answers['A2_Elementary:L1'][3]) && $answers['A2_Elementary:L1'][3] == 'Man')
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Man</td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"></td>
                    @endif
                    @if (isset($answers['A2_Elementary:L1'][3]) && $answers['A2_Elementary:L1'][3] == 'Woman')
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Woman</td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"></td>
                    @endif
                    @if (isset($answers['A2_Elementary:L1'][3]) && $answers['A2_Elementary:L1'][3] == 'Both')
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Both</td>
                    @else
                        <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;"></td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">...makes a suggestion?</th>
                    @if (isset($answers['A2_Elementary:L1'][4]) && $answers['A2_Elementary:L1'][4] == 'Man')
                        <td style="text-align: center;">Man</td>
                    @else
                        <td style="text-align: center;"></td>
                    @endif
                    @if (isset($answers['A2_Elementary:L1'][4]) && $answers['A2_Elementary:L1'][4] == 'Woman')
                        <td style="text-align: center;">Woman</td>
                    @else
                        <td style="text-align: center;"></td>
                    @endif
                    @if (isset($answers['A2_Elementary:L1'][4]) && $answers['A2_Elementary:L1'][4] == 'Both')
                        <td style="text-align: center;">Both</td>
                    @else
                        <td style="text-align: center;"></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. The following week, the same man and woman have another conversation. Listen, and answer the questions.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> In your own words, explain what the woman thinks about walking.</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A2_Elementary:L2'][1] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;"><b>b.</b> In your own words, explain what the man thinks about cycling.</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A2_Elementary:L2'][2] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;"><b>c.</b> Who do you agree with the most? Give reasons for your answer.</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A2_Elementary:L2'][3] }}</mark></p>
        </main>
    </section>

    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. You will hear three announcements. Listen, then answer the questions.</h3>
        </header>
        <main>
            <h4 style="color: #014969;">1. You are on a plane when the flight attendant makes an announcement:</h4>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> You’re hungry and need hot food. Which of the items below are available?</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if ($answers['A2_Elementary:L3']&& isset($answers['A2_Elementary:L3']['1a']))
                    @if (isset($answers['A2_Elementary:L3']['1a']['1']))
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Soup</span>
                    @else
                        <span style="margin: .5rem 2rem;">Soup</span>
                    @endif
                    @if (isset($answers['A2_Elementary:L3']['1a']['2']))
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Sandwiches</span>
                    @else
                        <span style="margin: .5rem 2rem;">Sandwiches</span>
                    @endif
                    @if (isset($answers['A2_Elementary:L3']['1a']['3']))
                        <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Baguettes</span>
                    @else
                        <span style="margin: .5rem 2rem;">Baguettes</span>
                    @endif
                @else
                    <span style="margin: .5rem 2rem;">Soup</span>
                    <span style="margin: .5rem 2rem;">Sandwiches</span>
                    <span style="margin: .5rem 2rem;">Baguettes</span>
                @endif
            </p>
            <p style="padding: 0 4rem; color: #000;"><b>b.</b> How can you get more information about what food is available?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A2_Elementary:L3']['1b'] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;"><b>c.</b> You have USD100 in cash. You have a debit card in your hand luggage, which is in the locker above your head. Do you need to do anything?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A2_Elementary:L3']['1c'] }}</mark></p>
            
            <h4 style="color: #014969;">2. You are on a train when you hear an announcement:</h4>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> How late is the train going to be?</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['A2_Elementary:L3']['2a']) && $answers['A2_Elementary:L3']['2a'] == '13 minutes')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">13 minutes</span>
                @else
                    <span style="margin: .5rem 2rem;">13 minutes</span>
                @endif
                @if (isset($answers['A2_Elementary:L3']['2a']) && $answers['A2_Elementary:L3']['2a'] == '20 minutes')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">20 minutes</span>
                @else
                    <span style="margin: .5rem 2rem;">20 minutes</span>
                @endif
                @if (isset($answers['A2_Elementary:L3']['2a']) && $answers['A2_Elementary:L3']['2a'] == '30 minutes')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">30 minutes</span>
                @else
                    <span style="margin: .5rem 2rem;">30 minutes</span>
                @endif
            </p>
            <p style="padding: 0 4rem; color: #000;"><b>b.</b> You want to catch the 11:54 train to London. Will you miss the train?</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['A2_Elementary:L3']['2b']) && $answers['A2_Elementary:L3']['2b'] == 'Yes')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Yes</span>
                @else
                    <span style="margin: .5rem 2rem;">Yes</span>
                @endif
                @if (isset($answers['A2_Elementary:L3']['2b']) && $answers['A2_Elementary:L3']['2b'] == 'No')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">No</span>
                @else
                    <span style="margin: .5rem 2rem;">No</span>
                @endif
                @if (isset($answers['A2_Elementary:L3']['2b']) && $answers['A2_Elementary:L3']['2b'] == 'You don\'t know')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">You don't know</span>
                @else
                    <span style="margin: .5rem 2rem;">You don't know</span>
                @endif
            </p>
            <p style="padding: 0 4rem; color: #000;"><b>c.</b> You have very heavy bags. Will these be a problem at Manchester station? Give the reason.</p>
            <p style="padding: 0 4rem; color: #000; margin-bottom: 2rem;"><mark>{{ $answers['A2_Elementary:L3']['2c'] }}</mark></p>

            <h4 style="color: #014969;">3. You are in a taxi. The driver makes an announcement:</h4>
            <p style="padding: 0 4rem; color: #000;"><b>a.</b> Why is the city centre closed?</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['A2_Elementary:L3']['3a']) && $answers['A2_Elementary:L3']['3a'] == 'People are protesting')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">People are protesting</span>
                @else
                    <span style="margin: .5rem 2rem;">People are protesting</span>
                @endif
                @if (isset($answers['A2_Elementary:L3']['3a']) && $answers['A2_Elementary:L3']['3a'] == 'There is a gas emergency')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">There is a gas emergency</span>
                @else
                    <span style="margin: .5rem 2rem;">There is a gas emergency</span>
                @endif
                @if (isset($answers['A2_Elementary:L3']['3a']) && $answers['A2_Elementary:L3']['3a'] == 'There has been a major accident')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">There has been a major accident</span>
                @else
                    <span style="margin: .5rem 2rem;">There has been a major accident</span>
                @endif
            </p>
            <p style="padding: 0 4rem; color: #000;"><b>b.</b> You have a job interview at 1pm. Do you need to do anything?</p>
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['A2_Elementary:L3']['3b'] }}</mark></p>
            <p style="padding: 0 4rem; color: #000;"><b>c.</b> You have £20 GBP. Is this enough money to pay the taxi?</p>
            <p style="color: #0091B7; padding: 0 4rem;">
                @if (isset($answers['A2_Elementary:L3']['3c']) && $answers['A2_Elementary:L3']['3c'] == 'Yes')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Yes</span>
                @else
                    <span style="margin: .5rem 2rem;">Yes</span>
                @endif
                @if (isset($answers['A2_Elementary:L3']['3c']) && $answers['A2_Elementary:L3']['3c'] == 'No')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">No</span>
                @else
                    <span style="margin: .5rem 2rem;">No</span>
                @endif
                @if (isset($answers['A2_Elementary:L3']['3c']) && $answers['A2_Elementary:L3']['3c'] == 'You don\'t know')
                    <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">You don't know</span>
                @else
                    <span style="margin: .5rem 2rem;">You don't know</span>
                @endif
            </p>
        </main>
    </section>
@endsection