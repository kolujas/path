import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { NavMenu } from "../../submodules/NavMenuJS/js/NavMenu.js";
import { URLServiceProvider } from "../providers/URLServiceProvider.js";

document.addEventListener('DOMContentLoaded', function(e){
    let choosen = document.querySelector('.tab-content').id;
    for (const content of document.querySelectorAll('.tab-content')) {
        if(content.id == URLServiceProvider.findHashParameter()){
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
    
    let navmenu = new NavMenu({
        id: 'nav-exam',
        sidebar: {
            id: ['menu'],
            position: ['left'],
        }, dropdown:{
            //
        },
    }, {
        fixed: false,
        current: false,
    });

    let submitBtns = document.querySelectorAll('.submit-exam');
    for (const btn of submitBtns) {
        btn.addEventListener('click', function(e){
            e.preventDefault();
            document.querySelector('form').submit();
        });
    }
});