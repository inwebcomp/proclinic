import './bootstrap'
import swal from 'sweetalert'
import Translator from './services/Translator'
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import ScrollIntoView from 'scroll-into-view'

Vue.use(VueAxios, axios)

// components
import FieldContact from './components/FieldContact'
import MobMenu from './components/MobMenu'
import ContactForm from './components/ContactForm'
import Popup from './components/Popup'
import TestimonialForm from './components/TestimonialForm'
import TextblockEditor from './components/TextblockEditor'

// mixins
import stopBodyScroll from './mixins/stopBodyScroll'

let Lang = new Translator({});

Vue.mixin({
    methods: {
        __: function (...args) {
            return Lang.get(...args);
        }
    }
});

new Vue({
    el: '#app',
    components: {
        FieldContact,
        MobMenu,
        ContactForm,
        Popup,
        TestimonialForm,
        TextblockEditor,
    },

    mixins: [
        stopBodyScroll,
    ],

    data: {
        mobMenuIsOpen: false,
        popupIsActive: false,
    },

    methods: {
        showPopup(name, params = {}) {
            if (this.$refs[name] == undefined)
                return console.error("[Vue/Popup]: Popup '" + name + "' not found")

            this.$refs[name].$emit('show', params)

            // window.addEventListener("scroll", function () {
            //     return false
            // })
            this.stopBodyScroll(this.popupIsActive, 'popup-wrapper')
        },

        burgherClick() {
            this.mobMenuIsOpen = !this.mobMenuIsOpen;
        },

        menuCloseHandler() {
            this.mobMenuIsOpen = false;
        },

        scrollTop() {
            document.getElementById('app').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
        },

        scrollToBlock(e) {
            let el = document.querySelector(e.target.hash)

            if (e.target.pathname == window.location.pathname && el) {
                window.history.pushState({}, e.target.innerText, e.target.href)

                ScrollIntoView(el, {
                    time: 350,
                })

                e.preventDefault()
            }
        },
    },

    watch: {
        mobMenuIsOpen(val) {
            this.stopBodyScroll(val, 'mob-menu')
        }
    },
});


const initCarousel = () => {
    const carousel = document.querySelector('.slider-main');
    const buttonPrev = document.querySelector('.slider-small__button--prev');
    const buttonWrap = document.querySelectorAll('.slider-main__img-wrap');


    if (!carousel) return false;

    const flkty = new Flickity(carousel, {
        prevNextButtons: false,
        pageDots: false,
        fade: true,
        wrapAround: true,
        adaptiveHeight: true,
    });

    new Flickity(document.querySelector('.slider-small'), {
        prevNextButtons: false,
        fade: true,
        contain: true,
        draggable: false,
        asNavFor: document.querySelector('.slider-main'),
        pageDots: false,
        adaptiveHeight: true,
    });

    document.querySelector('. slider-main__button--prev')[0].addEventListener('click', () => {
        flkty.previous();
    });
    document.querySelector('. slider-main__button--next')[0].addEventListener('click', () => {
        flkty.next()
    });

    buttonPrev.addEventListener('click', () => {
        flkty.previous()
    });
};

initCarousel();

const personalSlider = () => {
    const carousel = document.querySelector('.js-slider');
    const buttonPrev = document.querySelector('.slider-button--prev');
    const buttonNext = document.querySelector('.slider-button--next');

    if (!carousel) return false;

    const flkty = new Flickity(carousel, {
        prevNextButtons: false,
        pageDots: false,
        contain: true,
        cellAlign: 'left',
        wrapAround: true,
        adaptiveHeight: true
    });

    buttonPrev.addEventListener('click', () => {
        flkty.previous()
    });
    buttonNext.addEventListener('click', () => {
        flkty.next()
    })
};

personalSlider();

const reviewslSlider = () => {
    const carousel = document.querySelector('.reviews__list');
    const buttonsNav = document.querySelector('.reviews__peoples');
    const buttonPrev = document.querySelector('.reviews__slider-btn--prev');
    const buttonNext = document.querySelector('.reviews__slider-btn--next');

    if (!carousel) return false;

    const activeButtonsFn = () => {
        const activeButtons = [];
        const arrSelectedIndexs = [];

        [...buttonsNav.children].forEach(elem => {
            elem.classList.remove('active')
        });

        flkty.selectedCells.forEach((cell) => {
            const index = cell.element.getAttribute('data-index');
            arrSelectedIndexs.push(index);
        });

        arrSelectedIndexs.forEach((index) => {
            const button = buttonsNav.children[index];
            activeButtons.push(button);
        });

        activeButtons.forEach((navButton) => {
            navButton.classList.add('active')
        });
    }

    const flkty = new Flickity(carousel, {
        prevNextButtons: false,
        pageDots: false,
        contain: true,
        wrapAround: true,
        groupCells: '100%',
        adaptiveHeight: false,
    });

    // activeButtonsFn();

    // flkty.on( 'select', activeButtonsFn);

    // buttonsNav.addEventListener( 'click', ({ target }) => {
    //     if(target.classList.contains('reviews__man__img')) {
    //         const selector = target.parentElement.getAttribute('data-selector');
    //
    //         [...buttonsNav.children].forEach(elem => {
    //             elem.classList.remove('active')
    //         });
    //
    //         target.parentElement.classList.add('active');
    //
    //         flkty.selectCell(selector);
    //     }
    // });

    buttonPrev.addEventListener('click', () => {
        flkty.previous()
    });
    buttonNext.addEventListener('click', () => {
        flkty.next()
    })
};

reviewslSlider();

const headerCollapse = () => {
    const header = document.querySelector('.header');


    document.addEventListener('scroll', function (evt) {
        let scrolled = window.pageYOffset || document.documentElement.scrollTop;

        if (scrolled > 10) {
            header.classList.add('header--compact');
        } else {
            header.classList.remove('header--compact');
        }
    })
};

const langToggler = () => {
    const buttons = document.querySelectorAll('.lang-toggler__button');

    buttons.forEach((item) => {
        item.addEventListener('click', (e) => {
            buttons.forEach((item) => {
                item.classList.remove('active')
            })
            e.target.classList.toggle('active')
        })
    })
}

// langToggler()

function initMap() {
    const coordinates = {lat: 46.991957, lng: 28.8512339}

    const map = new google.maps.Map(document.getElementById('map'), {
        center: coordinates,
        zoom: 16,
    });

    const marker = new google.maps.Marker({
        position: coordinates,
        map: map,
        animation: google.maps.Animation.DROP,
        icon: './img/icons/png/map-icon.png'
    });
}


var myMap;

ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [46.991896, 28.855500],
            zoom: 17
        }, {
            searchControlProvider: 'yandex#search'
        }),

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'ProClinic',
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: '/img/icons/png/map-icon.png',
            // Размеры метки.
            iconImageSize: [83, 100],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-40, -100]
        });

    myMap.geoObjects
        .add(myPlacemark);
});

