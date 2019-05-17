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
        adaptiveHeight: false
    });

    new Flickity( document.querySelector('.slider-small'), {
        prevNextButtons: false,
        fade: true,
        contain: true,
        draggable: false,
        asNavFor: document.querySelector('.slider-main'),
        pageDots: false,
        adaptiveHeight: false
    });

    buttonPrev.addEventListener('click', () => {
        flkty.previous()
    });
    buttonNext.addEventListener('click', () => {
        flkty.next()
    })
};

initCarousel();

window.Vue = require('vue');

