import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { NavMenu } from "../../submodules/NavMenuJS/js/NavMenu.js";
import { URLServiceProvider } from "../providers/URLServiceProvider.js";
import { CountDown } from "../CountDown.js";

function crossWord() {
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

document.addEventListener('DOMContentLoaded', function (e) {
    let choosen = document.querySelector('.tab-content').id;
    for (const content of document.querySelectorAll('.tab-content')) {
        if (content.id == URLServiceProvider.findHashParameter()) {
            choosen = content.id;
        }
    }
    if (document.querySelector('.tab-content')) {
        let tab = new TabMenuJS({
            id: 'tab-exam',
        }, {
            open: [choosen],
        });
    }

    let navmenu = new NavMenu({
        id: 'nav-exam',
        sidebar: {
            id: ['menu'],
            position: ['left'],
        },
        dropdown: {
            //
        },
    }, {
        fixed: false,
        current: false,
    });

    let submitBtns = document.querySelectorAll('.submit-exam');
    for (const btn of submitBtns) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('form').submit();
        });
    }

    let selects = document.querySelectorAll('select');
    for (const select of selects) {
        select.addEventListener('change', function (e) {
            crossWord(this.options[this.selectedIndex].innerHTML);
        });
    }

    let inputLetters = document.querySelectorAll('[data-letters]');
    for (const input of inputLetters) {
        let letters = parseInt(input.dataset.letters);
        let span = input.parentNode;
        let div = document.createElement('div');
        div.classList.add('underlines');
        span.appendChild(div);

        for (let index = 0; index < letters; index++) {
            let underline = document.createElement('div');
            underline.classList.add('underline');
            div.appendChild(underline);
            underline.style.width = `calc((100% - .25rem) / ${letters})`;
        }
    }
});


// Audios

const audio = document.querySelectorAll('.audio');
const audioBtn = document.querySelectorAll('.audioBtn');

for (const key in audioBtn) {
    const btn = audioBtn[key];
    if(typeof btn === "object"){
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            if(!this.classList.contains('playing') && !this.classList.contains('finished')){
                if (!this.dataset.count) {
                    this.dataset.count = 0;
                }
                this.dataset.count = parseInt(this.dataset.count) + 1;
                if (parseInt(this.dataset.count) < 3) {
                    ponePlay(key);
                } else {
                    this.classList.add('finished');
                    audio[key].src = "";
                }
            }
            
        })
    }
    

}

for (const key in audio) {
        const input = audio[key]; 
        if(typeof input  === "object"){
            input.addEventListener('play', function(e){
                audioBtn[key].classList.add('playing');
            });
            input.addEventListener('ended', function(e){
                audioBtn[key].classList.remove('playing');
            });
        }       
        
}

// audio.addEventListener('timeupdate', function(e){
//     e.preventDefault();
//     console.log("Current time", this.currentTime);
// });

function ponePlay(key) {
    audio[key].play();
}

// Desactivar F5 (actualizar pagina)

// $(document).on("keydown", disableF5);

function disableF5(e) {
    if ((e.which || e.keyCode) == 116) e.preventDefault();
};

// Mensaje si quiere salir de la pagina

const modal = document.querySelector('.modal');

$(document).mouseleave(function () {
    if(!document.querySelector('.strikes').value){
        document.querySelector('.strikes').value = 1;
    }else{
        document.querySelector('.strikes').value++;
        if(document.querySelector('.strikes').value >= 2){
            const modalBody = document.querySelector('.modal-body p');
            modalBody.innerHTML = "Si volves a salir reprobas por mamerto";
        }
    }
    console.log(document.querySelector('.strikes').value);
    // $('.modal').modal();
});

function current(data = undefined){
    document.querySelector(`#${data.module.folder}-${data.module.name} .time`).innerHTML = `${data.countdown.hours}:${data.countdown.minutes}:${data.countdown.seconds}`;
}

function end(data = undefined){
    console.log(data);
}

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });

document.addEventListener('DOMContentLoaded', function(e){
    for(const td of document.querySelectorAll('.input-letters')){
        for (const key in td.children) {
            const input = td.children[key]
            if((parseInt(key) + 1) <= td.children.length){
                input.addEventListener('keyup', function(e){
                    if(this.value){
                        this.nextElementSibling.focus();
                    }
                });
            }
        }
    }
    let hours = 0, minutes = 0, seconds = 0;
    for(const module of exam.modules){
        hours = parseInt(hours) + parseInt(module.time.split(':')[0]);
        if(hours.toString().length < 2){
            hours = `0${hours}`;
        }
        minutes = parseInt(minutes) + parseInt(module.time.split(':')[1]);
        if(minutes.toString().length < 2){
            minutes = `0${minutes}`;
        }
        seconds = parseInt(seconds) + parseInt(module.time.split(':')[2]);
        if(seconds.toString().length < 2){
            seconds = `0${seconds}`;
        }
        let time = `${exam.scheduled_date_time} ${hours}:${minutes}:${seconds}`;
        let countDown = new CountDown({
            scheduled_date_time: time,
            timer: {
                hours: true,
                minutes: true,
                seconds: true,
            }
        }, {
            current: {
                functionName: current,
                params: {
                    module: module,
                },
            }, end: {
                functionName: end,
                params: {
                    module: module,
                },
            }
        });
    }
});
