<header>
    <h2 style="text-align: center; padding-top: 2rem;">{{ $module->folder }} {{ $module->name }}</h2>
    <h3 style="text-align: center; color: #0091B7;">Candidate Number: ({{ $candidate->candidate_number }})</h3>
    <p style="text-align: center;">Strikes: {{ $answers['strikes'] }}</p>
</header>

<section>
    <header>
        <h3 style="padding-top: 2rem;">1. Read an article about children. Then answer the questions.</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;"><b>a.</b> In your own words, describe the child’s experience</p>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Onwards:RW1'][1]) !!}</mark></p>

        <p style="padding: 0 4rem; color: #000;"><b>b.</b> In your own words, answer the question "Why do Children Love to be Scared?</p>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Onwards:RW1'][2]) !!}</mark></p>
    </main>
</section>

<section>
    <header>
        <h3 style="padding-top: 2rem;">2. In the passage below, some punctuation has been removed. Add appropriate punctuation and upper-case lettering to make it clear for the reader.</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;"><b>a.</b> i came back from school to see my brothers watching tv grandma was sitting in the corner reading her book. can we eat grandma? i asked and my brothers looked up surprised of course</p>
        <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['B1_Onwards:RW2'][1] }}</mark></p>

        <p style="padding: 0 4rem; color: #000;"><b>b.</b> you cant eat grandma they said shes not even cooked well</p>
        <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['B1_Onwards:RW2'][2] }}</mark></p>

        <p style="padding: 0 4rem; color: #000;"><b>c.</b> we all laughed and grandma said of course and went to the stove to make dinner.</p>
        <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['B1_Onwards:RW2'][3] }}</mark></p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">3. A friend has asked you to recommend a film for him to go to with his new girlfriend. Their relationship is just a week old so it’s important to get it right. Apparently, she likes romantic comedies and women in films to be strong and independent. <br /> There is a choice of three, details of which can be seen below. Select a film, and explain the reasons for your choice, explaining the benefits for your friend and his girlfriend.</h3>
    </header>
    <main>
        @if (isset($answers['B1_Onwards:RW3']) && isset($answers['B1_Onwards:RW3'][1]))
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['B1_Onwards:RW3'][1] }}</mark></p>
        @else
            <p style="padding: 0 4rem; color: #000;"><mark>null</mark></p>
        @endif
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Onwards:RW3'][2]) !!}</mark></p>
    </main>
</section>

<section>
    <header>
        <h3 style="padding-top: 2rem;">4. Read the situation below, then write to a customer explaining what happened. Avoid using names unless you feel they are relevant, and remove all unnecessary detail. Use an appropriate subject, salutation and closing.</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;">Subject: <mark>{!! nl2br($answers['B1_Onwards:RW4'][1]) !!}</mark></p>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Onwards:RW4'][2]) !!}</mark></p>
    </main>
</section>

<section>
    <header>
        <h3 style="padding-top: 2rem;">5. Look at the choices below. Choose <mark>one</mark> and discuss the advantages and disadvantages, including reasons and examples.</h3>
    </header>
    <main>
        @if (isset($answers['B1_Onwards:RW5']) && isset($answers['B1_Onwards:RW5'][1]))
            <p style="padding: 0 4rem; color: #000;"><mark>{{ $answers['B1_Onwards:RW5'][1] }}</mark></p>
        @else
            <p style="padding: 0 4rem; color: #000;"><mark>null</mark></p>
        @endif
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['B1_Onwards:RW5'][2]) !!}</mark></p>
    </main>
</section>