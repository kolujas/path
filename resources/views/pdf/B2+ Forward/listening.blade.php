<header>
    <h2 style="text-align: center; padding-top: 2rem;">{{ $module->folder }} {{ $module->name }}</h2>
    <h3 style="text-align: center; color: #0091B7;">Candidate Number: ({{ $candidate->candidate_number }})</h3>
    <p style="text-align: center;">Strikes: {{ $answers['strikes'] }}</p>
</header>

<section>
    <header>
        <h3 style="padding-top: 2rem;">1.a. You will hear a heated conversation between two people. Listen, then look at the comments below, all of which are false. Write a correct form of the comment in the space allowed.</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;"><b>a.</b> The train is full... <mark>{{ $answers['B2_Forward:L1A'][1] }}</mark></p>
        <p style="padding: 0 4rem; color: #000;"><b>b.</b> The only place the woman’s bag can go is on the seat. <mark>{{ $answers['B2_Forward:L1A'][2] }}</mark></p>
        <p style="padding: 0 4rem; color: #000;"><b>c.</b> The man is not going to London. <mark>{{ $answers['B2_Forward:L1A'][3] }}</mark></p>
        <p style="padding: 0 4rem; color: #000;"><b>d.</b> The woman doesn’t have a ticket. <mark>{{ $answers['B2_Forward:L1A'][4] }}</mark></p>
    </main>
</section>

<section>
    <header>
        <h3 style="padding-top: 2rem;">1.b. What do you think would have been the most reasonable solution to this situation? Give reasons for your answer</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Forward:L1B'][1]) !!}</mark></p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">2. You will hear a politician talking to workers about the closure of their factory. Listen, then answer the questions.</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;">What assistance is the government offering to those who will lose their jobs? (a) <mark>{!! nl2br($answers['B2_Forward:L2'][1]) !!}</mark></p>
        <p style="padding: 0 4rem; color: #000;">What are the main objections to the assistance offered? (b) <mark>{!! nl2br($answers['B2_Forward:L2'][2]) !!}</mark></p>
        <p style="padding: 0 4rem; color: #000;">In what ways is sarcasm used? (c) <mark>{!! nl2br($answers['B2_Forward:L2'][3]) !!}</mark></p>
        <p style="padding: 0 4rem; color: #000;">According to the politician, what are the main reasons for the closure of the factory? (d) <mark>{!! nl2br($answers['B2_Forward:L2'][4]) !!}</mark></p>
        <p style="padding: 0 4rem; color: #000;">What points does the politician make about the ‘globalised economy’? (e) <mark>{!! nl2br($answers['B2_Forward:L2'][5]) !!}</mark></p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">. You will hear an extract from an interview with an Olympic runner. After listening, write a review of the interview, analysing her feelings and opinions. You will hear the interview twice.</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;">Write notes here</p>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Forward:L3'][1]) !!}</mark></p>
        
        <h4 style="color: #014969;">Now write your review.</h4>

        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B2_Forward:L3'][2]) !!}</mark></p>
    </main>
</section>