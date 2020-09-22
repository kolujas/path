import { InputFileMaker as InputFileMakerJS } from "../../submodules/InputFileMakerJS/js/InputFileMaker.js";
import { CountDown } from "../CountDown.js";
import { Notification as NotificationJS } from "../../submodules/NotificationJS/js/Notification.js";

document.addEventListener('DOMContentLoaded', function(e){
    let input = new InputFileMakerJS({
        id: 'ID',
    });

    let countDown = new CountDown({
        scheduled_date_time: exam.scheduled_date_time,
        timer: {
            days: true,
            hours: true,
            minutes: true,
            seconds: true,
        }, message: 'Exam started'
    }, document.querySelector(".timer"));

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
});