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
            1. Look at the images. Fill in the slots with specific vocabulary related to hotels.
        </h3>
    </header>

    <main>
        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][1] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][2] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][3] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][4] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][5] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][6] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][7] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][8] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][9] }}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW1'][10] }}
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
                {{ $answers['Hotel_managemente_and_hospitality:RW2'][1] }}
            </mark>
        </p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">
            3. Base on the image, engage in a conversation with the guest. Follow the instructions and cues provided. Write your interventions.
        </h3>
    </header>

    <main>
        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {!! nl2br($answers['Hotel_managemente_and_hospitality:RW3'][1]) !!}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {!! nl2br($answers['Hotel_managemente_and_hospitality:RW3'][2]) !!}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {!! nl2br($answers['Hotel_managemente_and_hospitality:RW3'][3]) !!}
            </mark>
        </p>

        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {!! nl2br($answers['Hotel_managemente_and_hospitality:RW3'][4]) !!}
            </mark>
        </p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">
            4. Look at the image and read the text below. Identify your job as a member of staff and write it in the slot provided.
        </h3>
    </header>

    <main>
        <p style="padding: 0 4rem; color: #000;">
            <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW4'][1] }}
            </mark>
        </p>
    </main>
</section>

<pagebreak />

<section>
    <header>
        <h3 style="padding-top: 2rem;">
            5. Read the passage and fill in the gaps with an appropiate word.
        </h3>
    </header>

    <main>
        <p style="padding: 0 4rem; color: #000;">
            Good morning, Mrs Sato, I was told by the receptionist that you wished to visit a picturesque shopping area and have an early dinner of local food before the concert at Colón Theatre. This is my recommendation: Santa Fe Avenue is only two <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW5'][1] }}
            </mark> away from our hotel. This is a trendy, sophisticated avenue with traditional architecture and quality shops, especially the Grand Splendid Bookshop with its breath-taking baroque features. You may dine at The Gaucho Restaurant, which offers exquisite local dishes. After dinner you, will be very near Colón Theatre. I could make <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW5'][2] }}
            </mark> at the restaurant right away. Everything is at a <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW5'][3] }}
            </mark> distance and the weather will be perfect for an evening stroll. If you are carrying too many shopping bags, make a stop at the hotel to <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW5'][4] }}
            </mark> your purchases with us. You will find your bags in your room when you return. Please, let me know if you need anything else. As for tomorrow bookings, it is all set. The guide will be <mark>
                {{ $answers['Hotel_managemente_and_hospitality:RW5'][5] }}
            </mark> you in the lobby at 9 am.
        </p>
    </main>
</section>