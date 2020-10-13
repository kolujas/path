@extends('pdf.exam')

@section('css')
    
@endsection

@section('title')
    Example exam 1
@endsection

@section('main')
    <header>
        <h2 style="text-align: center; padding-top: 2rem;">Writing</h2>
    </header>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">1. Match the words to the images.<mark> One is done for you.</mark></h3>
        </header>
        <main>
            <ol style="margin-left: 2rem;" class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                <li class="answers crossed inline mx-lg-2">pepe</li>
                <li class="answers inline mx-lg-2">pepe</li>
                <li class="answers inline mx-lg-2">Bedroom</li>
                <li class="answers inline mx-lg-2">pepe</li>
                <li class="answers inline mx-lg-2">pepe</li>
            </ol>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">2. Complete</h3>
        </header>
        <main class="writing-question-two">
            <div style="margin-left: 4rem;" class="py-4 px-2 px-md-3">
                <p class="mb-4">In the bedroom, I can see <span>dummy</span> and <span>dummy</span>.</p>
                <p class="mb-4">In the bathroom, I can see <span>dummy</span> and <span>dummy</span>.</p>
                <p class="mb-0">In the kitchen, I can see <span>dummy</span> and <span>dummy</span>.</p>
            </div>
        </main>
    </section>

    <section>
        <header>
            <h3 style="padding-top: 2rem;">3. Complete the names of the animals.<mark> One is done for you.</mark></h3>
        </header>
        <main>
            <ol style="margin-left: 2rem;" class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                <li class="answers crossed inline mx-lg-2">pepe horse</li>
                <li class="answers inline mx-lg-2">pepe</li>
                <li class="answers inline mx-lg-2">pepe</li>
                <li class="answers inline mx-lg-2">pepe</li>
                <li class="answers inline mx-lg-2">pepe</li>
            </ol>
        </main>
    </section>
    
    <pagebreak />

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4a. Read about Alice, then fill the spaces with <strong>am, is </strong>or <strong>are</strong>.<mark> One is done for you.</mark></h3>
        </header>
        <main>
            <p style="padding: 0 2rem;">Hello! My friend Beth and I <span>dummy</span> good friends. She <span>dummy</span> 10 years old and I <span>dummy</span>.
                My hair <span>dummy</span> short. Beth's hair <span>dummy</span> long. </p>
        </main>
    </section>
    

    <section>
        <header>
            <h3 style="padding-top: 2rem;">4b. Who is Alice? Who is Beth? Write their names under the pictures.</h3>
        </header>
        <main>
            <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                
            <ol style="margin-left: 2rem;">
                <li>pepe</li>
                <li>pepe</li>
            </ol>
                
            </div>
        </main>
    </section>
    

    <section>
        <header>
            <h3 style="padding-top: 2rem;">5. Write about your friend.</h3>
        </header>
        <main>
            <p style="padding: 0 4rem; color: #000;"><span style="color: #0091B7;">My friend:</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis sit eligendi tempora mollitia. Dignissimos illo adipisci alias doloribus. Tempore corporis voluptatibus tenetur eaque nihil ducimus qui vero, architecto odio? Reiciendis excepturi, ipsa voluptas nulla consectetur reprehenderit eius. Suscipit, laboriosam facere!</p>
        </main>
    </section>

@endsection