import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { URL } from "../URL.js";

document.addEventListener('DOMContentLoaded', function(e){
    let choosen = document.querySelector('.tab-content').id;
    for (const content of document.querySelectorAll('.tab-content')) {
        if(content.id == URL.findHashParameter()){
            choosen = content.id;
        }
    }
    if(document.querySelector('.tab-content')){
        let tab = new TabMenuJS({
            id: 'tab-exam',
        }, {
            open: [choosen],
        });
    }
});