<section id="dropdown-listening-1" class="question dropdown dropdown-click closed col-12 col-lg-10 col-xl-8 mb-4">
    <a href="#" class="dropdown-header">
        <span>You will hear three sentences, which describe three of the image below. Match each sentence to an image.<mark>Two are not used</mark>.</span>
        <button class="dropdown-button text-right">
            <i class="dropdown-icon fas fa-chevron-down"></i>
        </button>
    </a>
    <main class="dropdown-menu-content one-question-container px-xl-4">
        <div class="d-flex justify-content-center my-4">
            <audio class="audio d-none" controls controlsList="nodownload">
                <source
                    src="https://upload.wikimedia.org/wikipedia/en/9/9f/Sample_of_%22Another_Day_in_Paradise%22.ogg"
                    type="audio/ogg">
                Tu navegador no soporta el audio.
            </audio>
            <div class="audio-div">
                <i class="fas fa-play play-icon"></i><button class="audioBtn" type="button">Play Audio</button>
            </div>
        </div>

        <div class="row justify-content-md-between justify-content-lg-center py-4">
            <ol class="col-12 mb-4 d-flex ol-decimal justify-content-around justify-content-lg-center">
                <li class="mx-lg-3">
                    <select clas="input-long" name="A1_Access:L1[1]">
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                        <option>d</option>
                        <option>e</option>
                    </select>
                </li>
                <li class="mx-lg-3">
                    <select clas="input-long" name="A1_Access:L1[2]">
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                        <option>d</option>
                        <option>e</option>
                    </select>
                </li>
                <li class="mx-lg-3">
                    <select clas="input-long" name="A1_Access:L1[3]">
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                        <option>d</option>
                        <option>e</option>
                    </select>
                </li>
            </ol>
            <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                <div class="card">
                    <img src="{{ asset('img/recursos/hector.jpg') }}" class="img-fluid" alt="image-one-question-one">
                    <div class="card-body mx-auto text-center">
                        a
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                <div class="card">
                    <img src="{{ asset('img/recursos/hector.jpg') }}" class="img-fluid" alt="image-two-question-one">
                    <div class="card-body mx-auto text-center">
                        b
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                <div class="card">
                    <img src="{{ asset('img/recursos/hector.jpg') }}" class="img-fluid" alt="image-three-question-one">
                    <div class="card-body mx-auto text-center">
                        c
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                <div class="card">
                    <img src="{{ asset('img/recursos/hector.jpg') }}" class="img-fluid" alt="image-four-question-one">
                    <div class="card-body mx-auto text-center">
                        d
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2 card-min-width">
                <div class="card">
                    <img src="{{ asset('img/recursos/hector.jpg') }}" class="img-fluid" alt="image-five-question-one">
                    <div class="card-body mx-auto text-center">
                        e
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>