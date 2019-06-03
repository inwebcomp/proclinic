<section class="block block--personals">
    <div class="container">
        <h3 class="block__title">@lang('Наши врачи')</h3>

        <div class="cart-slider">
            <div class="cart-slider__list js-slider">
                @for ($i = 0; $i < 3; $i++)
                <a href="#" class="cart-slider__item">
                    <div class="cart-slider__photo">
                        <img src="{{ asset('img/personal/doctor-1.png') }}" alt="Доктор" class="cart-slider__img">
                    </div>
                    <p class="cart-slider__title">@lang('Шахмантов Алексей Николаевич')</p>
                    <span class="cart-slider__descr">@lang('Врач, хирург-имплантолог')</span>
                </a>
                <a href="#" class="cart-slider__item">
                    <div class="cart-slider__photo">
                        <img src="{{ asset('img/personal/doctor-2.png') }}" alt="Доктор" class="cart-slider__img">
                    </div>
                    <p class="cart-slider__title">@lang('Шахмантов Алексей Николаевич')</p>
                    <span class="cart-slider__descr">@lang('Врач, хирург-имплантолог')</span>
                </a>
                @endfor
            </div>

            <button class="slider-button slider-button--prev cart-slider__button--prev">
                <span class="icon icon--circle icon--fill icon--chevron"></span>
            </button>
            <button class="slider-button slider-button--next cart-slider__button--next">
                <span class="icon icon--circle icon--fill icon--chevron"></span>
            </button>
        </div>
    </div>
</section>
