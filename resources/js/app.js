/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// есть flickity для VUE
//import Flickity from 'flickity';


const initCarousel = () => {
    const carousel = document.querySelector('.slider-main');
    const buttonPrev = document.querySelector('.dual-slider__button--prev');
    const buttonNext = document.querySelector('.dual-slider__button--next');

    if(!carousel) return false;

    const flkty =  new Flickity( carousel, {
        prevNextButtons: false,
        pageDots: false,
        fade: true,
        wrapAround: true,
        adaptiveHeight: true
    });

    new Flickity( document.querySelector('.slider-small'), {
        prevNextButtons: false,
        fade: true,
        contain: true,
        draggable: false,
        asNavFor: document.querySelector('.slider-main'),
        pageDots: false,
        adaptiveHeight: true
    });

    buttonPrev.addEventListener('click', () => {
        flkty.previous()
    });
    buttonNext.addEventListener('click', () => {
        flkty.next()
    })
};

initCarousel();

const personalSlider = () => {
    const carousel = document.querySelector('.js-slider');
    const buttonPrev = document.querySelector('.cart-slider__button--prev');
    const buttonNext = document.querySelector('.cart-slider__button--next');

    if(!carousel) return false;

    const flkty =  new Flickity( carousel, {
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
    const buttonsNavGroup = document.querySelectorAll('.reviews__peoples-box');
    const buttonPrev = document.querySelector('.cart-slider__button--prev');
    const buttonNext = document.querySelector('.cart-slider__button--next');

    if(!carousel) return false;

    const flkty =  new Flickity( carousel, {
        prevNextButtons: false,
        pageDots: false,
        contain: true,
        cellAlign: 'left',
        wrapAround: true,
        groupCells: 2,
        adaptiveHeight: true
    });

    flkty.on( 'select', function() {
        const selectedButton = buttonsNav.children[ flkty.selectedIndex ];

        [...buttonsNavGroup].forEach(elem => {
            elem.classList.remove('active')
        });

        selectedButton.classList.add('active');
      });

    buttonsNav.addEventListener( 'click', ({ target }) => {
        if(target.classList.contains('reviews__man__img')) {
            const selector = target.parentElement.getAttribute('data-selector');

            [...buttonsNavGroup].forEach(elem => {
                elem.classList.remove('active')
            });

            target.parentElement.parentElement.classList.add('active');

            flkty.selectCell(selector);
        }
    });



    // buttonPrev.addEventListener('click', () => {
    //     flkty.previous()
    // });
    // buttonNext.addEventListener('click', () => {
    //     flkty.next()
    // })
};

reviewslSlider();

window.Vue = require('vue');
