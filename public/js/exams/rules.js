import { Validation as ValidationJS } from "../../submodules/ValidationJS/js/Validation.js";
import { CountDown } from "../CountDown.js";
import { Notification as NotificationJS } from "../../submodules/NotificationJS/js/Notification.js";
import { LocalStorageServiceProvider } from "../providers/LocalStorageServiceProvider.js";

function addDots(){
    let timer = document.querySelector('.timer');
        let dots = document.createElement('span');
        dots.innerHTML += ':';
        dots.classList.add('dots')
        timer.appendChild(dots);
}

function createHours(hours = undefined){
    let html, timer = document.querySelector('.timer');
    if(!document.querySelector('.hour')){
        timer.innerHTML = '';
        html = document.createElement('span');
        html.classList.add('hour');
        html.innerHTML = hours;
        timer.appendChild(html);
        addDots();
    }else{
        html = document.querySelector('.hour');
        if(html.innerHTML != hours){
            html.innerHTML = hours;
        }
    }
}

function createMinutes(minutes = undefined){
    let html, timer = document.querySelector('.timer');
    if(!document.querySelector('.minute')){
        let html = document.createElement('span');
        html.classList.add('minute');
        html.innerHTML = minutes;
        timer.appendChild(html);
        addDots();
    }else{
        html = document.querySelector('.minute');
        if(html.innerHTML != minutes){
            html.innerHTML = minutes;
        }
    }
}

function createSeconds(seconds = undefined){
    let html, timer = document.querySelector('.timer');
    if(!document.querySelector('.second')){
        let html = document.createElement('span');
        html.classList.add('second');
        html.innerHTML = seconds;
        timer.appendChild(html);
    }else{
        html = document.querySelector('.second');
        if(html.innerHTML != seconds){
            html.innerHTML = seconds;
        }
    }
}

function current(data = undefined){
    if (!isNaN(data.countdown.hours)) {
        if (document.querySelector('.timer').classList.contains('text') && document.querySelector('.timer').classList.contains('text-two')) {
            document.querySelector('.timer').classList.remove('text', 'text-two');
        }
        createHours(data.countdown.hours)
        createMinutes(data.countdown.minutes)
        createSeconds(data.countdown.seconds)
    } else {
        document.querySelector('.timer').innerHTML = 'Calculating...';
        document.querySelector('.timer').classList.add('text', 'text-two');
    }
}

function end(data = undefined){
    document.querySelector('.timer').innerHTML = 'Started';
    document.querySelector('.timer').classList.add('text', 'text-two');
    document.querySelector('.clock').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function(e){
    let countDown = new CountDown({
        scheduled_date_time: evaluation.exam.scheduled_date_time,
        timer: {
            hours: true,
            minutes: true,
            seconds: true,
        }
    }, {
        current: {
            functionName: current,
            params: {
                
            },
        }, end: {
            functionName: end,
            params: {
                
            },
        }
    });

    let notifications = [];
    if(status){
        notifications.push(new NotificationJS({
            id: 'notification-1',
            code: status.code,
            message: status.message,
        }, { show: true }, {
            element: document.querySelector('.rules-header'),
            insertBefore: document.querySelector('.rules-header').children[1]
        }));
    }

    if (document.querySelector('button.rules-form:not(.sidebar-button)')) {
        let validation = new ValidationJS({
            id: 'rules-form',
        }, rules, messages);
    }

    // if (LocalStorageServiceProvider.hasData('Path_Exam_Module')) {
    //     LocalStorageServiceProvider.removeData('Path_Exam_Module');
    // }
});