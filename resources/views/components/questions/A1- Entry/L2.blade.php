<section id="dropdown-entry-listening-2" class="question dropdown dropdown-click closed col-12 col-lg-10 col-xl-8 mb-4">
    <a href="#" class="dropdown-header">
        <span>2. You will hear Anna talking about happy days and sad days. Which are happy, and which are sad?<mark>One is done for you</mark>.</span>
        <button class="dropdown-button text-right">
            <i class="dropdown-icon fas fa-chevron-down"></i>
        </button>
    </a>
    <main class="dropdown-menu-content two-question-container px-xl-4">
        <div class="d-flex justify-content-center my-4">
            <audio class="d-none" controls controlsList="nodownload">
                <source
                    src="{{asset('audios/Entry-2.mp3')}}" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
            <div>
                <button class="audio-button d-flex justify-content-around align-items-center p-2" type="button">
                    <i class="fas fa-play audio-icon"></i>
                    <span class="audio-text">Play Audio</span>
                </button>
            </div>
        </div>
        
        <table class="table table-normal table-striped mb-4">
            <thead>
                <tr>
                    <th class="text-center" scope="col"><i class="face-icons far fa-smile"></i></th>
                    <th scope="col"><input class="input position-relative" value="fri" disabled type="text"></span>day</th>
                    <th scope="col"><input name="A1_Entry:L2[1]" class="input position-relative" type="text"></span>day</th>
                    <th scope="col"><input name="A1_Entry:L2[2]" class="input position-relative" type="text"></span>day</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center" scope="col"><i class="face-icons far fa-frown text-center"></i>
                    </th>
                    <th scope="col"><input name="A1_Entry:L2[3]" class="input position-relative" type="text"></span>day</th>
                    <th scope="col"><input name="A1_Entry:L2[4]" class="input position-relative" type="text"></span>day</th>
                    <th scope="col"><input name="A1_Entry:L2[5]" class="input position-relative" type="text"></span>day</th>
                </tr>
            </tbody>
        </table>
    </main>
</section>