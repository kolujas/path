import { Filter as FilterJS } from "../../submodules/FilterJS/js/Filter.js";
import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { ScrollDetection as ScrollDetectionJS } from "../../submodules/ScrollDetectionJS/js/ScrollDetection.js";

import { createModal, setActions } from "../modal.js";
import { Table } from "../Table/Table.js";

let cols = [ { 
    data: 'exam'
}, { 
    data: 'name'
}, { 
    data: 'candidates'
}, {
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
                        if(tr.dataset.id_exam == document.querySelector('.modal.details #id_exam').value){
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

document.addEventListener('DOMContentLoaded', function(e){
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
        },
    }, {}, [{
        type: 'search',
        target: 'name,scheduled_date_time',
        event: {
            function: changeContent,
            params: {
                table: table,
            },
        },
    }], exams);

    changeContent({
        table: table,
        data: filter.execute(),
    });

    document.querySelector('.add-data').addEventListener('click', function(e){
        e.preventDefault();
        let modal = createModal([
            {title: 'Name', name: 'name', type: 'text'},
            {title: 'Candidates', name: 'candidates', type: 'checkbox', disabled: true},
            {title: 'Scheduled Date of Time', name: 'scheduled_date_time', type: 'date'},
        ]);
        setActions({
            type: 'add'
        }, modal);
        if(!document.querySelector('.modal.details').classList.contains('d-none')){
            for (const tr of document.querySelectorAll('tr')) {
                if(tr.classList.contains('active')){
                    tr.classList.remove('active');
                }
            }
        }
    });
});