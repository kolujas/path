import { Notification } from '/submodules/NotificationJS/js/Notification.js';

$('.prueba-slider').not('.slick-initialized').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    speed: 800,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    focusOnSelect: true,
    mobileFirst: true,
    responsive: [{
        breakpoint: 1023,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3
        },
    }, {
        breakpoint: 767,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        },
    }, ]
});

$('.eventos-slider').not('.slick-initialized').slick({
    autoplay: false,
    speed: 800,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    focusOnSelect: true,
    mobileFirst: true,
    infinite: false,
    responsive: [{
        breakpoint: 1023,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3
        },
    }, {
        breakpoint: 767,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        },
    }, ]
});

// FAQ

const closed = document.querySelector('.closed');
const preguntaRespuesta = document.querySelector('.pregunta-respuesta');
const preguntas = document.querySelectorAll('.pregunta');


function switchState(pregunta) {
    if (pregunta.classList.contains('opened')) {
        pregunta.classList.add('closed');
        pregunta.classList.remove('opened');
    } else {
        if (pregunta.classList.contains('closed')) {
            pregunta.classList.remove('closed');
        }
        pregunta.classList.add('opened');
    }
}

function iconoState(icono) {
    if (icono.classList.contains('fa-plus')) {
        icono.classList.add('fa-minus');
        icono.classList.remove('fa-plus');
    } else {
        if (icono.classList.contains('fa-minus')) {
            icono.classList.remove('fa-minus');
        }
        icono.classList.add('fa-plus');
    }
}

for (const pregunta of preguntas) {
    for (const hijo of pregunta.children) {
        if (hijo.classList.contains('pregunta-titulo')) {
            hijo.addEventListener('click', function(e) {
                e.preventDefault();
                switchState(pregunta);
                for (const hijito of this.children) {
                    if (hijito.classList.contains('pregunta-icono')) {
                        iconoState(hijito);
                    }
                }
            });
        }
    }
}




document.addEventListener('DOMContentLoaded', function(e) {
    if (status) {
        let notification = new Notification({
            id: 'notification-1',
            code: status.code,
            message: status.message,
        }, { show: true }, {
            element: document.querySelector('.main > div > section'),
            insertBefore: document.querySelector('.main > div > section').children[1]
        });
    }
});