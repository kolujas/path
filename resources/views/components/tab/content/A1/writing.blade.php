<section id="writing" class="tab-content closed">
    <section class="questions">
        <div class="row px-4 py-md-4 justify-content-lg-center">
            <section id="dropdown-question-1" class="question dropdown dropdown-click closed col-12 col-lg-10 col-xl-8 mb-4">
                <a href="#" class="dropdown-header">
                    <span>1. Match the words to the images.<mark>One is done for you.</mark></span>
                    <button class="dropdown-button text-right">
                        <i class="dropdown-icon fas fa-angle-down"></i>
                    </button>
                </a>
                <main class="dropdown-menu-content">
                    <div class="row justify-content-md-between justify-content-lg-center py-4">
                        <ol class="col-12 mb-4 answer-words d-flex justify-content-around justify-content-lg-center">
                            <li class="answers crossed inline mx-lg-2">Bedroom</li>
                            <li class="answers inline mx-lg-2">Garden</li>
                            <li class="answers inline mx-lg-2">Kitchen</li>
                            <li class="answers inline mx-lg-2">Lounge</li>
                            <li class="answers inline mx-lg-2">Bathroom</li>
                        </ol>
                        <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                            <div class="card">
                                <img src="../../img/recursos/writing-1-1.jpg" class="img-fluid" alt="image-one-question-one">
                                <div class="card-body mx-auto">
                                    <select clas="input-long" name="A1:W1[1]">
                                        <option disabled selected>Bedroom</option>
                                        <option>Garden</option>
                                        <option>Kitchen</option>
                                        <option>Lounge</option>
                                        <option>Bathroom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                            <div class="card">
                                <img src="../../img/recursos/writing-1-2.jpg" class="img-fluid" alt="image-one-question-one">
                                <div class="card-body mx-auto">
                                    <select clas="input-long" name="A1:W1[2]">
                                        <option disabled selected>Bedroom</option>
                                        <option>Garden</option>
                                        <option>Kitchen</option>
                                        <option>Lounge</option>
                                        <option>Bathroom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                            <div class="card">
                                <img src="../../img/recursos/writing-1-3.jpg" class="img-fluid" alt="image-one-question-one">
                                <div class="card-body mx-auto">
                                    <select clas="input-long" disabled name="A1:W1[3]">
                                        <option selected>Bedroom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                            <div class="card">
                                <img src="../../img/recursos/writing-1-4.jpg" class="img-fluid" alt="image-one-question-one">
                                <div class="card-body mx-auto">
                                    <select clas="input-long" name="A1:W1[4]">
                                        <option disabled selected>Bedroom</option>
                                        <option>Garden</option>
                                        <option>Kitchen</option>
                                        <option>Lounge</option>
                                        <option>Bathroom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2 card-min-width">
                            <div class="card">
                                <img src="../../img/recursos/writing-1-5.jpg" class="img-fluid" alt="image-one-question-one">
                                <div class="card-body mx-auto">
                                    <select clas="input-long" name="A1:W1[5]">
                                        <option disabled selected>Bedroom</option>
                                        <option>Garden</option>
                                        <option>Kitchen</option>
                                        <option>Lounge</option>
                                        <option>Bathroom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </section>
            <section id="dropdown-question-2" class="question dropdown dropdown-click closed col-12 col-lg-10 col-xl-8 mb-4">
                <a href="#" class="dropdown-header">
                    <span>2. Complete</span>
                    <button class="dropdown-button text-right">
                        <i class="dropdown-icon fas fa-angle-down"></i>
                    </button>
                </a>
                <main class="dropdown-menu-content second-question-container">
                    <div class="py-4 px-2 px-md-3">
                        <p class="mb-4">In the bedroom, I can see <input name="A1:W2[1]"class="input input-medium text-center"
                            value="a bed" disabled type="text"> and <input name="A1:W2[1]"class="input input-medium text-center"
                                type="text">.</p>
                        <p class="mb-4">In the bathroom, I can see <input name="A1:W2[2]" class="input input-medium text-center" type="text"> and <input name="A1:W2[3]"
                                class="input input-medium" type="text">.</p>
                        <p class="mb-0">In the kitchen, I can see <input name="A1:W2[4]" class="input input-medium text-center" type="text"> and <input name="A1:W2[5]"
                                class="input input-medium" type="text">.</p>
                    </div>
                </main>
            </section>
            <section id="dropdown-question-3" class="question dropdown dropdown-click closed col-12 col-lg-10 col-xl-8 mb-4">
                <a href="#" class="dropdown-header">
                    <span>3. Complete the names of the animals.<mark>One is done for you.</mark></span>
                    <button class="dropdown-button text-right">
                        <i class="dropdown-icon fas fa-angle-down"></i>
                    </button>
                </a>
                <main class="dropdown-menu-content second-question-container d-flex justify-content-center">
                    <div class="py-4 svg-width">
                        {{-- <img src="{{ asset('animales.jpg') }}" class="img-fluid" alt="image-one-question-three"> --}}
                        @component('components.tab.content.A1.prueba-animales')
                            
                        @endcomponent
                    </div>
                </main>
            </section>
            <section id="dropdown-question-4" class="question dropdown dropdown-click closed col-12 col-lg-10 col-xl-8 mb-4">
                <a href="#" class="dropdown-header">
                    <span>4a. Read about Alice, then fill the spaces with <strong>am, is </strong>or <strong>are</strong>.<mark>One is done for you.</mark></span>
                    <button class="dropdown-button text-right">
                        <i class="dropdown-icon fas fa-angle-down"></i>
                    </button>
                </a>
                <main class="dropdown-menu-content second-question-container">
                    <div class="py-4 px-2 px-md-3">
                        <p class="mb-0">Hello! My friend Beth and I <input name="A1:W4A[1]" class="input input-medium" type="text"> good friends. She <input name="A1:W4A[2]" class="input input-medium" type="text">10 years old and I <input name="A1:W4A[3]" class="input input-medium" type="text">.My hair <input class="input text-center" disabled value="is" type="text">short. Beth's hair <input name="A1:W4A[4]" class="input input-medium" type="text">long. </p>
                    </div>
                </main>
            </section>
            <section id="dropdown-question-5" class="question dropdown dropdown-click closed col-12 col-lg-10 col-xl-8 mb-4">
                <a href="#" class="dropdown-header">
                    <span>4b. Who is Alice? Who is Beth? Write their names under the pictures.</span>
                    <button class="dropdown-button text-right">
                        <i class="dropdown-icon fas fa-angle-down"></i>
                    </button>
                </a>
                <main class="dropdown-menu-content second-question-container">
                    <div class="row justify-content-center py-4">
                        <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 card-min-width">
                            <div class="card">
                                <img src="../../img/recursos/writing-4-1.png" class="img-fluid" alt="image-one-question-one">
                                <div class="card-body mx-auto">
                                    <input name="A1:W4B[1]" class="input input-long" type="text" name="answer_five_one">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2 card-min-width">
                            <div class="card">
                                <img src="../../img/recursos/writing-4-2.png" class="img-fluid" alt="image-one-question-one">
                                <div class="card-body mx-auto">
                                    <input name="A1:W4B[2]" class="input input-long" type="text" name="answer_five_two">
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </section>
            <section id="dropdown-question-6" class="question dropdown dropdown-click closed col-12 col-lg-10 col-xl-8 mb-4">
                <a href="#" class="dropdown-header">
                    <span>5. Write about your friend.</span>
                    <button class="dropdown-button text-right">
                        <i class="dropdown-icon fas fa-angle-down"></i>
                    </button>
                </a>
                <main class="dropdown-menu-content fifth-question-container">
                    <div class="py-4">
                        <div class="col-12 col-lg-10 col-xl-8 mx-auto position-relative">
                            <span class="my-friend">My friend:</span>
                            <textarea name="A1:W5[1]" class="pl-2"></textarea>
                        </div>
                    </div>
                </main>
            </section>
        </div>
    </section>
</section>