<section class="block block--reviews" id="testimonials">
    <div class="container">
        <div class="reviews">
            <div class="reviews__head">
                <h3 class="block__title reviews__title">@lang('Клиенты говорят о нас')</h3>
                {{--<div class="reviews__peoples-container">--}}
                    {{--<ul class="reviews__peoples">--}}
                        {{--<li class="reviews__man" data-selector=".reviews__item--0">--}}
                            {{--<img src="{{ asset('img/reviews-people/1.jpg') }}" alt="Клиент" class="reviews__man__img">--}}
                        {{--</li>--}}
                        {{--<li class="reviews__man" data-selector=".reviews__item--1">--}}
                            {{--<img src="{{ asset('img/reviews-people/2.jpg') }}" alt="Клиент" class="reviews__man__img">--}}
                        {{--</li>--}}
                        {{--<li class="reviews__man" data-selector=".reviews__item--1">--}}
                            {{--<img src="{{ asset('img/reviews-people/2.jpg') }}" alt="Клиент" class="reviews__man__img">--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>


            <div class="reviews__list-wrap">
                <div class="reviews__list">
                    @foreach($testimonials as $i => $testimonial)
                        <div class="reviews__item reviews__item--{{$i}}" data-index="{{$i}}">
                            <p class="reviews__item__name">{{ $testimonial->name }}</p>
                            <span class="reviews__item__data">{{ $testimonial->date }}</span>
                            <p class="reviews__item__text">{{ $testimonial->text }}</p>
                        </div>
                    @endforeach
                </div>
                <button class="slider-button reviews__slider-btn reviews__slider-btn--prev">
                    <span class="icon icon--circle icon--fill icon--chevron"></span>
                </button>
                <button class="slider-button reviews__slider-btn reviews__slider-btn--next">
                    <span class="icon icon--circle icon--fill icon--chevron"></span>
                </button>
            </div>

            <div class="reviews__footer">
                <button type="button" class="button reviews__button" @click.prevent="showPopup('contact')">@lang('Оставить отзыв на сайте')</button>
                <a target="_blank" href="https://www.facebook.com/pg/stomatologie.proclinic/reviews/?ref=page_internal" class="button reviews__button reviews__button--fb">@lang('Оставить отзыв на Facebook')</a>
            </div>
        </div>
    </div>
</section>
