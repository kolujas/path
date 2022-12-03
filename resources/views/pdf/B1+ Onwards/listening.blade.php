<header>
    <h2 style="text-align: center; padding-top: 2rem;">{{ $module->folder }} {{ $module->name }}</h2>
    <h3 style="text-align: center; color: #0091B7;">Candidate Number: ({{ $candidate->candidate_number }})</h3>
    <p style="text-align: center;">Strikes: {{ $answers['strikes'] }}</p>
</header>

<section>
    <header>
        <h3 style="padding-top: 2rem;">1. Listen to an apartment rental interview, then select the correct answer.</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;"><b>a.</b> How many food shops will the applicant have access to?</p>
        <p style="color: #0091B7; padding: 0 4rem;">
            @if (isset($answers['B1_Onwards:L1'][1]) && $answers['B1_Onwards:L1'][1] == 'One')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">One</span>
            @else
                <span style="margin: .5rem 2rem;">One</span>
            @endif
            @if (isset($answers['B1_Onwards:L1'][1]) && $answers['B1_Onwards:L1'][1] == 'Two')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Two</span>
            @else
                <span style="margin: .5rem 2rem;">Two</span>
            @endif
            @if (isset($answers['B1_Onwards:L1'][1]) && $answers['B1_Onwards:L1'][1] == 'Three')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Three</span>
            @else
                <span style="margin: .5rem 2rem;">Three</span>
            @endif
        </p>

        <p style="padding: 0 4rem; color: #000;"><b>b.</b> Can the applicant apply for a parking permit today?</p>
        <p style="color: #0091B7; padding: 0 4rem;">
            @if (isset($answers['B1_Onwards:L1'][2]) && $answers['B1_Onwards:L1'][2] == 'Yes')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">Yes.</span>
            @else
                <span style="margin: .5rem 2rem;">Yes.</span>
            @endif
            @if (isset($answers['B1_Onwards:L1'][2]) && $answers['B1_Onwards:L1'][2] == 'No')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">No.</span>
            @else
                <span style="margin: .5rem 2rem;">No.</span>
            @endif
            @if (isset($answers['B1_Onwards:L1'][2]) && $answers['B1_Onwards:L1'][2] == "We don't know")
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">We don't know.</span>
            @else
                <span style="margin: .5rem 2rem;">We don't know.</span>
            @endif
        </p>

        <p style="padding: 0 4rem; color: #000;"><b>c.</b> What is the main reason for the applicant being unsuccessful?</p>
        <p style="color: #0091B7; padding: 0 4rem;">
            @if (isset($answers['B1_Onwards:L1'][3]) && $answers['B1_Onwards:L1'][3] == 'He is not English')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">He is not English.</span>
            @else
                <span style="margin: .5rem 2rem;">He is not English.</span>
            @endif
            @if (isset($answers['B1_Onwards:L1'][3]) && $answers['B1_Onwards:L1'][3] == 'He lived abroad for three years')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">He lived abroad for three years.</span>
            @else
                <span style="margin: .5rem 2rem;">He lived abroad for three years.</span>
            @endif
            <br />
            @if (isset($answers['B1_Onwards:L1'][3]) && $answers['B1_Onwards:L1'][3] == 'His credit record is poor')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">His credit record is poor.</span>
            @else
                <span style="margin: .5rem 2rem;">His credit record is poor.</span>
            @endif
        </p>

        <p style="padding: 0 4rem; color: #000;"><b>d.</b> What solution does the landlord offer? The applicant...</p>
        <p style="color: #0091B7; padding: 0 4rem;">
            @if (isset($answers['B1_Onwards:L1'][4]) && $answers['B1_Onwards:L1'][4] == '...pays more money in advance')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...pays more money in advance.</span>
            @else
                <span style="margin: .5rem 2rem;">...pays more money in advance.</span>
            @endif
            @if (isset($answers['B1_Onwards:L1'][4]) && $answers['B1_Onwards:L1'][4] == '...pays a higher rent')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...pays a higher rent.</span>
            @else
                <span style="margin: .5rem 2rem;">...pays a higher rent.</span>
            @endif
            @if (isset($answers['B1_Onwards:L1'][4]) && $answers['B1_Onwards:L1'][4] == '...offers a deal')
                <span style="margin: .5rem 2rem; padding: .75rem 1.25rem; border: 2px solid #0091B7;">...offers a deal.</span>
            @else
                <span style="margin: .5rem 2rem;">...offers a deal.</span>
            @endif
        </p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">2. Listen to a talk show, then write three summaries based on the main points of view of each speaker.</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;"><b>a.</b> Speaker 1: A talk show host</p>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Onwards:L2'][1]) !!}</mark></p>

        <p style="padding: 0 4rem; color: #000;"><b>b.</b> Speaker 2: Jenny – an actress</p>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Onwards:L2'][2]) !!}</mark></p>

        <p style="padding: 0 4rem; color: #000;"><b>c.</b> Speaker 3: Alex – a film producer</p>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Onwards:L2'][3]) !!}</mark></p>
    </main>
</section>

<section>
    <header>
        <h3 style="padding-top: 2rem;">3. Listen to the synopsis of a novel, then give your opinion, stating whether or not you would like to read the novel, giving your reasons</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Onwards:L3'][1]) !!}</mark></p>
    </main>
</section>