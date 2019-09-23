@if(count($clinic))
    <section class="block block--dual-slider" id="clinic">
        <div class="container">
            <div class="dual-slider">

                <div class="dual-slider__head">
                    <h3 class="block__title">@lang('Наша клиника')</h3>
                    <p class="dual-slider__descr">{{ \App\Models\Textblock::text('clinic_subheading') }}</p>
                </div>

                    <div class="slider-main is-slider owl-carousel">
                        @foreach($clinic as $i => $slide)
                            <div class="slider-main__slide">
                                <div class="slider-main__small">
                                    @php $prev_slide = $clinic[$i == 0 ? count($clinic) - 1 : $i - 1]; @endphp
                                    <div class="slider-main__small__photo">
                                        <img src="{{ optional($prev_slide->image)->getUrl('big') }}" width="720" height="410" alt="{{ $prev_slide->title }}" class="slider-main__img" >
                                    </div>
                                </div>
                                <div class="slider-main__big">
                                    <div class="slider-main__img-wrap">
                                        <img src="{{ optional($slide->image)->getUrl('big') }}" width="720" height="410" alt="{{ $slide->title }}" class="slider-main__img" >
                                    </div>
                                    <div class="slider-main__content">
                                        <p class="slider-main__title">{{ $slide->title }}</p>
                                        <p class="slider-main__text">{!! $slide->description !!}</p>
                                        @if($slide->link)<a href="{{ $slide->link }}" class="button">@lang('Читать далее')</a>@endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>               
            </div>
        </div>
    </section>
@endif