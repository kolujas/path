@extends('pdf.exam')

@section('css')
    
@endsection

@section('title')
    Example exam 1
@endsection

@section('main')
    <header>
        <h2 style="text-align: center;">Writing</h2>
    </header>

    <section>
        <header>
            <h3>1. Match the words to the images.<mark>One is done for you.</mark></h3>
        </header>
        <main>
            <ol class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                <li class="answers crossed inline mx-lg-2">Bedroom</li>
                <li class="answers inline mx-lg-2">Garden</li>
                <li class="answers inline mx-lg-2">Kitchen</li>
                <li class="answers inline mx-lg-2">Lounge</li>
                <li class="answers inline mx-lg-2">Bathroom</li>
            </ol>
            <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                <div class="card">
                    <img src="{{ asset('') }}" class="img-fluid" alt="image-one-question-one">
                    <div class="card-body mx-auto">
                        <span>Bedroom</span>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <section>
        <header>
            <h3>2. Complete</h3>
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
            <h3>3. Complete the names of the animals.<mark>One is done for you.</mark></h3>
        </header>
        <main>
            
        </main>
    </section>
    

    <section>
        <header>
            <h3>4a. Read about Alice, then fill the spaces with <strong>am, is </strong>or <strong>are</strong>.<mark>One is done for you.</mark></h3>
        </header>
        <main>
            <p>Hello! My friend Beth and I <span>dummy</span> good friends. She <span>dummy</span> 10 years old and I <span>dummy</span>.
                My hair <span>dummy</span> short. Beth's hair <span>dummy</span> long. </p>
        </main>
    </section>
    

    <section>
        <header>
            <h3>4b. Who is Alice? Who is Beth? Write their names under the pictures.</h3>
        </header>
        <main>
            <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                <div class="card">
                    <img src="" class="img-fluid" alt="image-one-question-one">
                    <div class="card-body mx-auto">
                        <input name="A1:W4B[1]" class="input input-long" type="text" name="answer_five_one">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2 card-min-width">
                <div class="card">
                    <img src="" class="img-fluid" alt="image-one-question-one">
                    <div class="card-body mx-auto">
                        <input name="A1:W4B[2]" class="input input-long" type="text" name="answer_five_two">
                    </div>
                </div>
            </div>
        </main>
    </section>
    

    <section>
        <header>
            <h3>5. Write about your friend.</h3>
        </header>
        <main>
            <p><span style="color: #0091B7;">My friend:</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis sit eligendi tempora mollitia. Dignissimos illo adipisci alias doloribus. Tempore corporis voluptatibus tenetur eaque nihil ducimus qui vero, architecto odio? Reiciendis excepturi, ipsa voluptas nulla consectetur reprehenderit eius. Suscipit, laboriosam facere!</p>
        </main>
    </section>
@endsection