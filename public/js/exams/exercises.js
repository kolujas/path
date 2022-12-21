function crossWord(element) {
    if (!element.classList.contains('crossed')) {
        element.classList.add('crossed');
    }
}

function circleWord(element) {
    if (!element.classList.contains('circled')) {
        element.classList.add('circled');
    }
}

function addCrossOptionsEvent(selects){
    for (const question of selects) {
        let options = [];
        for (const option of question.options) {
            let id = `${option.innerHTML.replace(/\’/g, '').replace(/\,/g, '').replace(/\./g, '').replace(/ /g, '_').replace(/\:/g, '_').replace(/\./g, '_')}`;
            if (parseInt(id[0])) {
                id = '#option-' + id;
            } else {
                id = '#' + id;
            }
            options.push(document.querySelector(id));
        }
        question.addEventListener('change', function (e) {
            for (const option of options) {
                option.classList.remove('crossed');
                for (const select of selects) {
                    let id = `${select.options[select.selectedIndex].innerHTML.replace(/\’/g, '').replace(/\,/g, '').replace(/\./g, '').replace(/ /g, '_').replace(/\:/g, '_').replace(/\./g, '_')}`;
                    if (parseInt(id[0])) {
                        id = 'option-' + id;
                    }
                    if (id == option.id) {
                        crossWord(option);
                    }
                }
            }
        });
    }
}

function enableAudios(){
    for (const audio of document.querySelectorAll('audio')) {
        const button = audio.nextElementSibling.children[0];
        button.classList.remove('disabled');
    }
}

function disableAudios(buttonSelected){
    for (const audio of document.querySelectorAll('audio')) {
        const button = audio.nextElementSibling.children[0];
        if (button != buttonSelected) {
            button.classList.add('disabled');
        }
    }
}

// carrousel
let slideIndex = {};

function addCarrousel (question) {
    if (question.querySelectorAll('.slideshow-container .prev').length) for (const key in question.querySelectorAll('.slideshow-container .prev')) {
        if (Object.hasOwnProperty.call(question.querySelectorAll('.slideshow-container .prev'), key)) {
            const btn = question.querySelectorAll('.slideshow-container .prev')[key];
            btn.addEventListener('click', function(){
                plusSlides(question, -1);
            });
        }
    }

    if (question.querySelectorAll('.slideshow-container .next').length) for (const key in question.querySelectorAll('.slideshow-container .next')) {
        if (Object.hasOwnProperty.call(question.querySelectorAll('.slideshow-container .next'), key)) {
            const btn = question.querySelectorAll('.slideshow-container .next')[key];
            btn.addEventListener('click', function(){
                plusSlides(question, 1);
            });
        }
    }

    if (question.querySelectorAll('.dots .dot').length) for (const key in question.querySelectorAll('.dots .dot')) {
        if (Object.hasOwnProperty.call(question.querySelectorAll('.dots .dot'), key)) {
            const btn = question.querySelectorAll('.dots .dot')[key];
            btn.addEventListener('click', function(){
                currentSlide(question, parseInt(key) + 1);
            });
        }
    }

    slideIndex[question.id] = 1;
    showSlides(question, slideIndex[question.id]);
}

// Next/previous controls
function plusSlides(question, n) {
  showSlides(question, slideIndex[question.id] += n);
}

// Thumbnail image controls
function currentSlide(question, n) {
  showSlides(question, slideIndex[question.id] = n);
}

function showSlides(question, n) {
  let i;
  let slides = question.getElementsByClassName("mySlides");
  let dots = question.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex[question.id] = 1}
  if (n < 1) {slideIndex[question.id] = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace("active", "");
  }
  slides[slideIndex[question.id]-1].style.display = "block";
  dots[slideIndex[question.id]-1].className += " active";
}

document.addEventListener('DOMContentLoaded', function(e){
    // ? Audio
    const audios = document.querySelectorAll('audio');
    for (const audio of audios) {
        const button = audio.nextElementSibling.children[0];

        button.addEventListener('click', function (e) {
            e.preventDefault();
            if (!this.classList.contains('playing') && !this.classList.contains('finished') && !this.classList.contains('disabled')) {
                if (!this.dataset.count) {
                    this.dataset.count = 0;
                }
                if (parseInt(this.dataset.count) < 2) {
                    audio.play();
                } else {
                    this.classList.add('finished');
                    audio.src = "";
                }
            }
        })

        if(typeof audio  === "object"){
            audio.addEventListener('play', function(e){
                disableAudios(this.nextElementSibling.children[0]);
                button.classList.add('playing');
                button.children[1].innerHTML = "Playing...";
            });
            audio.addEventListener('ended', function(e){
                enableAudios();
                button.classList.remove('playing');
                button.children[1].innerHTML = "Play Audio";
                button.dataset.count = parseInt(button.dataset.count) + 1;
                if(parseInt(button.dataset.count) >= 2){
                    button.children[0].classList.replace('fa-play', 'fa-stop');
                    button.children[1].innerHTML = "Done";
                    this.classList.add('finished');
                    button.classList.add('finished');
                }               
            });
            audio.addEventListener('pause', function(e){
                enableAudios(this);
                button.classList.remove('playing');
            });
        }
    }

    // ? Input letters from DEMO Listening ejercicio 1
    let DEMO_letters = document.querySelectorAll('.DEMO-L #dropdown-demo-listening-1 .input-letters');
    for(const element of DEMO_letters){
        for (const key in element.children) {
            const input = element.children[key]
            if((parseInt(key) + 1) <= element.children.length){
                input.addEventListener('keyup', function(e){
                    if(this.value){
                        if(this.nextElementSibling){
                            this.nextElementSibling.focus();
                        }
                    }
                });
            }
        }
    }

    // ? DEMO Writing
    addCrossOptionsEvent(document.querySelectorAll('.DEMO-RW #dropdown-demo-writing-1 select'));

    // ? Input letters from A1 Entry Listening ejercicio 1
    let A1_Entry_letters = document.querySelectorAll('.A1_Entry-L #dropdown-entry-listening-1 .input-letters');
    for(const element of A1_Entry_letters){
        for (const key in element.children) {
            const input = element.children[key]
            if((parseInt(key) + 1) <= element.children.length){
                input.addEventListener('keyup', function(e){
                    if(this.value){
                        if(this.nextElementSibling){
                            this.nextElementSibling.focus();
                        }
                    }
                });
            }
        }
    }

    // ? A1 Entry Writing
    addCrossOptionsEvent(document.querySelectorAll('.A1_Entry-RW #dropdown-entry-writing-1 select'));

    // ? A1 Access Lisitening
    addCrossOptionsEvent(document.querySelectorAll('.A1_Access-L #dropdown-access-listening-1 select'));

    for (const label of document.querySelectorAll('.A1_Access-L #dropdown-access-listening-2 .icon-checkbox')) {
        const input = label.children[0];
        input.addEventListener('change', function(e) {
            for (const radio of document.querySelectorAll('.A1_Access-L #dropdown-access-listening-2 .icon-checkbox')) {
                if (radio.children[0].name == input.name) {
                    if (radio.classList.contains('checked')) {
                        radio.classList.remove('checked');
                    }
                }
            }
            if (this.checked) {
                label.classList.add('checked');
            }
        });
    }

    // ? A1 Access Writing
    addCrossOptionsEvent(document.querySelectorAll('.A1_Access-RW #dropdown-access-writing-2 select'));

    // ? A1 Achiever Listening
    addCrossOptionsEvent(document.querySelectorAll('.A1_Achiever-L #dropdown-achiever-listening-1 select'));

    for (const label of document.querySelectorAll('.A1_Achiever-L #dropdown-achiever-listening-2 .icon-checkbox')) {
        const input = label.children[0];
        const icon = label.children[1];
        input.addEventListener('change', function(e) {
            icon.classList.remove('crossed');
            if (this.checked) {
                crossWord(icon);
            }
        });
    }

    addCrossOptionsEvent(document.querySelectorAll('.A1_Achiever-L #dropdown-achiever-listening-3 select'));
    
    // ? A1 Achiever Writing
    addCrossOptionsEvent(document.querySelectorAll('.A1_Achiever-RW #dropdown-achiever-writing-3 select'));

    addCrossOptionsEvent(document.querySelectorAll('.A1_Achiever-RW #dropdown-achiever-writing-4 select'));
    
    // ? A2 Preliminary Listening
    for (const label of document.querySelectorAll('.A2_Preliminary-L #dropdown-preliminary-listening-1 .options')) {
        const input = label.children[0];
        input.addEventListener('change', function(e) {
            for (const option of document.querySelectorAll('.A2_Preliminary-L #dropdown-preliminary-listening-1 .options')) {
                if (option.children[0].name == this.name) {
                    option.classList.remove('circled');
                }
            }
            label.classList.remove('circled');
            if (this.checked) {
                circleWord(label);
            }
        });
    }

    // ? A2 Preliminary Writing
    addCrossOptionsEvent(document.querySelectorAll('.A2_Preliminary-RW #dropdown-preliminary-writing-3 select'));

    // ? A2 Elementary Listening
    for (const label of document.querySelectorAll('.A2_Elementary-L #dropdown-elementary-listening-1 .icon-checkbox')) {
        const input = label.children[0];
        input.addEventListener('change', function(e) {
            for (const radio of document.querySelectorAll('.A2_Elementary-L #dropdown-elementary-listening-1 .icon-checkbox')) {
                if (radio.children[0].name == input.name) {
                    if (radio.classList.contains('checked')) {
                        radio.classList.remove('checked');
                    }
                }
            }
            if (this.checked) {
                label.classList.add('checked');
            }
        });
    }

    for (const label of document.querySelectorAll('.A2_Elementary-L #dropdown-elementary-listening-3 .options')) {
        const input = label.children[0];
        input.addEventListener('change', function(e) {
            if (input.type != 'checkbox') {
                for (const option of document.querySelectorAll('.A2_Elementary-L #dropdown-elementary-listening-3 .options')) {
                    if (option.children[0].name == this.name) {
                        option.classList.remove('circled');
                    }
                }
            }
            label.classList.remove('circled');
            if (this.checked) {
                circleWord(label);
            }
        });
    }

    // ? B1 Progress Listening
    for (const label of document.querySelectorAll('.B1_Progress-L #dropdown-progress-listening-1 .options')) {
        const input = label.children[0];
        input.addEventListener('change', function(e) {
            for (const option of document.querySelectorAll('.B1_Progress-L #dropdown-progress-listening-1 .options')) {
                if (option.children[0].name == this.name) {
                    option.classList.remove('circled');
                }
            }
            label.classList.remove('circled');
            if (this.checked) {
                circleWord(label);
            }
        });
    }

    // ? B1 Progress Writing
    addCrossOptionsEvent(document.querySelectorAll('.B1_Progress-RW #dropdown-progress-writing-5 select'));

    // ? B1 Onwards Listening
    for (const label of document.querySelectorAll('.B1_Onwards-L #dropdown-onwards-listening-1 .options')) {
        const input = label.children[0];
        input.addEventListener('change', function(e) {
            for (const option of document.querySelectorAll('.B1_Onwards-L #dropdown-onwards-listening-1 .options')) {
                if (option.children[0].name == this.name) {
                    option.classList.remove('circled');
                }
            }
            label.classList.remove('circled');
            if (this.checked) {
                circleWord(label);
            }
        });
    }

    // ? B1 Onwards Writing
    addCrossOptionsEvent(document.querySelectorAll('.B1_Onwards-RW #dropdown-onwards-writing-5 select'));

    // ? B2 Competency Listening
    for (const label of document.querySelectorAll('.B2_Competency-L #dropdown-competency-listening-1 .options')) {
        const input = label.children[0];
        input.addEventListener('change', function(e) {
            for (const option of document.querySelectorAll('.B2_Competency-L #dropdown-competency-listening-1 .options')) {
                if (option.children[0].name == this.name) {
                    option.classList.remove('circled');
                }
            }
            label.classList.remove('circled');
            if (this.checked) {
                circleWord(label);
            }
        });
    }

    // ? B2 Competency Writing
    addCrossOptionsEvent(document.querySelectorAll('.B2_Competency-RW #dropdown-competency-writing-5 select'));

    // ? B2+ Forward Writing
    addCrossOptionsEvent(document.querySelectorAll('.B2_Forward-RW #dropdown-forward-writing-2 select'));

    addCrossOptionsEvent(document.querySelectorAll('.B2_Forward-RW #dropdown-forward-writing-3 select'));

    addCrossOptionsEvent(document.querySelectorAll('.B2_Forward-RW #dropdown-forward-writing-5 select'));

    // ? Hotel Managment
    addCarrousel(document.querySelector('#Hotel_management_and_hospitality-RW #dropdown-hotel-management-and-hospitality-writing-1'));

    // ? Tourism
    addCarrousel(document.querySelector('#Tourism-RW #dropdown-tourism-writing-1'));
});