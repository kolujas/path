<section id="dropdown-entry-listening-3" class="question dropdown dropdown-click closed col-12 col-lg-10 col-xl-8 mb-4">
    <a href="#" class="dropdown-header">
        <span>3. Where Charles lives there are ten houses. Listen to him tell you about each house, then complete the table with the numbers. <mark>Two are done for you</mark>.</span>
        <button class="dropdown-button text-right">
            <i class="dropdown-icon fas fa-chevron-down"></i>
        </button>
    </a>
    <main class="dropdown-menu-content third-question-container px-xl-4">
        <div class="d-flex justify-content-center my-4">
            <audio class="d-none" controls controlsList="nodownload">
                <source
                    src="{{asset('audios/Entry-3.mp3')}}" type="audio/mpeg">
                    Tu navegador no soporta el audio.
            </audio>
            <div>
                <button class="audio-button d-flex justify-content-around align-items-center p-2" type="button">
                    <i class="fas fa-play audio-icon"></i>
                    <span class="audio-text">Play Audio</span>
                </button>
            </div>
        </div>
        
        <table class="table table-normal table-striped mx-auto mb-4">
            <thead>
                <tr>
                    <th scope="col">I live at..</th>
                    <th scope="col"><input
                        class="d-block mx-auto input position-relative"
                        value="10" disabled type="text"></th>
                    <th scope="col">Ash Avenue</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">A doctor lives at number..</th>
                    <th scope="col"><input
                        class="d-block mx-auto input position-relative"
                        value="12" disabled type="text"></th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <th scope="col">A policeman lives at number..</th>
                    <th scope="col"><input name="A1_Entry:L3[1]" class="d-block mx-auto input position-relative" data-letters="1" type="text"></th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <th scope="col">My aunt Mary lives at number..</th>
                    <th scope="col"><input name="A1_Entry:L3[2]" class="d-block mx-auto input position-relative" data-letters="1" type="text"></th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <th scope="col">I don't know who lives at number..</th>
                    <th scope="col"><input name="A1_Entry:L3[3]" class="d-block mx-auto input position-relative" data-letters="1" type="text"></th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <th scope="col">I don't know who lives at number..</th>
                    <th scope="col"><input name="A1_Entry:L3[4]" class="d-block mx-auto input position-relative" data-letters="1" type="text"></th>
                    <th scope="col"></th>

                </tr>
                <tr>
                    <th scope="col">Number..</th>
                    <th scope="col"><input name="A1_Entry:L3[5]" class="d-block mx-auto input position-relative" data-letters="1" type="text"></th>
                    <th scope="col">is a bakery</th>
                </tr>
            </tbody>
        </table>
    </main>
</section>