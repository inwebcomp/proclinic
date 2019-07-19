@if(count($clinic))
    <section class="block block--dual-slider" id="clinic">
        <div class="container">
            <div class="dual-slider">

                <div class="dual-slider__box">

                    <h3 class="block__title">@lang('Наша клиника')</h3>
                    <p class="dual-slider__descr">{{ \App\Models\Textblock::text('clinic_subheading') }}</p>

                    <div class="slider-small">
                        @for($i = 0; $i < count($clinic); $i++)
                            @php $slide = $clinic[$i == 0 ? count($clinic) - 1 : $i - 1]; @endphp
                            <div class="slider-small__slide">
                                <img src="{{ optional($slide->image)->getUrl('small') }}" width="470" height="232" alt="{{ $slide->title }}" class="slider-small__img" data-flickity-lazyload="{{ optional($slide->image)->getUrl('small') }}">
                            </div>
                        @endfor
                    </div>

                    <button class="slider-button slider-small__button--prev">
                        <span class="icon icon--circle icon--fill icon--chevron"></span>
                    </button>
                </div>

                <div class="dual-slider__box">
                    <div class="slider-main is-slider">
                        @foreach($clinic as $i => $slide)
                            <div class="slider-main__slide">
                                <div class="slider-main__img-wrap">
                                    <img src="{{ optional($slide->image)->getUrl('big') }}" data-flickity-lazyload="{{ optional($slide->image)->getUrl('big') }}" width="720" height="410" alt="{{ $slide->title }}" class="slider-main__img" >

                                    <button class="slider-button dual-slider__button--prev slider-main__button--prev">
                                        <span class="icon icon--circle icon--fill icon--chevron"></span>
                                    </button>
                                    <button class="slider-button dual-slider__button--next slider-main__button--next">
                                        <span class="icon icon--circle icon--fill icon--chevron"></span>
                                    </button>
                                </div>
                                <div class="slider-main__content">
                                    <p class="slider-main__title">{{ $slide->title }}</p>
                                    <p class="slider-main__text">{{ $slide->description }}</p>
                                    @if($slide->link)<a href="{{ $slide->link }}" class="button">@lang('Читать далее')</a>@endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif