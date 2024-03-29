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
    data: 'profile'
}, { 
    id: 'candidate_number',
    data: 'candidate_number'
}, {
    id: 'full_name',
    data: 'full_name'
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
                        if(document.querySelector('.modal.details #id_candidate') && tr.dataset.id_candidate == document.querySelector('.modal.details #id_candidate').value){
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

function getCandidate(){
    const id = URLServiceProvider.findGetParameter('id');
    for (const candidate of candidates) {
        if(candidate.id_candidate == id){
            return candidate;
        }
    }
}

document.addEventListener('DOMContentLoaded', function(e){
    if(URLServiceProvider.findHashParameter() == 'details'){
        if(!URLServiceProvider.findGetParameter('id')){
            let modal = createModal([
                {title: 'Candidate Number', name: 'candidate_number', type: 'number', required: true},
                {title: 'Full Name', name: 'full_name', type: 'text'},
                {title: 'Date of Birth', name: 'date_of_birth', type: 'date'},
                {title: 'Member', name: 'member', type: 'text'},
                {title: 'Member ID', name: 'id_member', type: 'number'},
                {title: 'Modules', name: 'modules', type: 'checkbox', required: true},
            ]);
            setActions({
                type: 'create'
            }, modal);
        }else{
            let modal = createModal([
                {title: '', name: 'id_candidate', type: 'hidden', disabled: true},
                {title: 'Candidate Number', name: 'candidate_number', type: 'number', required: true},
                {title: 'Full Name', name: 'full_name', type: 'text'},
                {title: 'Date of Birth', name: 'date_of_birth', type: 'date'},
                {title: 'Member', name: 'member', type: 'text'},
                {title: 'Member ID', name: 'id_member', type: 'number'},
                {title: 'Modules', name: 'modules', type: 'checkbox', required: true},
                {title: 'Date Added', name: 'created_at', type: 'date', disabled: true},
            ], getCandidate());
            setActions({
                type: 'info',
                url: 'candidates'
            }, modal);
        }
    }

    if(document.querySelector('.tab-content')){
        let tab = new TabMenuJS({
            id: 'tab-candidates',
        }, {
            open: ['candidates'],
            active: '/panel/candidates',
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
    }, document.querySelector('#candidates table'));
    
    let filter = new FilterJS({
        id: 'candidates',
        order: {
            by: 'id_candidate',
            btn: true,
        },
        event: {
            function: changeContent,
            params: {
                table: table,
            },
        },
    }, {}, [{
        type: 'search',
        target: 'candidate_number,full_name',
    }], candidates);

    changeContent({
        table: table,
        data: filter.execute(),
    });

    document.querySelector('.add-data').addEventListener('click', function(e){
        e.preventDefault();
        let modal = createModal([
            {title: 'Candidate Number', name: 'candidate_number', type: 'number', required: true},
            {title: 'Full Name', name: 'full_name', type: 'text'},
            {title: 'Date of Birth', name: 'date_of_birth', type: 'date'},
            {title: 'Member', name: 'member', type: 'text'},
            {title: 'Member ID', name: 'id_member', type: 'number'},
            {title: 'Modules', name: 'modules', type: 'checkbox', required: true},
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