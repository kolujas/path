// * External repositories
import { Dropdown } from '/submodules/DropdownJS/js/Dropdown.js';
import { Filter } from '/submodules/FilterJS/js/Filter.js';
import { NavMenu } from '/submodules/NavMenuJS/js/NavMenu.js';
import { Notification } from '/submodules/NotificationJS/js/Notification.js';
import { Sidebar } from '/submodules/SidebarJS/js/Sidebar.js';
import { TabMenu } from '/submodules/TabMenuJS/js/TabMenu.js';
import { URL } from '/js/URL.js';

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
        let booleanOpen = false;
        for(const child of html.children){
            if(child.classList.contains('dropdown-menu-list')){
                for(const li of child.children){
                    if(li.tagName == 'LI'){
                        if(window.location.href.split('#').pop() == li.children[0].href.split('#').pop() && li.classList.contains('tab')){
                            booleanOpen = true;
                        }else if(li.children.length > 1 && li.classList.contains('tab')){
                            for(const subli of li.children[1].children){
                                if(window.location.href.split('#').pop() == subli.children[0].href.split('#').pop()){
                                    booleanOpen = true;
                                }
                            }
                        }
                    }
                }
            }
        }
        let click = false;
        if(html.id == 'dropdown-dashboard'){
            click = true;
        }
        dropdowns.push(new Dropdown({
            id: html.id,
        }, {
            open: booleanOpen,
            click: click,
        }));
    }

    if(document.querySelector('#tab')){
        let sidebar_tab = new Sidebar({
            id: 'tab',
            position: 'left',
        }, {
            open: false,
        });
    }

    if(document.querySelector('#filters')){
        let sidebar_filters = new Sidebar({
            id: 'filters',
            position: 'right',
        }, {
            open: false,
        });
    }

    let tabmenu = new TabMenu({
        id: 'tab',
    }, {
        open: [document.querySelector('.tab-content').id],
    });
    let notifications = []
    if(suscriptions){
        for(const suscription of suscriptions){
            notifications.push(new Notification({
                id: suscription.id,
                code: 300,
                message: suscription.message,
                url: suscription.url,
                method: suscription.method,
            }, {show: true}, {
                element: document.querySelector('.main > div'),
                insertBefore: document.querySelector('.main > div').children[0]
            }));
        }
    }

    if(status){
        notifications.push(new Notification({
            id: 'notification-1',
            code: status.code,
            message: status.message,
        }, {show: true}, {
            element: document.querySelector('.main > div'),
            insertBefore: document.querySelector('.main > div').children[0]
        }));
    }
});