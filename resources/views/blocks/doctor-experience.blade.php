<div class="container">
    <div class="doctor-experience">
        <div class="doctor-slider">
             <ul class="doctor-slider__list js-slider">
                @for ($i = 0; $i < 4; $i++)
                <li class="doctor-slider__item">
                    <img src="{{ asset('img/doctors/doctor-slide-1.jpg') }}" alt="Фото врача" class="doctor-slider__img">
                </li>
                @endfor
            </ul>
            <button type="button" class="slider-button slider-button--prev doctor-slider__button--prev">
                    <span class="icon icon--circle icon--fill icon--chevron"></span>
            </button>
            <button type="button" class="slider-button slider-button--next doctor-slider__button--next">
                <span class="icon icon--circle icon--fill icon--chevron"></span>
            </button>
        </div>

        @for ($i = 0; $i < 3; $i++)
        <p><b>С 2001 года</b>  проходит стажировки у ведущих стоматологов США, Японии, Германии, Австрии, Итали, Франции, проходит стажировки у ведущих стоматологов США, Японии, Германии, Австрит стажировки у ведущих стоматологов США, Японии, Германии, Австрии, Итали, Франции, проходит стажировки у ведущих стоматологов США, Японии, Германии, Австрит стажировки у ведущих стоматологов США, Японии, Германии, Австрии, Итали,  </p>
        <p><b>С 2001 года</b>  проходит стажировки у ведущих стоматологов США, Японии, Германии, Австрии, Итали, Франции, Кореи, Израиля</p>
        <p><b>С 2001 года</b>  проходит стажировки у ведущих стоматологов США, Японии, Германии, Австрии, Итали, Франции, проходит стажировки у ведущих стоматологов США, Японии, Германии, Австрии, </p>
        @endfor
    </div>
</div>
