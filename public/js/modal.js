import { URLServiceProvider } from "../submodules/ProvidersJS/URLServiceProvider.js";

class Modal{
    constructor(properties = {
        id: 'modal-1',
        type: 'list',
    }, states = {
        open: false,
    }, data = false){
        this.setProperties(properties);
        this.setStates(states);
        this.setData(data);
        this.setHTML();
        this.checkOpened();
    }

    setProperties(properties = {
        id: 'modal-1',
        type: 'list',
    }){
        this.properties = {};
        this.setId(properties);
        this.setType(properties);
    }

    setStates(states = {
        open: false,
    }){
        this.states = {};
        this.setOpen(states);
    }

    setId(properties = {
        id: 'modal-1',
    }){
        this.properties.id = properties.id;
    }

    setType(properties = {
        type: 'list',
    }){
        this.properties.type = properties.type;
        switch(this.properties.type){
            case 'list':
                this.properties.list = properties.list;
                break;
        }
    }

    setOpen(states = {
        open: false,
    }){
        this.states.open = states.open;
    }

    setData(data = false){
        this.data = data;
    }

    setHTML(){
        this.html = document.querySelector(`.modal#${this.properties.id}`);
        switch (this.properties.type) {
            case 'list':
                this.list = document.querySelector(`.modal#${this.properties.id} ul`);
                this.list.innerHTML = '';
                for (const element of this.properties.list) {
                    if(this.data) {
                        if (this.data.hasOwnProperty(element.name)) {
                            let value = this.data[element.name];
                            if(element.name == 'created_at'){
                                let date = new Date(value);
                                let year = date.getFullYear();
                                let month = date.getMonth();
                                if(month.toString().length < 2){
                                    month = `0${month}`;
                                }
                                let day = date.getDay();
                                if(day.toString().length < 2){
                                    day = `0${day}`;
                                }
                                value = `${year}-${month}-${day}`;
                            }
                            this.createLi(element, value, true);
                        }
                    } else {
                        this.createLi(element, '');
                    }
                }
                break;
        }
    }

    createLi(element, value, disabled = false){
        let li = document.createElement('li');
        this.list.appendChild(li);
            let title = document.createElement('span');
            title.classList.add('d-block', 'list-label');
            title.innerHTML = element.title;
            li.appendChild(title);

            let input = document.createElement('input');
            input.classList.add('d-block', 'form-input', 'list-datos', 'mb-2');
            if(element.hasOwnProperty('disabled') && element.disabled){
                input.classList.add('ever-disabled');
            }
            input.id = element.name;
            input.type = element.type;
            input.name = element.name;
            input.value = value;
            input.disabled = disabled;
            li.appendChild(input);
    }

    open(){
        this.states.open = true;
        this.checkOpened();
    }

    close(){
        this.states.open = false;
        this.checkOpened();
    }

    checkOpened(){
        if(this.states.open){
            if(this.html.classList.contains('d-none')){
                this.html.classList.remove('d-none');
            }
        }else{
            this.html.classList.add('d-none');
        }
    }
}

function closeModal(params = {
    modal: undefined,
}){
    params.modal.close();
}

function sendForm(params = {
    type: undefined,
}){
    let url = URLServiceProvider.findOriginalRoute();
    url = url.split('/').pop();
    let form = document.querySelector('form');
    let id, input;
    if(!document.querySelector('.method')) {
        input = document.createElement('input');
        input.type = 'hidden';
        input.name = '_method';
        input.classList.add('method');
        form.appendChild(input);
    } else {
        input = document.querySelector('.method');
    }
    switch (params.type) {
        case 'add':
            input.value = 'POST';
            form.action = `/${url}/add`;
            form.submit();
            break;
        case 'delete':
            input.value = 'DELETE';
            id = document.querySelector('#id_candidate').value;
            form.action = `/${url}/${id}/delete`;
            if(document.querySelector('.confirm-input').value == 'DELETE') {
                form.submit();
            }
            break;
        case 'edit':
            input.value = 'PUT';
            id = document.querySelector('#id_candidate').value;
            form.action = `/${url}/${id}/edit`;
            form.submit();
            break;
    }
}

function disableInputs(){
    let inputs = document.querySelectorAll('.modal.details input');
    for(const input of inputs) {
        input.disabled = true;
    }
}

function enableInputs(){
    let inputs = document.querySelectorAll('.modal.details input');
    for(const input of inputs) {
        if(!input.classList.contains('ever-disabled')){
            input.disabled = false;
        }
    }
}

function createCancelBtn(event, params) {
    let div = document.querySelector('.modal-actions');
        let btn = document.createElement('button');
        btn.classList.add('cancel-data', 'btn', 'btn-one', 'mr-2');
        btn.innerHTML = 'Cancel';
        div.appendChild(btn);
        btn.addEventListener('click', function(e){
            e.preventDefault();
            event(params);
        });
}

function createAcceptBtn(event, params) {
    let div = document.querySelector('.modal-actions');
        let btn = document.createElement('button');
        btn.classList.add('accept-data', 'btn', 'btn-one', 'mr-2');
        btn.innerHTML = 'Accept';
        div.appendChild(btn);
        btn.addEventListener('click', function(e){
            e.preventDefault();
            event(params);
        });
}

function createEditBtn() {
    let div = document.querySelector('.modal-actions');
        let btn = document.createElement('button');
        btn.classList.add('edit-data', 'btn', 'btn-one', 'mr-2');
        btn.innerHTML = 'Edit';
        div.appendChild(btn);
        btn.addEventListener('click', function(e){
            e.preventDefault();
            setActions({
                type: 'edit'
            });
        });
}

function createDeleteBtn() {
    let div = document.querySelector('.modal-actions');
        let btn = document.createElement('button');
        btn.classList.add('delete-data', 'btn', 'btn-one', 'mr-2');
        btn.innerHTML = 'Delete';
        div.appendChild(btn);
        btn.addEventListener('click', function(e){
            e.preventDefault();
            setActions({
                type: 'delete'
            });
        });
}

function createConfirmMessage() {
    let div = document.querySelector('.modal-actions');
        let confirmBox = document.createElement('div');
        confirmBox.classList.add('confirm-box', 'd-flex', 'justify-content-center', 'flex-wrap', 'mb-3');
        div.appendChild(confirmBox);
            let paragraph = document.createElement('p');
            paragraph.classList.add('confirm-message', 'd-block', 'mb-0');
            paragraph.innerHTML = 'Are you sure you want to delete this data?';
            confirmBox.appendChild(paragraph);

            let span = document.createElement('span');
            span.classList.add('confirm-span', 'd-block');
            span.innerHTML = 'Write "DELETE" to confirm';
            confirmBox.appendChild(span);

            let input = document.createElement('input');
            input.classList.add('confirm-input', 'list-datos');
            input.type = 'text';
            confirmBox.appendChild(input);
}

function createConfirmForm(params){
    createConfirmMessage();
    createCancelBtn(setActions, params);
    createAcceptBtn(sendForm, {
        type: 'delete',
    });
}

export function createModal(list, data = false) {
    return new Modal({
        id: 'details',
        type: 'list',
        list: list, }, {
        open: true,
    }, data);
}

export function setActions(params = {
    type: undefined,
}, modal){
    document.querySelector('.modal-actions').innerHTML = '';
    switch (params.type) {
        case 'add':
            params.modal = modal;
            createCancelBtn(closeModal, params);
            createAcceptBtn(sendForm, {
                type: 'add',
            });
            break;
        case 'delete':
            params.type = 'info';
            createConfirmForm(params);
            break;
        case 'edit':
            params.type = 'info';
            createCancelBtn(setActions, params);
            createAcceptBtn(sendForm, {
                type: 'edit',
            });
            enableInputs();
            break;
        case 'info':
            createEditBtn();
            createDeleteBtn();
            disableInputs();
            break;
    }
}