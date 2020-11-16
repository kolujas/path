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
            <h3 style="padding-top: 2rem;">1. Look at the table below. Listen to Anna talking about her family, and complete the boxes in the table. You can listen twice. <mark>One answers is done for you</mark>.</h3>
        </header>
        <table style="margin: auto; border: 1px solid #ccc;">
            <thead>
                <tr style="background-color: #fff;">
                    <th style="padding: 1rem 2rem;" scope="col"></th>
                    <th style="padding: 1rem 2rem;" scope="col">Me</th>
                    <th style="padding: 1rem 2rem;" scope="col">Mother</th>
                    <th style="padding: 1rem 2rem;" scope="col"><mark>{{ $answers['A1_Entry:L1']['3a'] }}</mark><mark>{{ $answers['A1_Entry:L1']['3b'] }}</mark>ther</th>
                    <th style="padding: 1rem 2rem;" scope="col"><mark>{{ $answers['A1_Entry:L1']['5a'] }}</mark><mark>{{ $answers['A1_Entry:L1']['5b'] }}</mark>ster</th>
                    <th style="padding: 1rem 2rem;" scope="col"><mark>{{ $answers['A1_Entry:L1']['7a'] }}</mark><mark>{{ $answers['A1_Entry:L1']['7b'] }}</mark><mark>{{ $answers['A1_Entry:L1']['7c'] }}</mark>ther</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" style="background-color: #ccc; padding: 1rem 2rem;">Name</th>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Julie</td>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Tina</td>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Martin</td>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Jane</td>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Charlie</td>
                </tr>
                <tr>
                    <th style="padding: 1rem 2rem;" scope="row">Age</th>
                    <td style="text-align: center"><mark>{{ $answers['A1_Entry:L1']['1'] }}</mark></td>
                    <td style="text-align: center">41</td>
                    <td style="text-align: center">43</td>
                    <td style="text-align: center"><mark>{{ $answers['A1_Entry:L1']['6a'] }}</mark><mark>{{ $answers['A1_Entry:L1']['6b'] }}</mark></td>
                    <td style="text-align: center"><mark>{{ $answers['A1_Entry:L1']['8a'] }}</mark><mark>{{ $answers['A1_Entry:L1']['8b'] }}</mark></td>
                </tr>
                <tr>
                    <th style="background-color: #ccc; border: 0; padding: 1rem 2rem;" scope="row">Job</th>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">X</td>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">Man<mark>{{ $answers['A1_Entry:L1']['2'] }}</mark>ger</td>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">D<mark>{{ $answers['A1_Entry:L1']['4a'] }}</mark><mark>{{ $answers['A1_Entry:L1']['4b'] }}</mark>tist</td>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">X</td>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">X</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. You will hear Anna talking about happy days and sad days. Which are happy, and which are sad? <mark>One is done for you</mark>.</h3>
        </header>
        <table style="margin: auto; border: 1px solid #ccc;">
            <thead>
                <tr>
                    <th scope="col">OK</th>
                    <td scope="col" style="background-color: #ccc; border: 0;" scope="col">friday</td>
                    <td scope="col" style="background-color: #ccc; border: 0;" scope="col"><mark>{{ $answers['A1_Entry:L2'][1] }}</mark>day</td>
                    <td scope="col" style="background-color: #ccc; border: 0;" scope="col"><mark>{{ $answers['A1_Entry:L2'][2] }}</mark>day</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">BAD</i>
                    </th>
                    <td style="background-color: #ccc; border: 0;" scope="col"><mark>{{ $answers['A1_Entry:L2'][3] }}</mark>day</td>
                    <td style="background-color: #ccc; border: 0;" scope="col"><mark>{{ $answers['A1_Entry:L2'][4] }}</mark>day</td>
                    <td style="background-color: #ccc; border: 0;" scope="col"><mark>{{ $answers['A1_Entry:L2'][5] }}</mark>day</td>
                </tr>
            </tbody>
        </table>
    </section>

    <pagebreak />
    
    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. Where Charles lives there are ten houses. Listen to him tell you about each house, then complete the table with the numbers. <mark>Two are done for you</mark>.</h3>
        </header>
        <table style="margin: auto; border: 1px solid #ccc;">
            <thead>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">I live at..</th>
                    <th style="background-color: #ccc;" scope="col">10</th>
                    <th style="border-bottom: 1px solid #ccc" scope="col">Ash Avenue</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">A doctor lives at number..</th>
                    <th style="background-color: #ccc;" scope="col">12</th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">A policeman lives at number..</th>
                    <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['A1_Entry:L3'][1] }}</mark></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">My aunt Mary lives at number..</th>
                    <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['A1_Entry:L3'][2] }}</mark></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">I don't know who lives at number..</th>
                    <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['A1_Entry:L3'][3] }}</mark></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">I don't know who lives at number..</th>
                    <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['A1_Entry:L3'][4] }}</mark></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">Number..</th>
                    <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['A1_Entry:L3'][5] }}</mark></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col">is a bakery</th>
                </tr>
            </tbody>
        </table>
    </section>
@endsection