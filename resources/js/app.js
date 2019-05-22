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
    const buttonPrev = document.querySelector('.reviews__slider-btn--prev');
    const buttonNext = document.querySelector('.reviews__slider-btn--next');

    if(!carousel) return false;

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

    const flkty =  new Flickity( carousel, {
        prevNextButtons: false,
        pageDots: false,
        contain: true,
        cellAlign: 'left',
        wrapAround: true,
        groupCells: '100%',
        adaptiveHeight: true,
    });

    activeButtonsFn();

    flkty.on( 'select', activeButtonsFn);

    buttonsNav.addEventListener( 'click', ({ target }) => {
        if(target.classList.contains('reviews__man__img')) {
            const selector = target.parentElement.getAttribute('data-selector');

            [...buttonsNav.children].forEach(elem => {
                elem.classList.remove('active')
            });

            target.parentElement.classList.add('active');

            flkty.selectCell(selector);
        }
    });

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

//headerCollapse()

window.Vue = require('vue');
