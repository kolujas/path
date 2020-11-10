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
                            let value = '';
                            if (this.data.hasOwnProperty(element.name)) {
                                value = this.data[element.name];
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
                            }
                            this.createLi(element, value, true);
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
            if(element.hide){
                li.classList.add('hide');
                li.dataset.hide = 1;
            }
            if(element.required){
                li.dataset.required = 1;
                let required = document.createElement('span');
                required.innerHTML = '*';
                required.classList.add('required', 'ml-2');
                title.appendChild(required);
                title.title = 'Required';
            }
            if(element.name == 'candidates'){
                this.createCandidates(element, value, title, disabled, li);
            }else if(element.name == 'modules' || element.name == 'candidate:modules'){
                this.createModules(element, value, disabled, li);
            }else if(element.name == 'file'){
                this.createFiles(li);
            }else if(element.name == 'rules'){
                this.createRules(element, value, disabled, li);
            }else{
                this.createInputs(element, value, disabled, li);
            }
    }

    createCandidates(element, candidatesToFor, title, disabled, li){
        let span = document.createElement('span');
        let length = 0;
        if(candidatesToFor){
            for (const candidate of candidatesToFor) {
                length++;
            }
        }
        span.classList.add('candidates', 'ml-2');
        title.classList.add('d-block', 'list-label', 'mb-2');
        span.innerHTML = `(${length})`;
        title.appendChild(span);

        let input = document.createElement('input');
        input.classList.add('form-input');
        input.id = element.name;
        input.type = element.type;
        input.name = element.name;
        for (const candidate of candidatesToFor) {
            if(candidate){
                if(input.value){
                    input.value += `,${candidate.id_candidate}`;
                    input.dataset.original += `,${candidate.id_candidate}`;
                }else{
                    input.value = candidate.id_candidate;
                    input.dataset.original = candidate.id_candidate;
                }
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
        div.classList.add('d-flex', 'flex-wrap', 'align-items-start', 'flex-wrap');
        li.appendChild(div);
        value = value.split(',');
        let int = 1;
        for (const module in modules) {
            int++;
            let label = document.createElement('label');
            label.classList.add('col-5', 'p-0', 'mr-3', 'mb-2');
            if (document.querySelector('.input-id')) {
                label.classList.add('hidden');
            }
            div.appendChild(label);

            let input = document.createElement('input');
            input.classList.add('d-inline-block', 'form-input', 'list-datos', 'mb-2', 'mr-2');
            if(element.hasOwnProperty('disabled') && element.disabled){
                input.classList.add('ever-disabled');
            }
            input.id = module;
            input.type = element.type;
            input.name = `${element.name}[]`;
            input.value = module;
            input.dataset.original = false;
            input.disabled = disabled;
            for (const moduleSelected of value) {
                if(moduleSelected == module){
                    input.checked = true;
                    input.dataset.original = true;
                    input.classList.remove('hidden');
                    label.classList.remove('hidden');
                }
            }
            label.appendChild(input);

            let span = document.createElement('span');
            span.innerHTML = module;
            label.appendChild(span);
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
        let div = document.createElement('div');
        div.classList.add('d-flex');
        li.appendChild(div);
            let btnFile = document.createElement('a');
            btnFile.href = `/storage/records/${this.data.id_record}/file`;
            btnFile.target = '_blank';
            btnFile.classList.add('d-block', 'mb-2', 'mr-2', 'btn', 'btn-two-transparent', 'btn-icon');
            div.appendChild(btnFile);
                let iconFile = document.createElement('i');
                iconFile.classList.add('far', 'fa-file');
                btnFile.appendChild(iconFile);

            let btnID = document.createElement('a');
            btnID.href = `/storage/candidates/${this.data.candidate.id_candidate}/file`;
            btnID.target = '_blank';
            btnID.classList.add('d-block', 'mb-2', 'btn', 'btn-two-transparent', 'btn-icon');
            div.appendChild(btnID);
                let iconID = document.createElement('i');
                iconID.classList.add('far', 'fa-id-card');
                btnID.appendChild(iconID);
    }

    createInputs(element, value, disabled, li){
        // if(element.name == 'password' || element.name == 'password_confirmation'){
        //     let parent = li;
        //     li = document.createElement('div');
        //     li.classList.add('position-relative');
        //     parent.appendChild(li);

        //     let label = document.createElement('label');
        //     label.htmlFor = element.name;
        //     label.classList.add('see-password');
        //     li.appendChild(label);
        //         let icon = document.createElement('i');
        //         icon.classList.add('fas','fa-eye');
        //         label.appendChild(icon);
            
        //     label.addEventListener('click', function(e){
        //         e.preventDefault();
        //         let input = this.nextElementSibling;
        //         switch(input.type){
        //             case 'password':
        //                 input.type = 'text';
        //                 this.classList.add( 'active' );
        //                 this.children[0].classList.remove('fa-eye');
        //                 this.children[0].classList.add('fa-eye-slash');
        //                 break;
        //             case 'text':
        //                 input.type = 'password';
        //                 this.classList.remove( 'active' );
        //                 this.children[0].classList.remove('fa-eye-slash');
        //                 this.children[0].classList.add('fa-eye');
        //                 break;
        //         }
        //     });
        // }else
        if(element.name == 'scheduled_date_time'){
            let date = value.split(' ')[0];
            if(/\//.exec(date)){
                let years = parseInt(date.split('/')[0]);
                let months = parseInt(date.split('/')[1]);
                let days = parseInt(date.split('/')[2]);
                if(months < 10){
                    months = `0${months}`;
                }
                if(days < 10){
                    days = `0${days}`;
                }
                date = `${years}-${months}-${days}`;
            }
            let time = value.split(' ')[1];
            value = `${date}\T${time}`;
        }
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
        input.placeholder = element.title;
        if(value){
            input.value = value;
            input.dataset.original = value;
        }else{
            input.value = '';
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

    createRules(element, value, disabled, li){
        let textarea = document.createElement('textarea');
        textarea.classList.add('d-block', 'form-input', 'list-datos', 'mb-2');
        if(element.name == 'id_candidate' || element.name == 'id_exam' || element.name == 'id_record'){
            textarea.classList.add('input-id');
        }
        if(element.hasOwnProperty('disabled') && element.disabled){
            textarea.classList.add('ever-disabled');
        }
        textarea.id = element.name;
        textarea.name = element.name;
        textarea.placeholder = element.title;
        if(value){
            textarea.innerHTML = value;
            textarea.dataset.original = value;
        }else{
            textarea.innerHTML = '';
            textarea.dataset.original = '';
        }
        textarea.disabled = disabled;
        li.appendChild(textarea);
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
            if (input.dataset.original == 'true') {
                input.checked = true;
            } else {
                input.checked = false;                
            }
        }else if(input.nodeName == 'TEXTAREA'){
            input.innerHTML = input.dataset.original;
            input.value = input.dataset.original;
        }else{
            if(input.id == 'candidates'){
                input.previousElementSibling.innerHTML = `(${input.dataset.original.split(',').length})`;
            }
            input.value = input.dataset.original;
        }
    }
}

function orderCandidates(data){
    for (const key in data) {
        const candidate = data[key];
        for (const value of document.querySelector('.modal.details #candidates').value.split(',')) {
            if(value == candidate.id_candidate){
                let element = data.splice(key, 1);
                data.unshift(element.pop());
            }
        }
    }
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
    let inputs = document.querySelectorAll('.modal.details .form-input');
    for(const input of inputs) {
        if(input.type != 'hidden' || !input.type){
            input.disabled = true;
        }
        if(input.parentNode.nodeName == 'LI'){
            let parent = input.parentNode;
            if(parent.dataset.hide){
                parent.classList.add('hide');
            }
            if(parent.dataset.required){
                parent.children[0].children[0].classList.add('hide')
            }
        }else{
            let parent = input.parentNode.parentNode;
            if(parent.dataset.hide){
                parent.classList.add('hide');
            }
            if(parent.dataset.required){
                parent.children[0].children[0].classList.add('hide')
            }
            if (input.dataset.original == 'false') {
                input.parentNode.classList.add('hidden');
            }
        }
    }
}

function enableInputs(){
    let inputs = document.querySelectorAll('.modal.details .form-input');
    for(const input of inputs) {
        if(!input.classList.contains('ever-disabled') || !input.type){
            input.disabled = false;
        }
        if(input.parentNode.nodeName == 'LI'){
            let parent = input.parentNode;
            if(parent.dataset.hide){
                parent.classList.remove('hide');
            }
            if(parent.dataset.required){
                parent.children[0].children[0].classList.remove('hide')
            }
        }else{
            let parent = input.parentNode.parentNode;
            if(parent.dataset.hide){
                parent.classList.remove('hide');
            }
            if(parent.dataset.required){
                parent.children[0].children[0].classList.remove('hide')
            }
            if (input.dataset.original == 'false') {
                input.parentNode.classList.remove('hidden');
            }
        }
    }
}

function createCSVBtn() {
    let div = document.querySelector('.modal-actions');
        let btn = document.createElement('button');
        btn.classList.add('csv-data', 'btn', 'btn-one', 'mr-2');
        btn.innerHTML = 'CSV';
        div.appendChild(btn);
        btn.addEventListener('click', function(e){
            e.preventDefault();
            $('#CSVModal').modal();
        });
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
    let id, input, validationjs;
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
            validationjs = new ValidationJS({
                id: 'action-form',
            }, validation.create.rules, validation.create.messages);
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
            validationjs = new ValidationJS({
                id: 'action-form',
            }, validation.edit.rules, validation.edit.messages);
            break;
    }
}

function hideTable(){
    document.querySelector('#exams table.table').classList.add('d-none');
    document.querySelector('#exams .filter-pagination').classList.add('d-none');
    if(document.querySelector('#exams table.subtable')){
        document.querySelector('#exams table.subtable').parentNode.removeChild(document.querySelector('#exams table.subtable'));
        document.querySelector('#exams .filter-pagination-candidates').parentNode.removeChild(document.querySelector('#exams .filter-pagination-candidates'));
    }
}

function showTable(){
    document.querySelector('#exams table.table').classList.remove('d-none');
    document.querySelector('#exams .filter-pagination').classList.remove('d-none');
    document.querySelector('#exams table.subtable').parentNode.removeChild(document.querySelector('#exams table.subtable'));
    document.querySelector('#exams .filter-pagination-candidates').parentNode.removeChild(document.querySelector('#exams .filter-pagination-candidates'));
}

function createCandidatesCheckboxes(){
    hideTable();

    let candidatesToList = [];
    for (const candidate of candidates) {
        if(candidate.evaluations.length <= 0){
            candidatesToList.push(candidate);
        }else if(document.querySelector('#id_exam')){
            for(const evaluation of candidate.evaluations){
                if(evaluation.id_exam == document.querySelector('#id_exam').value){
                    candidatesToList.push(candidate);
                }
            }
        }
    }

    let cols = [ { 
        id: 'td-checkbox',
        data: 'id_candidate'
    }, { 
        id: 'candidate_number',
        data: 'candidate_number'
    }, {
        id: 'full_name',
        data: 'full_name'
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
        event: {
            function: changeCandidateContent,
            params: {
                table: newTable,
            },
        },
    }, {}, [{
        type: 'search',
        target: 'candidate_number,full_name',
    }], candidatesToList);

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
            createCSVBtn();
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