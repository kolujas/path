function crossWord(element) {
    // if (element.classList.contains('crossed')) {
    //     element.classList.remove('crossed');
    // } else {
    //     element.classList.add('crossed');
    // }
    let answers = document.querySelectorAll('.answers:not(first-of-type)');
    let selects = document.querySelectorAll('select');
    for (const answer of answers) {
        answer.classList.remove('crossed');
        for (const select of selects) {
            if (select.options[select.selectedIndex].innerHTML == answer.innerHTML && !answer.classList.contains('crossed')) {
                answer.classList.add('crossed');
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', function(e){
    // ? Audio
    const audios = document.querySelectorAll('audio');
    for (const audio of audios) {
        const button = audio.nextElementSibling.children[0];

        button.addEventListener('click', function (e) {
            e.preventDefault();
            if (!this.classList.contains('playing') && !this.classList.contains('finished')) {
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
                button.classList.add('playing');
                button.children[1].innerHTML = "Playing...";
            });
            audio.addEventListener('ended', function(e){
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
                button.classList.remove('playing');
            });
        }
    }

    // ? Input letters from A1 Entry Listening ejercicio 1
    let A1_Entry_letters = document.querySelectorAll('.A1_Entry-L #dropdown-lsitening-1 .input-letters');
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

    // ? Selects from A1 Entry Writing ejercicio 1
    let A1_Entry_selects = document.querySelectorAll('.A1_Entry-W #dropdown-writing-1 select');
    for (const select of A1_Entry_selects) {
        select.addEventListener('change', function (e) {
            console.log(changed);
            // crossWord(this.options[this.selectedIndex]);
        });
    }

    // ? Radios from A1 Access Listening ejercicio 2
    let A1_Entry_radios = document.querySelectorAll('.A1_Entry-W #dropdown-writing-1 select');
    for (const input of A1_Entry_radios) {
        input.addEventListener('change', function(e) {
            for (const radio of A1_Entry_radios) {
                if (radio.name == input.name) {
                    if (radio.classList.contains('checked')) {
                        radio.classList.remove('checked');
                    }
                }
            }
            if (this.checked) {
                this.classList.add('checked');
            }
        });
    }
});