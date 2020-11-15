import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { NavMenu } from "../../submodules/NavMenuJS/js/NavMenu.js";
import { URLServiceProvider } from "../providers/URLServiceProvider.js";
import { FetchServiceProvider } from "../providers/FetchServiceProvider.js";
import { CountDown } from "../CountDown.js";
import { LocalStorageServiceProvider } from "../providers/LocalStorageServiceProvider.js";

let evaluation, tab,
    form = document.querySelector('form'),
    localStorageService = LocalStorageServiceProvider.getData('Path_Candidate_Token');

// ? Tooltip
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

// ? Qué es esto?
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

// ? Desactivar F5
// $(document).on("keydown", function(e) {
//     if ((e.which || e.keyCode) == 116) e.preventDefault();
// });

// ! ESTO ESTABA ANTERIORMENTE, EN CASO DE QUE NO FUNCIONE IMPORTAR ÉSTO
function disableF5(e) {
    if ((e.which || e.keyCode) == 116) e.preventDefault();
};

// ? Desactivar el copy paste
$('body').on('copy paste', 'input', function (e)
    { e.preventDefault();
});

$('body').on('copy paste', 'textarea', function (e)
    { e.preventDefault();
});

/**
 * * Update Save button timer.
 * @param {Object} data Data to get from CountDown.
 */
function updateSaveTimer(data = undefined){
    if(document.querySelector('.save-button.countdown')){
        let timer = document.querySelector('.save-button .timer');
        timer.innerHTML = `(${data.countdown.seconds})`;
    }else{
        data.countdown.stop();
    }
}

/**
 * * Change Save button time iterval to auto execute.
 */
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

function parseSpaces(text){
    if (/ /.exec(text)) {
        text = text.replace(/ /, '_');
    }
    return text;
}

/**
 * * Replace a Module timer with a new one.
 * @param {Object} data Data to get from CountDown.
 */
function current(data = undefined){
    document.querySelector(`#${parseSpaces(data.module.folder)}-${data.module.name}-tab .time`).innerHTML = `${data.countdown.hours}:${data.countdown.minutes}:${data.countdown.seconds}`;
}

/**
 * * Remove a Module timer.
 * @param {Object} data Data to get from CountDown.
 */
function end(data = undefined){
    document.querySelector('.clock').style.display = 'none';
    let time = document.querySelector(`#${data.module.folder.replace(/ /, '_')}-${data.module.name}-tab .time`);
    time.innerHTML = 'ended';
    time.classList.add('text', 'text-two');
    let index;
    for (const key in evaluation.exam.modules) {
        if(evaluation.exam.modules[key] == data.module){
            index = parseInt(key) + 1;
        }
    }
    if(index >= evaluation.exam.modules.length){
        form.submit();
    }else{
        nextModule(data.tab);
    }
}

/**
 * * Set Save button in loading state.
 */
function setLoadingState(){
    let btn = document.querySelector('.save-button');
    btn.innerHTML= '';
    btn.classList.add('loading-dots');
    btn.removeEventListener('click', sendData);
}

/**
 * * Unset Save button in loading state.
 */
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

/**
 * * Send data to the API.
 */
async function sendData(){
    let btn = document.querySelector('.save-button').classList.remove('countdown');
    let formData = new FormData(form);
    let token = formData.get('_token');
    formData.delete('_token');
    setLoadingState();
    let response = await FetchServiceProvider.setData({
        method: 'POST',
        url: `/api/exam/${evaluation.id_evaluation}/record`,
    }, {
        'Accept': 'application/json',
        'Content-type': 'application/json; charset=UTF-8',
        'X-CSRF-TOKEN': token,
        'Authorization': "Bearer " + localStorageService.data,
    }, formData);
    setFinishState();
}

/**
 * * Generate the date correctly.
 * @param {String} date Date to correct.
 * @returns {String} A date corrected.
 */
function parseTime(date){
    let daysOfTheMonths = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; 
    let time = date.split(' ')[1];
        date = date.split(' ')[0];
    let years, months, days;
    if(/-/.exec(date)){
        years = parseInt(date.split('-')[0]);
        months = parseInt(date.split('-')[1]);
        days = parseInt(date.split('-')[2]);
    }else if(/\//.exec(date)){
        years = parseInt(date.split('/')[0]);
        months = parseInt(date.split('/')[1]);
        days = parseInt(date.split('/')[2]);
    }
    let hours = parseInt(time.split(':')[0]),
        minutes = parseInt(time.split(':')[1]),
        seconds = parseInt(time.split(':')[2]);
    let length;
    if(length = parseInt(seconds / 60)){
        seconds = seconds - (60 * length);
        for (let i=1; i <= length; i++) { 
            minutes++;
        }
    }
    if(seconds < 10){
        seconds = `0${seconds}`;
    }
    if(length = parseInt(minutes / 60)){
        minutes = minutes - (60 * length);
        for (let i=1; i <= length; i++) { 
            hours++;
        }
    }
    if(minutes < 10){
        minutes = `0${minutes}`;
    }
    if(length = parseInt(hours / 24)){
        hours = hours - (24 * length);
        for (let i=1; i <= length; i++) { 
            days++;
        }
    }
    if(hours < 10){
        hours = `0${hours}`;
    }
    if(length = parseInt(months / 12)){
        months = months - (12 * length);
        for (let i=1; i <= length; i++) { 
            years++;
        }
    }
    if(length = parseInt(days / daysOfTheMonths[months])){
        days = days - (daysOfTheMonths[months] * length);
        for (let i=1; i <= length; i++) { 
            months++;
        }
    }
    if(days < 10){
        days = `0${days}`;
    }
    if(length = parseInt(months / 12)){
        months = months - (12 * length);
        for (let i=1; i <= length; i++) { 
            years++;
        }
    }
    if(months < 10){
        months = `0${months}`;
    }

    return `${years}-${months}-${days} ${hours}:${minutes}:${seconds}`;
}

function tinier(scheduledTime){
    let seconds = Math.floor((scheduledTime % (1000 * 60)) / 1000);
    let minutes = Math.floor((scheduledTime % (1000 * 60 * 60)) / (1000 * 60));
    let hours = Math.floor(scheduledTime / (1000 * 60 * 60));
    if(length = parseInt(seconds / 60)){
        seconds = seconds - (60 * length);
        for (let i=1; i <= length; i++) { 
            minutes++;
        }
    }
    if(seconds < 10){
        seconds = `0${seconds}`;
    }
    if(length = parseInt(minutes / 60)){
        minutes = minutes - (60 * length);
        for (let i=1; i <= length; i++) { 
            hours++;
        }
    }
    if(minutes < 10){
        minutes = `0${minutes}`;
    }
    if(hours < 10){
        hours = `0${hours}`;
    }
    return `${hours}:${minutes}:${seconds}`;
}

function addTime(scheduled_date_time, timeToAdd){
    let hours = parseInt(scheduled_date_time.split(' ')[1].split(':')[0]);
    let minutes = parseInt(scheduled_date_time.split(' ')[1].split(':')[1]);
    let seconds = 0;
    if (parseInt(scheduled_date_time.split(' ')[1].split(':')[2])) {
        seconds = parseInt(scheduled_date_time.split(' ')[1].split(':')[2]);
    }
    let hoursToAdd = parseInt(timeToAdd.split(':')[0]);
    let minutesToAdd = parseInt(timeToAdd.split(':')[1]);
    let secondsToAdd = parseInt(timeToAdd.split(':')[2]);
    seconds = seconds + secondsToAdd;
    if (seconds > 59) {
        minutes++;
        seconds = seconds - 60;
    }
    if (seconds < 10) {
        seconds = `0${seconds}`
    }
    minutes = minutes + minutesToAdd;
    if (minutes > 59) {
        hours++;
        minutes = minutes - 60;
    }
    if (minutes < 10) {
        minutes = `0${minutes}`
    }
    hours = hours + hoursToAdd;
    if (hours > 23) {
        hours = hours - 24;
    }
    if (hours < 10) {
        hours = `0${hours}`
    }
    return `${scheduled_date_time.split(' ')[0]} ${hours}:${minutes}:${seconds}`;
}

/**
 * * Set a Module timer.
 * @param {Module} module Module to set the timer.
 * @param {TabMenu} tab TabMenu to detect who has to be opened.
 */
function setTimer(module = undefined, tab = undefined){
    let scheduled_date_time = evaluation.exam.scheduled_date_time;
    let position = evaluation.exam.modules.indexOf(module);
    if (position > 0) {
        for (const key in evaluation.exam.modules) {
            if (evaluation.exam.modules.hasOwnProperty(key)) {
                if (parseInt(key) < position) {
                    const currentModule = evaluation.exam.modules[key];
                    let timeToComparate = tinier(new Date() - new Date(evaluation.exam.scheduled_date_time));
                    if (currentModule.time > timeToComparate) {
                        scheduled_date_time = addTime(scheduled_date_time, timeToComparate);
                        break;
                    }
                }
            }
        }
    }
    let date = scheduled_date_time.split(' ')[0],
        time = scheduled_date_time.split(' ')[1],
        years, months, days,
        hours, minutes, seconds;
    if(/-/.exec(date)){
        years = parseInt(date.split('-')[0]);
        months = parseInt(date.split('-')[1]);
        days = parseInt(date.split('-')[2]);
    }else if(/\//.exec(date)){
        years = parseInt(date.split('/')[0]);
        months = parseInt(date.split('/')[1]);
        days = parseInt(date.split('/')[2]);
    }

    hours = parseInt(time.split(':')[0]) + parseInt(module.time.split(':')[0]);
    minutes = parseInt(time.split(':')[1]) + parseInt(module.time.split(':')[1]);
    if (parseInt(time.split(':')[2])) {
        seconds = parseInt(time.split(':')[2]) + parseInt(module.time.split(':')[2]);
    } else {
        seconds = parseInt(module.time.split(':')[2]);
    }

    let full_time = parseTime(`${years}-${months}-${days} ${hours}:${minutes}:${seconds}`);
    console.log(full_time);

    let countDown = new CountDown({
        scheduled_date_time: full_time,
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

function centerItVariableWidth(target, outer){
    var out = $(outer);
    var tar = $(target);
    var x = out.width();
    var y = tar.outerWidth(true);
    var z = tar.index();
    var q = 0;
    var m = out.find('li');
    //Just need to add up the width of all the elements before our target. 
    for(var i = 0; i < z; i++){
      q+= $(m[i]).outerWidth(true);
    }
    out.scrollLeft(Math.max(0, q - (x - y)/2));
  }

/**
 * * Change TabMenu content.
 * @param {TabMenu} tab TabMenu.
 */
function nextModule(tab){
    let submitBtns = document.querySelectorAll('.submit-exam');
    let index;
    for (const btn of submitBtns) {
        index = btn.dataset.module;
        btn.dataset.module++;
        if(btn.dataset.module >= evaluation.exam.modules.length){
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
    tab.open([`${evaluation.exam.modules[index].folder.replace(' ', '_')}-${evaluation.exam.modules[index].name}`], `${evaluation.exam.modules[index].folder.replace(' ', '_')}-${evaluation.exam.modules[index].name}`);
    setTimer(getModule(document.querySelectorAll('.module-button')[document.querySelector('.submit-exam').dataset.module - 1].id), tab);
}

/**
 * * Get a Module.
 * @param {String} id Module ID.
 * @returns {Module} A Module.
 */
function getModule(id) {
    for(const module of evaluation.exam.modules){
        if(`${module.folder.replace(/ /, '_')}-${module.name}` == id.replace('-tab', '')){
            return module;
        }
    }
}

document.addEventListener('DOMContentLoaded', async function (e) {
    let formData = new FormData(form),
        token = formData.get('_token');
    formData.delete('_token');
    let headers = {
        'Accept': 'application/json',
        'Content-type': 'application/json; charset=UTF-8',
        'X-CSRF-TOKEN': token,
        'Authorization': "Bearer " + localStorageService.data,
    };
    let fetchprovider = await FetchServiceProvider.getData(`/api/evaluation/${id_evaluation}`, headers);
    evaluation = fetchprovider.getResponse('data').evaluation;
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
            noClick: true,
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

    setTimer(evaluation.exam.modules[0], tab);

    // ? Modal de los strikes
    const modalStrikesMessage = document.querySelector('.modal-strikes .modal-body p');
    const strikesInput = document.querySelector('.strikes');
    document.addEventListener('visibilitychange', function(){ 
        if(document.visibilityState == 'hidden'){
            if(!strikesInput.value){
                strikesInput.value = 0;        
            }
            if(strikesInput.value >= 1){
                modalStrikesMessage.innerHTML = "Tu examen ha sido marcado";
                $('.modal-strikes').modal();
            }else{
                strikesInput.value++;
                modalStrikesMessage.innerHTML = "Si volves a salir te marcaremos el examen";
                $('.modal-strikes').modal();
            }
        }
    });

    $(document).mouseleave(function () {
        if(!strikesInput.value){
            strikesInput.value = 0;
        }else{
            // strikesInput.value++;
            if(strikesInput.value == 0){
                modalStrikesMessage.innerHTML = "Si salis de la pagina te marcaremos el examen";
                $('.modal-strikes').modal();
            }
        }
    });

    // ? Modal de cambio de Módulo
    const confirmButton = document.querySelector('.confirm-button');
    const cancelButton = document.querySelector('.cancel-button');
    const submitsExamButtons = document.querySelectorAll('.submit-exam');
    const modalConfirm = document.querySelector('.modal-confirm');
    
    for (const button of submitsExamButtons) {
        button.addEventListener('click', function(e){
            $('.modal-confirm').modal();
        })
    }

    confirmButton.addEventListener('click', function(e){
        e.preventDefault();
        if(submitsExamButtons[0].dataset.module >= evaluation.exam.modules.length){
            form.submit();
        }else{
            nextModule(tab);
        }
    })

    // ! Los Module Buttons ejecutan funciones en el cambio de sección, Pero para el final no se debe permitir.
    let moduleBtns = document.querySelectorAll('.module-button');
    for (const btn of moduleBtns) {
        btn.addEventListener('click', function(e){
            e.preventDefault();
    //         let index;
    //         for (const key in evaluation.exam.modules) {
    //             if(evaluation.exam.modules[key] == getModule(this.id)){
    //                 index = parseInt(key) + 1;
    //             }
    //         }
    //         let submitBtns = document.querySelectorAll('.submit-exam');
    //         for (const btn of submitBtns) {
    //             btn.dataset.module = index;
    //             if(btn.dataset.module >= evaluation.exam.modules.length){
    //                 if(btn.children.length){
    //                     btn.children[0].innerHTML = 'Submit Exam';
    //                 }else{
    //                     btn.innerHTML = 'Submit Exam';
    //                 }
    //             }else{
    //                 if(btn.children.length){
    //                     btn.children[0].innerHTML = 'Continue';
    //                 }else{
    //                     btn.innerHTML = 'Continue';
    //                 }
    //             }
    //         }
    //         setTimer(getModule(this.id), tab);
        });
    }

    // ? Save button
    let saveButton = document.querySelector('.save-button');
    saveButton.classList.remove('hidden');

    saveButton.addEventListener('click', sendData);

    setTimeIntervalAutoSave();
});