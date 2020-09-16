import { Dropdown } from "../../submodules/DropdownJS/js/Dropdown.js";
document.addEventListener('DOMContentLoaded', function(e){
    let dropdowns_html = document.querySelectorAll('.dropdown');
    let dropdowns = [];
    for (const html of dropdowns_html) {
        dropdowns.push(new Dropdown({
            id: html.id,
        }, {
            open: false,
        }));
    }
});