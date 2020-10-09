import { Filter as FilterJS } from "../../submodules/FilterJS/js/Filter.js";
import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { ScrollDetection as ScrollDetectionJS } from "../../submodules/ScrollDetectionJS/js/ScrollDetection.js";

import { createModal, setActions } from "../modal.js";
import { Table } from "../Table/Table.js";

let cols = [ { 
    data: 'profile'
}, { 
    data: 'full_name'
}, {
    data: 'email'
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
                        if(tr.dataset.id_candidate == document.querySelector('.modal.details #id_candidate').value){
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
        },
    }, {}, [{
        type: 'search',
        target: 'full_name,email',
        event: {
            function: changeContent,
            params: {
                table: table,
            },
        },
    }], candidates);

    changeContent({
        table: table,
        data: filter.execute(),
    });

    document.querySelector('.add-data').addEventListener('click', function(e){
        e.preventDefault();
        let modal = createModal([
            {title: 'Candidate Number', name: 'candidate_number', type: 'number'},
            {title: 'Full Name', name: 'full_name', type: 'text'},
            {title: 'Email', name: 'email', type: 'text'},
            {title: 'Date of Birth', name: 'date_of_birth', type: 'date'},
            {title: 'Member', name: 'member', type: 'text'},
            {title: 'Member ID', name: 'id_member', type: 'number'},
            {title: 'Modules', name: 'modules', type: 'checkbox'},
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

    // document.querySelector('').addEventListener('click', function(e){
    //     e.preventDefault();
    //     filter.changeOrder({
    //         by: this.dataset.by,
    //         type: this.dataset.type,
    //     });
    //     if(this.dataset.type == 'DESC'){
    //         this.dataset.type = 'ASC';
    //     }else{
    //         this.dataset.type = 'DESC';
    //     }
    //     changeContent({
    //         table: table,
    //         data: filter.execute(),
    //     });
    // });
});