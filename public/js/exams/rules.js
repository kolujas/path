import { Validation as ValidationJS } from "../../submodules/ValidationJS/js/Validation.js";
import { InputFileMaker as InputFileMakerJS } from "../../submodules/InputFileMakerJS/js/InputFileMaker.js";
import { CountDown } from "../CountDown.js";
import { Notification as NotificationJS } from "../../submodules/NotificationJS/js/Notification.js";

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
    createHours(data.countdown.hours)
    createMinutes(data.countdown.minutes)
    createSeconds(data.countdown.seconds)
}

function end(data = undefined){

}

document.addEventListener('DOMContentLoaded', function(e){
    let input = new InputFileMakerJS({
        id: 'ID',
    });

    let countDown = new CountDown({
        scheduled_date_time: exam.scheduled_date_time,
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
            element: document.querySelector('body'),
            insertBefore: document.querySelector('body').children[0]
        }));
    }

    let validation = new ValidationJS({
        id: 'rules-form',
    }, rules, messages);
});