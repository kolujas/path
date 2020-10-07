import {Td} from './Td.js';
import { createModal, setActions } from "../modal.js";

/**
 * * Tr controls the creation of the <tr>.
 * @export
 * @class Tr
 */
export class Tr{
    /**
     * * Creates an instance of Tr.
     * @param {object} properties - The Tr properties.
     * @param {object} ClassList - The <tr>, <td> and <th> Class List.
     * @memberof Tr
     */
    constructor(properties = {type: 'tbody', cols: [], data: []}){
        this.setType(properties);
        this.setCells(properties);
        this.createTr(properties);
    }

    /**
     * * Set the Tr type.
     * @param {object} properties - The Tr properties.
     * @memberof Tr
     */
    setType(properties = {type: 'tbody'}){
        this.type = properties.type;
    }

    /**
     * * Set the Tr cells.
     * @param {object} properties - The Tr properties.
     * @param {object} ClassList - The <td> and <th> Class List.
     * @memberof Tr
     */
    setCells(properties = {cols: [], data: []}){
        switch(this.type){
            case 'thead':
                    this.ths = [];
                    for(const col of properties.cols){
                        this.ths.push(new Td('thead', col));
                    }
                break;
            case 'tbody':
                    this.tds = [];
                    for(const col of properties.cols){
                        if(!col.actions){
                            this.tds.push(new Td('tbody', col, Td.searchData(col, properties.data)));
                        }else{
                            this.tds.push(new Td('actions', col, Td.searchData(col, properties.data)));
                        }
                    }
                break;
        }
    }

    /**
     * * Create the <tr>.
     * @memberof Tr
     */
    createTr(properties = {type: 'tbody', cols: [], data: []}){
        this.html = document.createElement('tr');
        if(properties.data.hasOwnProperty('id_candidate')){
            this.html.dataset.id_candidate = properties.data.id_candidate;
            this.html.addEventListener('click', function(e){
                e.preventDefault();
                let modal = createModal([
                    {title: '', name: 'id_candidate', type: 'hidden', disabled: true},
                    {title: 'Candidate Number', name: 'candidate_number', type: 'number'},
                    {title: 'Full Name', name: 'full_name', type: 'text'},
                    {title: 'Email', name: 'email', type: 'text'},
                    {title: 'Date of Birth', name: 'date_of_birth', type: 'date'},
                    {title: 'Member', name: 'member', type: 'text'},
                    {title: 'Member ID', name: 'id_member', type: 'number'},
                    {title: 'Date Added', name: 'created_at', type: 'date', disabled: true},
                ], properties.data);
                setActions({
                    type: 'info'
                }, modal);
                Tr.clickTr(this.dataset.id_candidate);
            });
        } else if (properties.data.hasOwnProperty('id_exam')){
            this.html.dataset.id_exam = properties.data.id_exam;
            this.html.addEventListener('click', function(e){
                e.preventDefault();
                let modal = createModal([
                    {title: '', name: 'id_exam', type: 'hidden', disabled: true},
                    {title: 'Name', name: 'name', type: 'text'},
                    {title: 'Candidates', name: 'candidates', type: 'checkbox', disabled: true},
                    {title: 'Scheduled Date of Time', name: 'scheduled_date_time', type: 'date'},
                ], properties.data);
                setActions({
                    type: 'info'
                }, modal);
                Tr.clickTr(this.dataset.id_exam);
            });
        } else if (properties.data.hasOwnProperty('id_record')){
            this.html.dataset.id_record = properties.data.id_record;
            this.html.addEventListener('click', function(e){
                e.preventDefault();
                let modal = createModal([
                    {title: '', name: 'id_record', type: 'hidden', disabled: true},
                    {title: 'Name', name: 'exam:name', type: 'text'},
                    {title: 'File', name: 'file', disabled: true},
                ], properties.data);
                setActions({
                    type: 'info'
                }, modal);
                Tr.clickTr(this.dataset.id_record);
            });
        }
        switch(this.type){
            case 'thead':
                    for(const th of this.ths){
                        this.html.appendChild(th.html);
                    }
                break;
            case 'tbody':
                    for(const td of this.tds){
                        this.html.appendChild(td.html);
                    }
                break;
        }
    }

    static clickTr(id){
        for (const tr of document.querySelectorAll('tr')) {
            if(tr.classList.contains('active')){
                tr.classList.remove('active');
            }
        }
        for (const tr of document.querySelectorAll('tr')) {
            if(tr.dataset.id_candidate == id || tr.dataset.id_exam == id || tr.dataset.id_record == id){
                tr.classList.add('active');
            }
        }
    }

    /**
     * * Show an empty tr.
     * @static
     * @param {*} cols
     * @returns
     * @memberof Tr
     */
    static emptyRow(cols){
        let emptyTr = document.createElement('tr');
        let emptyTd = document.createElement('td');
        emptyTr.appendChild(emptyTd);
        emptyTd.classList.add('text-center', 'p-4');
        emptyTd.colSpan = cols.length;
        emptyTd.innerHTML = 'No results found.';
        return emptyTr;
    }
}