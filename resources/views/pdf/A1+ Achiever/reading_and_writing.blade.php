<header>
    <h2 style="text-align: center; padding-top: 2rem;">{{ $module->folder }} {{ $module->name }}</h2>
    <h3 style="text-align: center; color: #0091B7;">Candidate Number: ({{ $candidate->candidate_number }})</h3>
    <p style="text-align: center;">Strikes: {{ $answers['strikes'] }}</p>
</header>

<section>
    <header>
        <h3 style="padding-top: 2rem;">1. Read the directions below. Which line on the map shows the correct route? Red, blue, green or yellow? Tick the correct box.</h3>
    </header>
    <main>
        @if (isset($answers['A1_Achiever:RW1'][1]))
            <p style="padding: 0 2rem;">Color selected: <mark>{{ $answers['A1_Achiever:RW1'][1] }}</mark></p>
        @else
            <p style="padding: 0 2rem;">Color selected: <mark>null</mark></p>
        @endif
    </main>
</section>

<section>
    <header>
        <h3 style="padding-top: 2rem;">2. Think of questions to ask your favourite singer, beginning with the prompts.</h3>
    </header>
    <main>
        <p style="padding: 0 2rem;"><b class="mr-1">a.</b> When <mark>{{ $answers['A1_Achiever:RW2'][1] }}</mark>?</p>
        <p style="padding: 0 2rem;"><b class="mr-1">b.</b> Why <mark>{{ $answers['A1_Achiever:RW2'][2] }}</mark>?</p>
        <p style="padding: 0 2rem;"><b class="mr-1">c.</b> Are you <mark>{{ $answers['A1_Achiever:RW2'][3] }}</mark>?</p>
        <p style="padding: 0 2rem;"><b class="mr-1">d.</b> How Many <mark>{{ $answers['A1_Achiever:RW2'][4] }}</mark>?</p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">3. Susana has 4 friends: Alicia, Luis, Paula and Juan. The table shows often the drink tea. Read each sentence a-e, then match the friend to the calendar. <mark>One is done for you</mark>.</h3>
    </header>
    <main>
        @if (isset($answers['A1_Achiever:RW3']) && isset($answers['A1_Achiever:RW3'][1]))
            <p style="padding: 0 2rem;"><b class="mr-1">a.</b> Susana: <mark>{{ $answers['A1_Achiever:RW3'][1] }}</mark> have a cup of tea in the morning.</p>
        @else
            <p style="padding: 0 2rem;"><b class="mr-1">a.</b> Susana: <mark>null</mark> have a cup of tea in the morning.</p>
        @endif
        @if (isset($answers['A1_Achiever:RW3']) && isset($answers['A1_Achiever:RW3'][2]))
            <p style="padding: 0 2rem;"><b class="mr-1">b.</b> Alicia: <mark>{{ $answers['A1_Achiever:RW3'][2] }}</mark> drink tea. I hate it!</p>
        @else
            <p style="padding: 0 2rem;"><b class="mr-1">b.</b> Alicia: <mark>null</mark> drink tea. I hate it!</p>
        @endif
        @if (isset($answers['A1_Achiever:RW3']) && isset($answers['A1_Achiever:RW3'][3]))
            <p style="padding: 0 2rem;"><b class="mr-1">c.</b> Luis: <mark>{{ $answers['A1_Achiever:RW3'][3] }}</mark> drink tea with breakfast.</p>
        @else
            <p style="padding: 0 2rem;"><b class="mr-1">c.</b> Luis: <mark>null</mark> drink tea with breakfast.</p>
        @endif
        @if (isset($answers['A1_Achiever:RW3']) && isset($answers['A1_Achiever:RW3'][4]))
            <p style="padding: 0 2rem;"><b class="mr-1">d.</b> Paula: <mark>{{ $answers['A1_Achiever:RW3'][4] }}</mark> drink tea. I prefer coffe.</p>
        @else
            <p style="padding: 0 2rem;"><b class="mr-1">d.</b> Paula: <mark>null</mark> drink tea. I prefer coffe.</p>
        @endif
        @if (isset($answers['A1_Achiever:RW3']) && isset($answers['A1_Achiever:RW3'][5]))
            <p style="padding: 0 2rem;"><b class="mr-1">e</b> Juan: <mark>{{ $answers['A1_Achiever:RW3'][5] }}</mark> have tea before going to school.</p>
        @else
            <p style="padding: 0 2rem;"><b class="mr-1">e</b> Juan: <mark>null</mark> have tea before going to school.</p>
        @endif
    </main>
</section>

<section>
    <header>
        <h3 style="padding-top: 2rem;">4.a. Match the images with the words below. <mark>One is done for you</mark>.</h3>
    </header>
    <main>
        <p style="color: #0091B7; padding: 0 4rem;">
            <span style="margin: .5rem 2rem;">Sunny</span>
            @if (isset($answers['A1_Achiever:RW4A']) && isset($answers['A1_Achiever:RW4A'][1]))
                <span style="margin: .5rem 2rem;">{{$answers['A1_Achiever:RW4A'][1]}}</span>
            @else
                <span style="margin: .5rem 2rem;">null</span>
            @endif
            @if (isset($answers['A1_Achiever:RW4A']) && isset($answers['A1_Achiever:RW4A'][2]))
                <span style="margin: .5rem 2rem;">{{$answers['A1_Achiever:RW4A'][2]}}</span>
            @else
                <span style="margin: .5rem 2rem;">null</span>
            @endif
            @if (isset($answers['A1_Achiever:RW4A']) && isset($answers['A1_Achiever:RW4A'][3]))
                <span style="margin: .5rem 2rem;">{{$answers['A1_Achiever:RW4A'][3]}}</span>
            @else
                <span style="margin: .5rem 2rem;">null</span>
            @endif
        </p>
    </main>
</section>

<section>
    <header>
        <h3 style="padding-top: 2rem;">4.b. What...</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;">...can you do on a windy day? <mark>{!! nl2br($answers['A1_Achiever:RW4B'][1]) !!}</mark></p>
        <p style="padding: 0 4rem; color: #000;">...do you like doing on sunny days? <mark>{!! nl2br($answers['A1_Achiever:RW4B'][2]) !!}</mark></p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">5. You receive the following note. Write a reply.</h3>
    </header>
    <main>
        <p style="padding: 0 4rem; color: #000;"><mark>{!! nl2br($answers['A1_Achiever:RW5'][1]) !!}</mark></p>
    </main>
</section>