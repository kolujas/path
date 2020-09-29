import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";

document.addEventListener('DOMContentLoaded', function(e){
    if(document.querySelector('.tab-content')){
        let tab = new TabMenuJS({
            id: 'tab-users',
        }, {
            open: ['users'],
            active: 'users',
        });
    }
});