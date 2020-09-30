import { TabMenu as TabMenuJS } from "../../submodules/TabMenuJS/js/TabMenu.js";
import { NavMenu } from "../../submodules/NavMenuJS/js/NavMenu.js";
import { URLServiceProvider } from "../providers/URLServiceProvider.js";

function crossWord(){
    let answers = document.querySelectorAll('.answers:not(first-of-type)');
    let selects = document.querySelectorAll('select');
    for (const answer of answers) {
        answer.classList.remove('crossed');
        for (const select of selects) {
            if(select.options[select.selectedIndex].innerHTML == answer.innerHTML && !answer.classList.contains('crossed')){
                answer.classList.add('crossed');
            }
        }
    }
}

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

    let selects = document.querySelectorAll('select');
    for (const select of selects) {
        select.addEventListener('change', function(e){
            crossWord(this.options[this.selectedIndex].innerHTML);
        });
    }

    let inputLetters = document.querySelectorAll('[data-letters]');
    for (const input of inputLetters) {
        let letters = parseInt(input.dataset.letters);
        let span = input.parentNode;
            let div = document.createElement('div');
            div.classList.add('underlines');
            span.appendChild(div);

        for (let index = 0; index < letters; index++) {
            let underline = document.createElement('div');
            underline.classList.add('underline');
            div.appendChild(underline);
            underline.style.width = `calc((100% - .25rem) / ${letters})`;
        }
    }
});


// Audios

const audio = document.querySelectorAll('.audio');
const audioBtn = document.querySelectorAll('.audioBtn');
console.log(audioBtn);



for (const key in audioBtn) {
        const btn = audioBtn[key];
        console.log(btn);
        btn.addEventListener('click', function(e){
            if(!this.dataset.count){
                this.dataset.count = 0;
            }
        
        e.preventDefault();
        this.dataset.count = parseInt(this.dataset.count)+1;
        if(parseInt(this.dataset.count) < 2){
            ponePlay(key);
        }else{            
                audio[key].src = "";
        }
        })     
    
}

// audio.addEventListener('timeupdate', function(e){
//     e.preventDefault();
//     console.log("Current time", this.currentTime);
// });


function ponePlay(key){
    audio[key].play();
}

// Desactivar F5 (actualizar pagina)

$(document).on("keydown", disableF5);

function disableF5(e) { 
    if ((e.which || e.keyCode) == 116) e.preventDefault(); 
};

// Mensaje si quiere salir de la pagina

$(document).mouseleave(function () {
    // alert("Strike one");
});




