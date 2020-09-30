import { Validation as ValidationJS } from "../../submodules/ValidationJS/js/Validation.js";
import { Notification as NotificationJS } from "../../submodules/NotificationJS/js/Notification.js";

document.addEventListener('DOMContentLoaded', function(e){
    let see = document.querySelectorAll('.see-password');
    for(const btn of see){
        btn.addEventListener('click', function(e){
            e.preventDefault();
            let input = this.nextElementSibling;
            switch(input.type){
                case 'password':
                    input.type = 'text';
                    this.classList.add( 'active' );
                    this.children[0].classList.remove('fa-eye');
                    this.children[0].classList.add('fa-eye-slash');
                    break;
                case 'text':
                    input.type = 'password';
                    this.classList.remove( 'active' );
                    this.children[0].classList.remove('fa-eye-slash');
                    this.children[0].classList.add('fa-eye');
                    break;
            }
        });
    }

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
        id: 'login-form',
    }, rules, messages);
});