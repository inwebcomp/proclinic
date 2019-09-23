<div class="container">
    <div class="doctor-experience">
        <div class="doctor-slider">
             <ul class="doctor-slider__list owl-carousel">
                @foreach($doctor->images as $image)
                    @php if ($image->isMain()) continue; @endphp

                     <li class="doctor-slider__item">
                        <img src="{{ $image->getUrl('info')  }}" width="570" height="380" alt="Фото врача" class="doctor-slider__img">
                    </li>
                @endforeach
            </ul>

            {{-- <button type="button" class="slider-button slider-button--prev doctor-slider__button--prev">
                    <span class="icon icon--circle icon--fill icon--chevron"></span>
            </button>
            <button type="button" class="slider-button slider-button--next doctor-slider__button--next">
                <span class="icon icon--circle icon--fill icon--chevron"></span>
            </button> --}}
        </div>

        <div>{!! $doctor->text !!}</div>
    </div>
</div>
