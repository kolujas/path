import { Filter as FilterJS } from "../../submodules/FilterJS/js/Filter.js";
import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { ScrollDetection as ScrollDetectionJS } from "../../submodules/ScrollDetectionJS/js/ScrollDetection.js";
import { URLServiceProvider } from "../../submodules/ProvidersJS/URLServiceProvider.js";
import { InputFileMaker as InputFileMakerJS } from "../../submodules/InputFileMakerJS/js/InputFileMaker.js";
import { Validation as ValidationJS } from '../../submodules/ValidationJS/js/Validation.js';

import { createModal, setActions } from "../modal.js";
import { Table } from "../Table/Table.js";

let cols = [ { 
    id: 'table-icon',
    data: 'exam'
}, { 
    id: 'name',
    data: 'name'
}, { 
    id: 'candidates',
    data: 'candidates'
}, {
    id: 'scheduled_date_time',
    data: 'scheduled_date_time'
} ];

function putShadow(params){
    document.querySelector('header.content-header').classList.add('header-shadow');
}

function deleteShadow(params){
    document.querySelector('header.content-header').classList.remove('header-shadow');
}

function changeContent(params = {
    table: undefined,
    data: [],
}){
    if(params.data && params.data.length){
        $('.filter-pagination').pagination({
            dataSource: params.data,
            pageSize: 10,
            autoHidePrevious: true,
            autoHideNext: true,
            prevText: '',
            nextText: '',
            callback: function(data, pagination) {
                params.table.changeData(data);
                if(!document.querySelector('.modal.details').classList.contains('d-none')){
                    for (const tr of document.querySelectorAll('tr')) {
                        if(tr.classList.contains('active')){
                            tr.classList.remove('active');
                        }
                    }
                    for (const tr of document.querySelectorAll('tr')) {
                        if(document.querySelector('.modal.details #id_exam') && tr.dataset.id_exam == document.querySelector('.modal.details #id_exam').value){
                            tr.classList.add('active');
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

function getExam(){
    const id = URLServiceProvider.findGetParameter('id');
    for (const exam of exams) {
        if(exam.id_exam == id){
            return exam;
        }
    }
}

document.addEventListener('DOMContentLoaded', function(e){
    if(URLServiceProvider.findHashParameter() == 'details'){
        if(!URLServiceProvider.findGetParameter('id')){
            let modal = createModal([
                {title: 'Name', name: 'name', type: 'text', required: true},
                {title: 'Rules', name: 'rules', type: 'textarea'},
                {title: 'Candidates', name: 'candidates', type: 'hidden', disabled: true, required: true},
                {title: 'Password', name: 'password', type: 'text', required: true},
                {title: 'Scheduled Date and Time', name: 'scheduled_date_time', type: 'datetime-local', required: true},
            ]);
            setActions({
                type: 'create'
            }, modal);
        }else{
            let modal = createModal([
                {title: '', name: 'id_exam', type: 'hidden', disabled: true},
                {title: 'Name', name: 'name', type: 'text', required: true},
                {title: 'Rules', name: 'rules', type: 'textarea'},
                {title: 'Candidates', name: 'candidates', type: 'hidden', disabled: true, hide: true},
                {title: 'Password', name: 'password', type: 'text', required: true},
                {title: 'Scheduled Date and Time', name: 'scheduled_date_time', type: 'datetime-local', required: true},
            ], getExam());
            setActions({
                type: 'info',
                url: 'exams'
            }, modal);
        }
    }
    
    if(document.querySelector('.tab-content')){
        let tab = new TabMenuJS({
            id: 'tab-exams',
        }, {
            open: ['exams'],
            active: '/panel/exams',
        });
    }

    let scrolldetection = new ScrollDetectionJS({
        location: {
            min: 0,
            max: 1,
        }, direction: 'Y'
    }, {
        success: {
            functionName: deleteShadow,
            params: {},
        }, error: {
            functionName: putShadow,
            params: {},
    }, }, document.querySelector('.tab-menu.vertical .tab-content-list'));

    let table = new Table({
        cols: cols,
        data: [],
    }, document.querySelector('#exams table'));
    
    let filter = new FilterJS({
        id: 'exams',
        order: {
            by: 'scheduled_date_time',
            btn: true,
        }, event: {
            function: changeContent,
            params: {
                table: table,
            },
        },
    }, {}, [{
        type: 'search',
        target: 'name,scheduled_date_time',
    }], exams);

    changeContent({
        table: table,
        data: filter.execute(),
    });

    document.querySelector('.add-data').addEventListener('click', function(e){
        e.preventDefault();
        let modal = createModal([
            {title: 'Name', name: 'name', type: 'text', required: true},
            {title: 'Rules', name: 'rules', type: 'textarea'},
            {title: 'Candidates', name: 'candidates', type: 'hidden', disabled: true, required: true},
            {title: 'Password', name: 'password', type: 'text', required: true},
            {title: 'Scheduled Date and Time', name: 'scheduled_date_time', type: 'datetime-local', required: true},
        ]);
        setActions({
            type: 'create'
        }, modal);
        if(!document.querySelector('.modal.details').classList.contains('d-none')){
            for (const tr of document.querySelectorAll('tr')) {
                if(tr.classList.contains('active')){
                    tr.classList.remove('active');
                }
            }
        }
    });

    let input = new InputFileMakerJS({
        id: 'csv',
    });

    let csvValidation = new ValidationJS({
        id: 'csv-form',
    }, validation.csv.rules, validation.csv.messages);
});