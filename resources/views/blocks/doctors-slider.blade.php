@if(count($doctors))
    <section class="block block--personals">
        <div class="container">
            <h3 class="block__title">@lang('Наши врачи')</h3>

            <div class="cart-slider">
                <div class="cart-slider__list js-slider is-slider">
                    @foreach($doctors as $doctor)
                        <a href="{{ localized($doctor->path()) }}" class="cart-slider__item">
                            <div class="cart-slider__photo">
                                <img src="{{ optional($doctor->image)->getUrl('catalog') }}" alt="{{ $doctor->title }}" class="cart-slider__img">
                            </div>
                            <p class="cart-slider__title">{{ $doctor->title }}</p>
                            <span class="cart-slider__descr">{{ $doctor->description }}</span>
                        </a>
                    @endforeach
                </div>

                <button class="slider-button slider-button--prev cart-slider__button--prev">
                    <span class="icon icon--circle icon--fill icon--chevron-left"></span>
                </button>
                <button class="slider-button slider-button--next cart-slider__button--next">
                    <span class="icon icon--circle icon--fill icon--chevron"></span>
                </button>
            </div>
        </div>
    </section>
@endif
