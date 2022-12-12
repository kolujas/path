<header>
    <h2 style="text-align: center; padding-top: 2rem;">
        {{ $module->folder }} {{ $module->name }}
    </h2>

    <h3 style="text-align: center; color: #0091B7;">
        Candidate Number: ({{ $candidate->candidate_number }})
    </h3>

    <p style="text-align: center;">
        Strikes: {{ $answers['strikes'] }}
    </p>
</header>

<section>
    <header>
        <h3 style="padding-top: 2rem;">
            1. Look at the images. Fill in the slots with specific vocabulary related to ships.
        </h3>
    </header>

    <main>
        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][1] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][2] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][3] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][4] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][5] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][6] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][7] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][8] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][9] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW1'][10] }}
            </mark>
        </p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">
            2. Look at the image. Identify your job as a member of staff.
        </h3>
    </header>

    <main>
        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW2'][1] }}
            </mark>
        </p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">
            3. Based on the image, engage in a conversation with the guest. Follow the instructions and cues provided. Write your interventions.
        </h3>
    </header>

    <main>
        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {!! nl2br($answers['Tourism:RW3'][1]) !!}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {!! nl2br($answers['Tourism:RW3'][2]) !!}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {!! nl2br($answers['Tourism:RW3'][3]) !!}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {!! nl2br($answers['Tourism:RW3'][4]) !!}
            </mark>
        </p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">
            4. Look at the image and read the text below. Identify your role as a member of staff and write it in the slot provided.
        </h3>
    </header>

    <main>
        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Tourism:RW4'][1] }}
            </mark>
        </p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">
            5. Read the passage and fill in the gaps with an appropriate word.
        </h3>
    </header>

    <main>
        <p style="padding: 0 4rem; color: #000;">
            May I have your attention, please. We are sorry to announce that the 2077 service to Exeter is <mark>
                {{ $answers['Tourism:RW5'][1] }}
            </mark> for 12 minutes. We apologise that your journey will take longer than planned. The train at <mark>
                {{ $answers['Tourism:RW5'][2] }}
            </mark> 2 is the 11.14 British Express service to London King’s Cross. Calling at Doncaster, Newark, North Gate and London King’s Cross. This train has 6 <mark>
                {{ $answers['Tourism:RW5'][3] }}
            </mark>. This train has onboard catering available. First Class accommodations may be found in Zones 7 and 8; Standard Class in Zones 4, 5, 9 and 10. Cycle spaces in Zones 5 and 9. Wheelchair facilities in Zones 7 and 8. 24 hour CCTV recording is in operation at this station for the purpose of <mark>
                {{ $answers['Tourism:RW5'][4] }}
            </mark> and safety management. In the interest of security, please do not leave your luggage or personal <mark>
                {{ $answers['Tourism:RW5'][5] }}
            </mark> unattended on the station. Any unattended items or are likely to be removed without warning or destroyed by security services. Thank you for your co-operation.
        </p>
    </main>
</section>