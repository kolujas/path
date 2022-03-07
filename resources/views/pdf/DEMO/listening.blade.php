<header>
    <h2 style="text-align: center; padding-top: 2rem;">{{ $module->folder }} {{ $module->name }}</h2>
    <h3 style="text-align: center; color: #0091B7;">Candidate Number: ({{ $candidate->candidate_number }})</h3>
    <p style="text-align: center;">Strikes: {{ $answers['strikes'] }}</p>
</header>

<section>
    <header>
        <h3 style="padding-top: 2rem;">1. Look at the table below. Listen to Susana talking about her family, and complete the spaces in the table. You can listen twice.<mark> One is done for you.</mark></h3>
    </header>
    <table style="margin: auto; border: 1px solid #ccc;">
        <thead>
            <tr style="background-color: #fff;">
                <th style="padding: 1rem 2rem;" scope="col"></th>
                <th style="padding: 1rem 2rem;" scope="col">Me</th>
                <th style="padding: 1rem 2rem;" scope="col"><mark>{{ $answers['DEMO:L1']['2a'] }}{{ $answers['DEMO:L1']['2b'] }}</mark>ther</th>
                <th style="padding: 1rem 2rem;" scope="col"><mark>{{ $answers['DEMO:L1']['4a'] }}{{ $answers['DEMO:L1']['4b'] }}</mark>ther</th>
                <th style="padding: 1rem 2rem;" scope="col">sister</th>
                <th style="padding: 1rem 2rem;" scope="col"><mark>{{ $answers['DEMO:L1']['6a'] }}{{ $answers['DEMO:L1']['6b'] }}{{ $answers['DEMO:L1']['6c'] }}{{ $answers['DEMO:L1']['6d'] }}{{ $answers['DEMO:L1']['6e'] }}</mark>er</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" style="background-color: #ccc; padding: 1rem 2rem;">Name</th>
                <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Susana</td>
                <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Lee</td>
                <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Alex</td>
                <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Gemma</td>
                <td style="background-color: #ccc; border: 0; padding: 1rem 2rem; text-align: center;">Phil</td>
            </tr>
            <tr>
                <th style="padding: 1rem 2rem;" scope="row">Age</th>
                <td style="text-align: center"><mark>{{ $answers['DEMO:L1']['1a'] }}{{ $answers['DEMO:L1']['1b'] }}</mark></td>
                <td style="text-align: center">40</td>
                <td style="text-align: center">38</td>
                <td style="text-align: center"><mark>{{ $answers['DEMO:L1']['7a'] }}{{ $answers['DEMO:L1']['7b'] }}</mark></td>
                <td style="text-align: center"><mark>{{ $answers['DEMO:L1']['8'] }}</mark></td>
            </tr>
            <tr>
                <th style="background-color: #ccc; border: 0; padding: 1rem 2rem;" scope="row">Job</th>
                <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">-</td>
                <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">te<mark>{{ $answers['DEMO:L1']['3a'] }}{{ $answers['DEMO:L1']['3b'] }}{{ $answers['DEMO:L1']['3c'] }}</mark>er</td>
                <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">doc<mark>{{ $answers['DEMO:L1']['5a'] }}{{ $answers['DEMO:L1']['5b'] }}</mark>r</td>
                <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">-</td>
                <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">-</td>
            </tr>
        </tbody>
    </table>
</section>

<section>
    <header>
        <h3 style="padding-top: 2rem;">2. You will hear Susana talking about happy days and sad days. Which are happy, and which are sad? <mark>One is done for you.</mark></h3>
    </header>
    <table class="table table-striped mb-4">
        <thead>
            <tr>
                <th class="text-center" scope="col"><i class="face-icons far fa-smile "></i>OK</th>
                <th scope="col">friday</th>
                <th scope="col"><mark>{{ $answers['DEMO:L2']['1'] }}</mark>day</th>
                <th scope="col"><mark>{{ $answers['DEMO:L2']['2'] }}</mark>day</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="text-center" scope="row"><i class="face-icons far fa-frown text-center"></i>BAD
                </th>
                <th style="background-color: #ccc; border-left: 1px solid #ccc;" scope="col"><mark>{{ $answers['DEMO:L2']['3'] }}</mark>day</th>
                <th style="background-color: #ccc; border: 0;" scope="col"><mark>{{ $answers['DEMO:L2']['4'] }}</mark>day</th>
                <th style="background-color: #ccc; border: 0;" scope="col"><mark>{{ $answers['DEMO:L2']['5'] }}</mark>day</th>
            </tr>
        </tbody>
    </table>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">3. Where Jack lives there are ten houses. Listening to him tell you about each house, then complete the table with the numbers <mark>Two are done for you.</mark></h3>
    </header>
    <table class="table table-striped mb-4 table-question-3">
        <thead>
            <tr>
                <th style="border-bottom: 1px solid #ccc" scope="col">I live at..</th>
                <th style="background-color: #ccc;" scope="col">7</th>
                <th style="border-bottom: 1px solid #ccc" scope="col">North street</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="border-bottom: 1px solid #ccc" scope="col">A teacher lives at number..</th>
                <th style="background-color: #ccc;" scope="col">4</th>
                <th style="border-bottom: 1px solid #ccc" scope="col"></th>
            </tr>
            <tr>
                <th style="border-bottom: 1px solid #ccc" scope="col">A nurse lives at numbers..</th>
                <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['DEMO:L3']['1'] }}</mark></th>
                <th style="border-bottom: 1px solid #ccc" scope="col"></th>
            </tr>
            <tr>
                <th style="border-bottom: 1px solid #ccc" scope="col">My aunt Wendy lives at number..</th>
                <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['DEMO:L3']['2'] }}</mark></th>
                <th style="border-bottom: 1px solid #ccc" scope="col"></th>
            </tr>
            <tr>
                <th style="border-bottom: 1px solid #ccc" scope="col">I don't know who lives at number..</th>
                <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['DEMO:L3']['3'] }}</mark></th>
                <th style="border-bottom: 1px solid #ccc" scope="col"></th>
            </tr>
            <tr>
                <th style="border-bottom: 1px solid #ccc" scope="col">I don't know who lives at number..</th>
                <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['DEMO:L3']['4'] }}</mark></th>
                <th style="border-bottom: 1px solid #ccc" scope="col"></th>

            </tr>
            <tr>
                <th style="border-bottom: 1px solid #ccc" scope="col">Number..</th>
                <th style="background-color: #ccc;" scope="col"><mark>{{ $answers['DEMO:L3']['5'] }}</mark></th>
                <th style="border-bottom: 1px solid #ccc" scope="col">is a cafe</th>
            </tr>
        </tbody>
    </table>
</section>