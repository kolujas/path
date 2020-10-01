import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { ScrollDetection as ScrollDetectionJS } from "../../submodules/ScrollDetectionJS/js/ScrollDetection.js";

function putShadow(params){
    document.querySelector('header.content-header').classList.add('header-shadow');
}
function deleteShadow(params){
    document.querySelector('header.content-header').classList.remove('header-shadow');
}

document.addEventListener('DOMContentLoaded', function(e){
    if(document.querySelector('.tab-content')){
        let tab = new TabMenuJS({
            id: 'tab-candidates',
        }, {
            open: ['candidates'],
            active: 'candidates',
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
});