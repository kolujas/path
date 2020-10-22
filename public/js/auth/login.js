import { Validation as ValidationJS } from "../../submodules/ValidationJS/js/Validation.js";
import { Notification as NotificationJS } from "../../submodules/NotificationJS/js/Notification.js";
import { FetchServiceProvider } from "../providers/FetchServiceProvider.js";
import { LocalStorageServiceProvider } from "../providers/LocalStorageServiceProvider.js";

function setLoadingState(){
    let btn = document.querySelector('button.form-submit');
    btn.innerHTML= '';
    btn.classList.add('loading-dots');
    btn.removeEventListener('click', sendData);
}

function setFinishState(){
    let btn = document.querySelector('button.form-submit');
    btn.innerHTML = 'Log In';
    btn.classList.remove('loading-dots');
    btn.addEventListener('click', sendData);
}

async function sendData(){
    let validation = new ValidationJS({
        id: 'login-form',
        submit: false,
    }, rules, messages);

    let form = document.querySelector('form');
    let formData = new FormData(form);
    let token = formData.get('_token');
    formData.delete('_token');
    setLoadingState();
    let fetchService = await FetchServiceProvider.setData({
        method: 'POST',
        url: `/api/login`,
    }, {
        'Accept': 'application/json',
        'Content-type': 'application/json; charset=UTF-8',
        'X-CSRF-TOKEN': token,
    }, formData);
    setFinishState();
    if(!form.classList.contains('invalid')){
        let response = fetchService.getResponse();
        let localStorageService = LocalStorageServiceProvider.setData('Path_Candidate_Token', response.data, true);
        form.submit();
    }
}

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

    document.querySelector('button.form-submit').addEventListener('click', sendData);
});