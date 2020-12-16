import { Filter as FilterJS } from "../../submodules/FilterJS/js/Filter.js";
import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { ScrollDetection as ScrollDetectionJS } from "../../submodules/ScrollDetectionJS/js/ScrollDetection.js";
import { FetchServiceProvider } from "../providers/FetchServiceProvider.js";

import { Table } from "../Table/Table.js";

let records = [];

let cols = [ { 
    id: 'table-icon',
    data: 'exam'
}, { 
    id: 'candidate_number',
    data: 'candidate:candidate_number'
}, { 
    id: 'full_name',
    data: 'candidate:full_name'
}, { 
    id: 'name',
    data: 'exam:name'
}, {
    id: 'scheduled_date_time',
    data: 'exam:scheduled_date_time'
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
                        if(document.querySelector('.modal.details #id_record') && tr.dataset.id_record == document.querySelector('.modal.details #id_record').value){
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

document.addEventListener('DOMContentLoaded', async function(e){
    let token = document.querySelector('[name=csrf-token]').content;
    let fetchserviceprovider = await FetchServiceProvider.getData('/api/records', {
        'Accept': 'application/json',
        'Content-type': 'application/json; charset=UTF-8',
        'X-CSRF-TOKEN': token,
    });
    records = fetchserviceprovider.getResponse('data').records;
    records = [];
    if(document.querySelector('.tab-content')){
        let tab = new TabMenuJS({
            id: 'tab-records',
        }, {
            open: ['records'],
            active: '/panel/records',
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
    }, document.querySelector('#records table'));
    let filter = new FilterJS({
        id: 'records',
        order: {
            by: 'updated_at',
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
        target: 'candidate:candidate_number,candidate:full_name,exam:scheduled_date_time',
    }], records);

    changeContent({
        table: table,
        data: filter.execute(),
    });
});