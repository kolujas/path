import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { NavMenu } from "../../submodules/NavMenuJS/js/NavMenu.js";
import { URLServiceProvider } from "../providers/URLServiceProvider.js";
import { FetchServiceProvider } from "../providers/FetchServiceProvider.js";
import { CountDown } from "../CountDown.js";
import { LocalStorageServiceProvider } from "../providers/LocalStorageServiceProvider.js";

let tab;

// Audios (kolujAs)

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
                // this.dataset.count = parseInt(this.dataset.count) + 1;
                if (parseInt(this.dataset.count) < 2) {
                    ponePlay(key);
                    document.querySelectorAll('.audio-div i')[key].classList.replace('fa-play', 'fa-pause');
                } else {
                    this.classList.add('finished');
                    audio[key].src = "";
                }
            }
            else{
                audio[key].pause();
                document.querySelectorAll('.audio-div i')[key].classList.replace('fa-pause', 'fa-play');
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
                this.nextElementSibling.children[1].dataset.count = parseInt(this.nextElementSibling.children[1].dataset.count) + 1; 
                if(parseInt(this.nextElementSibling.children[1].dataset.count) >= 2){
                    this.classList.add('finished');
                }               
            });
            input.addEventListener('pause', function(e){
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

const modal = document.querySelector('.modal-strikes');


document.addEventListener('visibilitychange', function(){ 
    if(document.visibilityState == 'hidden'){
        if(!document.querySelector('.strikes').value){
            document.querySelector('.strikes').value = 0;        
        }
            if(document.querySelector('.strikes').value >= 1){
                const modalBody = document.querySelector('.modal-body p');
                modalBody.innerHTML = "Tu mensaje ha sido marcado";
                $('.modal-strikes').modal();
            }else{
                const modalBody = document.querySelector('.modal-body p');
                document.querySelector('.strikes').value++;
                modalBody.innerHTML = "Si volves a salir te marcaremos el examen";
                $('.modal-strikes').modal();
            }
         
        
    }
 });

$(document).mouseleave(function () {
    if(!document.querySelector('.strikes').value){
        document.querySelector('.strikes').value = 0;
    }else{
    //     document.querySelector('.strikes').value++;
        if(document.querySelector('.strikes').value == 0){
            const modalBody = document.querySelector('.modal-body p');
            modalBody.innerHTML = "Si salis de la pagina te marcaremos el examen";
            $('.modal-strikes').modal();
        }
    }
    
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


(function () {
    var onload = window.onload;

    window.onload = function () {
        if (typeof onload == "function") {
            onload.apply(this, arguments);
        }

        var fields = [];
        var inputs = document.getElementsByTagName("input");
        var textareas = document.getElementsByTagName("textarea");

        for (var i = 0; i < inputs.length; i++) {
            fields.push(inputs[i]);
        }

        for (var i = 0; i < textareas.length; i++) {
            fields.push(textareas[i]);
        }

        for (var i = 0; i < fields.length; i++) {
            var field = fields[i];

            if (typeof field.onpaste != "function" && !!field.getAttribute("onpaste")) {
                field.onpaste = eval("(function () { " + field.getAttribute("onpaste") + " })");
            }

            if (typeof field.onpaste == "function") {
                var oninput = field.oninput;

                field.oninput = function () {
                    if (typeof oninput == "function") {
                        oninput.apply(this, arguments);
                    }

                    if (typeof this.previousValue == "undefined") {
                        this.previousValue = this.value;
                    }

                    var pasted = (Math.abs(this.previousValue.length - this.value.length) > 1 && this.value != "");

                    if (pasted && !this.onpaste.apply(this, arguments)) {
                        this.value = this.previousValue;
                    }

                    this.previousValue = this.value;
                };

                if (field.addEventListener) {
                    field.addEventListener("input", field.oninput, false);
                } else if (field.attachEvent) {
                    field.attachEvent("oninput", field.oninput);
                }
            }
        }
    }
})();

$('body').on('copy paste', 'input', function (e)
    { e.preventDefault();
 });

$('body').on('copy paste', 'textarea', function (e)
    { e.preventDefault();
 });


 const okConfirm = document.querySelector('.ok-confirm');
 const cancelConfirm = document.querySelector('.cancel-confirm');
 const submitsExam = document.querySelectorAll('.submit-exam');
 const modalTwo = document.querySelector('.modal-two');

for (const submit of submitsExam) {
    submit.addEventListener('click', function(e){
        $('.modal-two').modal();
     })
}

 okConfirm.addEventListener('click', function(e){
    e.preventDefault();
    if(submitsExam[0].dataset.module >= exam.modules.length){
        document.querySelector('form').submit();
    }else{
        nextModule(tab);
    }
    
 })
 
 cancelConfirm.addEventListener('click', function(e){
    e.preventDefault();
 })
 


 // Archimak

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
    document.querySelector('.clock').style.display = 'none';
    let time = document.querySelector(`#${data.module.folder}-${data.module.name} .time`);
    time.innerHTML = 'ended';
    time.classList.add('text', 'text-two');
    let index;
    for (const key in exam.modules) {
        if(exam.modules[key] == data.module){
            index = parseInt(key) + 1;
        }
    }
    if(index >= exam.modules.length){
        document.querySelector('form').submit();
    }else{
        nextModule(data.tab);
    }
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

function addTime(scheduled_date_time, index) {
    let years = parseInt(scheduled_date_time.split(' ')[0].split('-')[0]),
        months = parseInt(scheduled_date_time.split(' ')[0].split('-')[1]),
        days = parseInt(scheduled_date_time.split(' ')[0].split('-')[2]),
        hours = parseInt(scheduled_date_time.split(' ')[1].split(':')[0]),
        minutes = parseInt(scheduled_date_time.split(' ')[1].split(':')[1]),
        seconds = parseInt(scheduled_date_time.split(' ')[1].split(':')[2]);
    for (const key in exam.modules) {
        if(key < index){
            const module = exam.modules[key];
            if(months < 10){
                months = `0${months}`;
            }
            if(days < 10){
                days = `0${days}`;
            }
            hours = hours + parseInt(module.time.split(':')[0]);
            minutes = minutes + parseInt(module.time.split(':')[1]);
            if(minutes > 59){
                minutes = minutes - 60;
                hours++;
            }
            if(minutes < 10){
                minutes = `0${minutes}`;
            }
            if(hours < 10){
                hours = `0${hours}`;
            }
            seconds = seconds + parseInt(module.time.split(':')[2]);
            if(seconds < 10){
                seconds = `0${seconds}`;
            }
            scheduled_date_time = `${years}-${months}-${days} ${hours}:${minutes}:${seconds}`;
        }
    }
    return scheduled_date_time;
}

function setTimer(module, tab){
    let scheduled_date_time = exam.scheduled_date_time;
    for (const key in exam.modules) {
        if(exam.modules[key] == module && key > 0){
            scheduled_date_time = addTime(scheduled_date_time, key);
        }
    }
    let years = parseInt(scheduled_date_time.split(' ')[0].split('-')[0]);
    let months = parseInt(scheduled_date_time.split(' ')[0].split('-')[1]);
    if(months < 10){
        months = `0${months}`;
    }
    let days = parseInt(scheduled_date_time.split(' ')[0].split('-')[2]);
    if(days < 10){
        days = `0${days}`;
    }

    let hours = parseInt(scheduled_date_time.split(' ')[1].split(':')[0]) + parseInt(module.time.split(':')[0]);
    let minutes = parseInt(scheduled_date_time.split(' ')[1].split(':')[1]) + parseInt(module.time.split(':')[1]);
    if(minutes > 59){
        minutes = minutes - 60;
        hours++;
    }
    if(minutes < 10){
        minutes = `0${minutes}`;
    }
    if(hours < 10){
        hours = `0${hours}`;
    }
    let seconds = parseInt(scheduled_date_time.split(' ')[1].split(':')[2]) + parseInt(module.time.split(':')[2]);
    if(seconds < 10){
        seconds = `0${seconds}`;
    }
    let time = `${years}-${months}-${days} ${hours}:${minutes}:${seconds}`;
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
                tab: tab,
            },
        }
    });
}

function nextModule(tab){
    let submitBtns = document.querySelectorAll('.submit-exam');
    let index;
    for (const btn of submitBtns) {
        index = btn.dataset.module;
        btn.dataset.module++;
        if(btn.dataset.module >= exam.modules.length){
            if(btn.children.length){
                btn.children[0].innerHTML = 'Submit Exam';
            }else{
                btn.innerHTML = 'Submit Exam';
            }
        }else{
            if(btn.children.length){
                btn.children[0].innerHTML = 'Continue';
            }else{
                btn.innerHTML = 'Continue';
            }
        }
    }
    tab.open([exam.modules[index].file], exam.modules[index].file);
    setTimer(getModule(document.querySelectorAll('.module-button')[document.querySelector('.submit-exam').dataset.module - 1].id), tab);
}

function getModule(id) {
    for(const module of exam.modules){
        if(`${module.folder}-${module.name}` == id){
            return module;
        }
    }
}

document.addEventListener('DOMContentLoaded', async function (e) {
    let choosen = document.querySelector('.tab-content').id;
    for (const content of document.querySelectorAll('.tab-content')) {
        if (content.id == URLServiceProvider.findHashParameter()) {
            choosen = content.id;
        }
    }
    
    if (document.querySelector('.tab-content')) {
        tab = new TabMenuJS({
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
    // for (const btn of submitBtns) {
    //     btn.addEventListener('click', function (e) {
    //         e.preventDefault();
    //         if(confirmar()){
    //             if(this.dataset.module >= exam.modules.length){
    //                 document.querySelector('form').submit();
    //             }else{
    //                 nextModule(tab);
    //             }
    //         }
           
    //     });
    // }

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

    setTimer(exam.modules[0], tab);

    let moduleBtns = document.querySelectorAll('.module-button');
    for (const btn of moduleBtns) {
        btn.addEventListener('click', function(e){
            e.preventDefault();
            let index;
            for (const key in exam.modules) {
                if(exam.modules[key] == getModule(this.id)){
                    index = parseInt(key) + 1;
                }
            }
            let submitBtns = document.querySelectorAll('.submit-exam');
            for (const btn of submitBtns) {
                btn.dataset.module = index;
                if(btn.dataset.module >= exam.modules.length){
                    if(btn.children.length){
                        btn.children[0].innerHTML = 'Submit Exam';
                    }else{
                        btn.innerHTML = 'Submit Exam';
                    }
                }else{
                    if(btn.children.length){
                        btn.children[0].innerHTML = 'Continue';
                    }else{
                        btn.innerHTML = 'Continue';
                    }
                }
            }
            setTimer(getModule(this.id), tab);
        });
    }

    let saveButton = document.querySelector('.save-button');
    saveButton.classList.remove('hidden');

    saveButton.addEventListener('click', sendData);

    setTimeIntervalAutoSave();
});

 