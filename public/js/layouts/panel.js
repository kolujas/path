import { Notification as NotificationJS } from "../../submodules/NotificationJS/js/Notification.js";

document.addEventListener('DOMContentLoaded', function(e) {
    let notifications = [];
    if(status){
        notifications.push(new NotificationJS({
            id: 'notification-1',
            code: status.code,
            message: status.message,
        }, { show: true }, {
            element: document.querySelector('.tab-content-list'),
            insertBefore: document.querySelector('.tab-content-list').children[0]
        }));
    }
});