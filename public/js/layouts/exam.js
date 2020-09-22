import { Dropdown as DropdownJS } from "../../submodules/DropdownJS/js/Dropdown.js";
import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { URL } from "../URL.js";

document.addEventListener('DOMContentLoaded', function(e){
    let dropdowns_html = document.querySelectorAll('.dropdown');
    let dropdowns = [];
    for (const html of dropdowns_html) {
        dropdowns.push(new DropdownJS({
            id: html.id,
        }, {
            open: false,
        }));
    }

    if(document.querySelector('.tab-content')){
        let tab = new TabMenuJS({
            id: 'tab-exam',
        }, {
            open: [document.querySelector('.tab-content').id],
            active: URL.findHashParameter(),
        });
    }
});