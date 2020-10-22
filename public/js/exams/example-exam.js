import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { NavMenu } from "../../submodules/NavMenuJS/js/NavMenu.js";
import { URLServiceProvider } from "../providers/URLServiceProvider.js";
import { FetchServiceProvider } from "../providers/FetchServiceProvider.js";
import { CountDown } from "../CountDown.js";
import { LocalStorageServiceProvider } from "../providers/LocalStorageServiceProvider.js";

function updateSaveTimer(data = undefined){
    if(document.querySelector('.save-button.countdown')){
        let timer = document.querySelector('.save-button .timer');
        timer.innerHTML = `(${data.countdown.seconds})`;
    }else{
        data.countdown.stop();
    }
}

function setTimeIntervalAutoSave(){
    if(!document.querySelector('.save-button.countdown')){
        let btn = document.querySelector('.save-button');
        btn.classList.add('countdown');
        let date = new Date();
        date.setMinutes(date.getMinutes() + 1);
        let countDown = new CountDown({
            scheduled_date_time: date.getTime(),
            timer: {
                seconds: true,
            }
        }, {
            current: {
                functionName: updateSaveTimer,
                params: {
                    //
                },
            }, end: {
                functionName: sendData,
                params: {
                    //
                },
            }
        });
    }
}

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

function current(data = undefined){
    document.querySelector(`#${data.module.folder}-${data.module.name} .time`).innerHTML = `${data.countdown.hours}:${data.countdown.minutes}:${data.countdown.seconds}`;
}

function end(data = undefined){
    console.log(data);
}

function setLoadingState(){
    let btn = document.querySelector('.save-button');
    btn.innerHTML= '';
    btn.classList.add('loading-dots');
    btn.removeEventListener('click', sendData);
}

function setFinishState(){
    let btn = document.querySelector('.save-button');
    btn.innerHTML = 'SAVE';
    btn.classList.remove('loading-dots');
    btn.addEventListener('click', sendData);
        let timer = document.createElement('b');
        timer.classList.add('timer', 'ml-1');
        btn.appendChild(timer);
        setTimeIntervalAutoSave();
}

async function sendData(){
    let btn = document.querySelector('.save-button').classList.remove('countdown');
    let formData = new FormData(document.querySelector('form'));
    let token = formData.get('_token');
    formData.delete('_token');
    setLoadingState();
    let localStorageService = LocalStorageServiceProvider.getData('Path_Candidate_Token');
    let response = await FetchServiceProvider.setData({
        method: 'POST',
        url: `/api/exam/${exam.id_exam}/record`,
    }, {
        'Accept': 'application/json',
        'Content-type': 'application/json; charset=UTF-8',
        'X-CSRF-TOKEN': token,
        'Authorization': "Bearer " + localStorageService.data,
    }, formData);
    setFinishState();
}

document.addEventListener('DOMContentLoaded', async function (e) {
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
    
    for(const td of document.querySelectorAll('.input-letters')){
        for (const key in td.children) {
            const input = td.children[key]
            if((parseInt(key) + 1) <= td.children.length){
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
    let years = 0, months = 0, days = 0, hours = 0, minutes = 0, seconds = 0;
    console.log(exam.scheduled_date_time);
    for(const module of exam.modules){
        years = parseInt(exam.scheduled_date_time.split(' ')[0].split('/')[0]);
        months = parseInt(exam.scheduled_date_time.split(' ')[0].split('/')[1]);
        if(months.toString().length < 2){
            months = `0${months}`;
        }
        days = parseInt(exam.scheduled_date_time.split(' ')[0].split('/')[2]);
        if(days.toString().length < 2){
            days = `0${days}`;
        }
        hours = parseInt(exam.scheduled_date_time.split(' ')[1].split(':')[0]) + parseInt(module.time.split(':')[0]);
        if(hours.toString().length < 2){
            hours = `0${hours}`;
        }
        minutes = parseInt(exam.scheduled_date_time.split(' ')[1].split(':')[1]) + parseInt(module.time.split(':')[1]);
        if(minutes.toString().length < 2){
            minutes = `0${minutes}`;
        }
        seconds = parseInt(exam.scheduled_date_time.split(' ')[1].split(':')[2]) + parseInt(module.time.split(':')[2]);
        if(seconds.toString().length < 2){
            seconds = `0${seconds}`;
        }
        let time = `${years}/${months}/${days} ${hours}:${minutes}:${seconds}`;
        console.log(time);
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

    let saveButton = document.querySelector('.save-button');
    saveButton.classList.remove('hidden');

    saveButton.addEventListener('click', sendData);

    setTimeIntervalAutoSave();
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
    // $('.modal').modal();
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
