<div class="block block--dual-slider">
    <div class="container">

        <div class="dual-slider">

            <div class="dual-slider__box">

                <h3 class="block__title">@lang('Наши услуги')</h3>
                <p class="dual-slider__descr">@lang('Возможное подзаглавие, например работаем с 2001 года')</p>



                <div class="slider-small">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="slider-small__slide">
                            <img src="{{ asset('img/small-slide.jpg') }}" height="232" alt="Картинка" class="slider-small__img" data-flickity-lazyload="{{ asset('img/small-slide.jpg') }}">
                        </div>
                    @endfor
                </div>
            </div>

            <div class="dual-slider__box">
                <div class="slider-main">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="slider-main__slide">
                            <img src="{{ asset('img/slide-1.jpg') }}" width="770" height="380" alt="Картинка" class="slider-main__img" >
                            <div class="slider-main__content">
                                <p class="slider-main__title">@lang('Текст генерируется абзацами случайным образом ')</p>
                                <p class="slider-main__text">@lang('Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык')</p>
                                <button class="button">@lang('Читать далее')</button>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>

        <button class="dual-slider__button dual-slider__button--prev">
            <span class="icon icon--circle icon--fill icon--chevron"></span>
        </button>
        <button class="dual-slider__button dual-slider__button--next">
            <span class="icon icon--circle icon--fill icon--chevron"></span>
        </button>
        </div>
    </div>
</div>
