import { URLServiceProvider } from "../submodules/ProvidersJS/URLServiceProvider.js";
import { Validation as ValidationJS } from '../submodules/ValidationJS/js/Validation.js';
import { Filter as FilterJS } from "../../submodules/FilterJS/js/Filter.js";

import { Table } from "./Table/Table.js";

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
                        if(element.name.split(':').length <= 1){
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
                        }else{
                            let elementToSearch = element.name.split(':')[0];
                            let valueToSearch = element.name.split(':')[1];
                            if (this.data.hasOwnProperty(elementToSearch)) {
                                if (this.data[elementToSearch].hasOwnProperty(valueToSearch)) {
                                    let value = this.data[elementToSearch][valueToSearch];
                                    this.createLi(element, value, true);
                                }
                            }
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
            if(element.name == 'candidates'){
                this.createCandidates(element, value, title, disabled, li);
            }else if(element.name == 'modules' || element.name == 'candidate:modules'){
                this.createModules(element, value, disabled, li);
            }else if(element.name == 'file'){
                this.createFiles(li);
            }else if(element.name == 'password'){
                this.createPassword();
            }else{
                this.createInputs(element, value, disabled, li);
            }
    }

    createPassword(){
        
    }

    createCandidates(element, candidates, title, disabled, li){
        let span = document.createElement('span');
        let length = 0;
        if(candidates){
            for (const candidate of candidates) {
                length++;
            }
        }
        span.classList.add('ml-2');
        title.classList.add('d-block', 'list-label', 'mb-2');
        span.innerHTML = `(${length})`;
        title.appendChild(span);

        let input = document.createElement('input');
        input.classList.add('form-input');
        input.id = element.name;
        input.type = element.type;
        input.name = element.name;
        for (const candidate of candidates) {
            if(input.value){
                input.value += `,${candidate.id_candidate}`;
                input.dataset.original += `,${candidate.id_candidate}`;
            }else{
                input.value = candidate.id_candidate;
                input.dataset.original = candidate.id_candidate;
            }
        }
        input.disabled = disabled;
        title.appendChild(input);

        if(!(/id_candidate/.exec(element.name) && /id_exam/.exec(element.name) && /id_record/.exec(element.name))){
            let support = document.createElement('span');
            support.classList.add('support', 'support-box', `support-${element.name}`, 'hidden', 'mb-2');
            li.appendChild(support);
            if(errors && errors.candidates && errors.candidates[0]){
                support.classList.add('support', 'support-box', `support-${element.name}`, 'mb-2');
                support.innerHTML = errors.candidates[0];
            }else{
                support.classList.add('support', 'support-box', `support-${element.name}`, 'hidden', 'mb-2');
            }
        }
    }

    createModules(element, value, disabled, li){
        let div = document.createElement('div');
        div.classList.add('d-flex', 'flex-wrap', 'align-items-center');
        li.appendChild(div);
        value = value.split(',');
        for (const module in modules) {
            let input = document.createElement('input');
            input.classList.add('d-inline-block', 'form-input', 'list-datos', 'mb-2', 'mr-2');
            if(element.hasOwnProperty('disabled') && element.disabled){
                input.classList.add('ever-disabled');
            }
            input.id = module;
            input.type = element.type;
            input.name = `${element.name}[]`;
            input.value = module;
            input.dataset.original = true;
            input.disabled = disabled;
            for (const moduleSelected of value) {
                if(moduleSelected == module){
                    input.checked = true;
                }
            }
            div.appendChild(input);

            let label = document.createElement('label');
            label.classList.add('mr-3', 'mb-2');
            label.htmlFor = module;
            label.innerHTML = module;
            div.appendChild(label);
        }
        if(!(/id_candidate/.exec(element.name) && /id_exam/.exec(element.name) && /id_record/.exec(element.name))){
            let support = document.createElement('span');
            li.appendChild(support);
            if(errors && errors.modules && errors.modules[0]){
                support.classList.add('support', 'support-box', `support-${element.name}`, 'mb-2');
                support.innerHTML = errors.modules[0];
            }else{
                support.classList.add('support', 'support-box', `support-${element.name}`, 'hidden', 'mb-2');
            }
        }
    }

    createFiles(li){
        let selected;
        for (const record of records) {
            if (document.querySelector('.details #id_record').value == record.id_record) {
                selected = record;
            }
        }
        let div = document.createElement('div');
        div.classList.add('d-flex');
        li.appendChild(div);
            let btnFile = document.createElement('a');
            btnFile.href = `/storage/${selected.file}`;
            btnFile.target = '_blank';
            btnFile.classList.add('d-block', 'mb-2', 'mr-2', 'btn', 'btn-two-transparent', 'btn-icon');
            div.appendChild(btnFile);
                let iconFile = document.createElement('i');
                iconFile.classList.add('far', 'fa-file');
                btnFile.appendChild(iconFile);

            let btnID = document.createElement('a');
            btnID.href = `/storage/${selected.id}`;
            btnID.target = '_blank';
            btnID.classList.add('d-block', 'mb-2', 'btn', 'btn-two-transparent', 'btn-icon');
            div.appendChild(btnID);
                let iconID = document.createElement('i');
                iconID.classList.add('far', 'fa-id-card');
                btnID.appendChild(iconID);
    }

    createInputs(element, value, disabled, li){
        let input = document.createElement('input');
        input.classList.add('d-block', 'form-input', 'list-datos', 'mb-2');
        if(element.name == 'id_candidate' || element.name == 'id_exam' || element.name == 'id_record'){
            input.classList.add('input-id');
        }
        if(element.hasOwnProperty('disabled') && element.disabled){
            input.classList.add('ever-disabled');
        }
        input.id = element.name;
        input.type = element.type;
        input.name = element.name;
        if(value){
            input.value = value;
            input.dataset.original = value;
        }else{
            input.value = '';
            input.placeholder = element.title;
            input.dataset.original = '';
        }
        input.disabled = disabled;
        li.appendChild(input);
        if(!(/id_candidate/.exec(element.name) && /id_exam/.exec(element.name) && /id_record/.exec(element.name))){
            let support = document.createElement('span');
            li.appendChild(support);
            if(errors && errors[element.name] && errors[element.name][0]){
                support.classList.add('support', 'support-box', `support-${element.name}`, 'mb-2');
                support.innerHTML = errors[element.name][0];
            }else{
                support.classList.add('support', 'support-box', `support-${element.name}`, 'hidden', 'mb-2');
            }
        }
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

function refreshData(){
    for(const input of document.querySelectorAll(`.modal ul [data-original]`)){
        if(input.type == 'checkbox'){
            input.checked = input.dataset.original;
        }else{
            if(input.id == 'candidates'){
                input.previousElementSibling.innerHTML = `(${input.dataset.original.split(',').length})`;
            }
            input.value = input.dataset.original;
        }
    }
}

function orderCandidates(data){
    // for (const value of document.querySelector('.modal.details #candidates').value.split(',')) {
        
    // }
}

function changeCandidateContent(params = {
    table: undefined,
    data: [],
}){
    orderCandidates(params.data);
    if(params.data && params.data.length){
        $('.filter-pagination-candidates').pagination({
            dataSource: params.data,
            pageSize: 10,
            autoHidePrevious: true,
            autoHideNext: true,
            prevText: '',
            nextText: '',
            callback: function(data, pagination) {
                params.table.changeData(data);
                for (const tr of document.querySelectorAll('tr')) {
                    for (const value of document.querySelector('.modal.details #candidates').value.split(',')) {
                        if(tr.dataset.id_candidate == value){
                            tr.children[0].children[0].checked = true;
                        }
                    }
                }
            }
        });
    }else{
        params.table.changeData([]);
        document.querySelector('.filter-pagination').innerHTML = '';
    }
}

function closeModal(params = {
    modal: undefined,
}){
    params.modal.close();
}

function disableInputs(){
    let inputs = document.querySelectorAll('.modal.details input');
    for(const input of inputs) {
        if(input.type != 'hidden'){
            input.disabled = true;
        }
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
            if(URLServiceProvider.findOriginalRoute().split('/').pop() == 'exams' && (params.type == 'create' || params.type == 'info')){
                showTable();
            }
        });
}

function createAcceptBtn(params) {
    let div = document.querySelector('.modal-actions');
        let btn = document.createElement('button');
        btn.classList.add('accept-data', 'form-submit', 'action-form', 'btn', 'btn-one-transparent', 'mr-2');
        btn.type = 'submit';
        btn.innerHTML = 'Accept';
        div.appendChild(btn);
    let url = URLServiceProvider.findOriginalRoute();
    url = url.split('/').pop();
    let form = document.querySelector('form');
    let id, input, validation;
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
        case 'create':
            if(url == 'exams'){
                createCandidatesCheckboxes();
            }
            input.value = 'POST';
            form.action = `/${url}/create`;
            validation = new ValidationJS({
                id: 'action-form',
            }, rules, messages);
            break;
        case 'delete':
            input.value = 'DELETE';
            id = document.querySelector('.input-id').value;
            form.action = `/${url}/${id}/delete`;
            btn.addEventListener('click', function(e){
                e.preventDefault();
                if(document.querySelector('.confirm-input').value == 'DELETE') {
                    form.submit();
                }
            });
            break;
        case 'edit':
            if(url == 'exams'){
                createCandidatesCheckboxes();
            }
            input.value = 'PUT';
            id = document.querySelector('.input-id').value;
            form.action = `/${url}/${id}/edit`;
            validation = new ValidationJS({
                id: 'action-form',
            }, rules, messages);
            break;
    }
}

function hideTable(){
    document.querySelector('#exams table.table').classList.add('d-none');
    document.querySelector('#exams .filter-pagination').classList.add('d-none');
}

function showTable(){
    document.querySelector('#exams table.table').classList.remove('d-none');
    document.querySelector('#exams .filter-pagination').classList.remove('d-none');
    document.querySelector('#exams table.subtable').parentNode.removeChild(document.querySelector('#exams table.subtable'));
    document.querySelector('#exams .filter-pagination-candidates').parentNode.removeChild(document.querySelector('#exams .filter-pagination-candidates'));
}

function createCandidatesCheckboxes(){
    hideTable();

    let cols = [ { 
        data: 'checkbox'
    }, { 
        data: 'full_name'
    }, {
        data: 'email'
    } ];

    let html = document.createElement('table');
    html.classList.add('table', 'subtable');
    document.querySelector('#exams table').parentNode.appendChild(html);
    let div = document.createElement('div');
    div.classList.add('filter-pagination-candidates');
    document.querySelector('#exams table').parentNode.appendChild(div);

    let newTable = new Table({
        cols: cols,
        data: [],
    }, html);
    
    let newFilter = new FilterJS({
        id: 'candidates',
        order: {
            by: 'id_candidate',
        },
    }, {}, [{
        type: 'search',
        target: 'full_name,email',
        event: {
            function: changeCandidateContent,
            params: {
                table: newTable,
            },
        },
    }], candidates);

    changeCandidateContent({
        table: newTable,
        data: newFilter.execute(),
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
        btn.classList.add('delete-data', 'btn', 'btn-one-transparent', 'mr-2');
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
    params.return = true;
    createCancelBtn(setActions, params);
    createAcceptBtn({
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
        case 'create':
            params.modal = modal;
            createCancelBtn(closeModal, params);
            createAcceptBtn({
                type: 'create',
            });
            break;
        case 'delete':
            params.type = 'info';
            createConfirmForm(params);
            break;
        case 'edit':
            params.type = 'info';
            params.return = true;
            createCancelBtn(setActions, params);
            createAcceptBtn({
                type: 'edit',
            });
            enableInputs();
            break;
        case 'info':
            if(!params.url || params.url != 'records'){
                createEditBtn();
                createDeleteBtn();
            }
            if(params.return){
                refreshData();
            }
            disableInputs();
            break;
    }
}