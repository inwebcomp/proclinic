<div class="block block--reviews">
    <div class="container">
        <div class="reviews">
            <div class="reviews__head">
                <h3 class="block__title reviews__title">@lang('Клиенты говорят о нас')</h3>
                <div class="reviews__peoples-container">
                    <ul class="reviews__peoples">
                        @for ($i = 0; $i < 6; $i++)
                            <li class="reviews__man" data-selector=".reviews__item--{{$i}}">
                                <img src="{{ asset('img/reviews-people/1.jpg') }}" alt="Клиент" class="reviews__man__img">
                            </li>
                            <li class="reviews__man" data-selector=".reviews__item--{{++$i}}">
                                <img src="{{ asset('img/reviews-people/2.jpg') }}" alt="Клиент" class="reviews__man__img">
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>


            <div class="reviews__list-wrap">
                <div class="reviews__list">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="reviews__item reviews__item--{{$i}}" data-index="{{$i}}">
                            <p class="reviews__item__name">@lang('Ольга Шахматова')</p>
                            <span class="reviews__item__data">27.09.2018</span>
                            <p class="reviews__item__text">@lang('Современная стоматология. Передовые технологии и
                            качественное обслуживание! Уютный интерьер и
                            приветливый персонал!  Профессиональный и
                            индивидуальный подход! Уютный интерьер и
                            приветливый персонал Профессиональный и
                            индивидуальный подход! Уютный интерье') </p>
                        </div>
                        <div class="reviews__item reviews__item--{{++$i}}" data-index="{{$i}}">
                            <p class="reviews__item__name">@lang('Ольга Шахматова')</p>
                            <span class="reviews__item__data">27.09.2018</span>
                            <p class="reviews__item__text">@lang('Современная стоматология. Передовые технологии и
                            качественное обслуживание! ') </p>
                        </div>
                    @endfor
                </div>
                <button class="slider-button reviews__slider-btn reviews__slider-btn--prev">
                    <span class="icon icon--circle icon--fill icon--chevron"></span>
                </button>
                <button class="slider-button reviews__slider-btn reviews__slider-btn--next">
                    <span class="icon icon--circle icon--fill icon--chevron"></span>
                </button>
            </div>

            <div class="reviews__footer">
                <a href="#" class="button reviews__button">@lang('Оставить отзыв на сайте')</a>
                <a href="#" class="button reviews__button reviews__button--fb">@lang('Оставить отзыв на Facebook')</a>
            </div>
        </div>
    </div>
</div>
