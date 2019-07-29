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

$(document).ready(function(){
    (() => {
        const carousel = document.querySelector('.slider-main')
    
        if (!carousel) return false

        
    
        $(".slider-main").owlCarousel({
            loop:true,
            margin:0,
            /* animateOut: 'fadeOut',
            animateIn: 'fadeOut', */
            //smartSpeed: 100,
            items:1,
            nav:true,
            navText: [`<span class="icon icon--circle icon--fill icon--chevron"></span>`, `<span class="icon icon--circle icon--fill icon--chevron"></span>`],
            navElement: 'button',
            navClass: ['slider-button dual-slider__button--prev', 'slider-button dual-slider__button--next']
        })
    })();

    (() => {
        const carousel = document.querySelector('.cart-slider__list')

        if (!carousel) return false
       
        $(".cart-slider__list").owlCarousel({
            loop:true,
            items:4,
            nav:true,
            margin:20,
            navText: [`<span class="icon icon--circle icon--fill icon--chevron"></span>`, `<span class="icon icon--circle icon--fill icon--chevron"></span>`],
            navElement: 'button',
            navClass: ['slider-button cart-slider__button--prev', 'slider-button cart-slider__button--next'], 
            responsive: {
                0: {
                    items: 1,
                },
                570: {
                    items: 2,
                    autoWidth:true,
                },
                769: {
                    items: 3,
                },
                880: {
                    items: 4,
                },
                1140: {
                    items: 4,
                    margin:32,
                },
            }
        })
    })();

    (() => {
        const carousel = document.querySelector('.reviews__list')

        if (!carousel) return false
       
        $(".reviews__list").owlCarousel({
            loop:true,
            items:2,
            nav:true,
            margin:30,
            
            navText: [`<span class="icon icon--circle icon--fill icon--chevron"></span>`, `<span class="icon icon--circle icon--fill icon--chevron"></span>`],
            navElement: 'button',
            navClass: ['slider-button reviews__slider-btn reviews__slider-btn--prev', 'slider-button reviews__slider-btn reviews__slider-btn--next'], 
            responsive: {
                0: {
                    items: 1,
                },
                1024: {
                    items: 2,
                }
            }
        })
    })();

    (() => {
        const carousel = document.querySelector('.doctor-slider__list')

        if (!carousel) return false
        
        $(".doctor-slider__list").owlCarousel({
            loop:true,
            items:1,
            nav:true,
            margin:0,
            
            navText: [`<span class="icon icon--circle icon--fill icon--chevron"></span>`, `<span class="icon icon--circle icon--fill icon--chevron"></span>`],
            navElement: 'button',
            navClass: ['slider-button slider-button--prev doctor-slider__button--prev', 'slider-button slider-button--next doctor-slider__button--next'], 
        })
    })();

        
});


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

