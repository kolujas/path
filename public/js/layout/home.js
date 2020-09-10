import { NavMenu } from '/submodules/NavMenuJS/js/NavMenu.js';
import { Dropdown } from '/submodules/DropdownJS/js/Dropdown.js';

document.addEventListener('DOMContentLoaded', (e) => {
    let navmenu = new NavMenu({
        id: 'nav-1',
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

    let dropdowns = [];
    let dropdowns_html = document.querySelectorAll('.dropdown');
    for(const html of dropdowns_html){
        dropdowns.push(new Dropdown({
            id: html.id,
        }, {
            open: false,
        }));
    }
});