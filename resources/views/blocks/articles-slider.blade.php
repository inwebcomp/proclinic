<section class="block block--articles-slider">
    <div class="container">
        <h3 class="block__title">@lang('Наши врачи')</h3>

        <div class="articles-slider">
            <div class="articles-slider__list js-slider">
                @for ($i = 0; $i < 6; $i++)
                    <div href="#"  class="article-prew">
                        <a href="#" class="article-prew__photo">
                            <img src="{{ asset('img/article-covers/1.jpg') }}" alt="Фото статьи" class="article-prew__img">
                        </a>

                        <a href="#" class="article-prew__title">@lang('Современная стоматогоия - ваш путь к красивой и здоровой улыбке')</a>
                        <ul class="tags">
                            <li class="tags__item">
                                <a href="#" class="tags__item__link tags__item__link--active">@lang('Лечение зубов')</a>
                            </li>
                            <li class="tags__date">27.09.2018</li>
                        </ul>

                        <p class="article-prew__text">@lang('Сейчас стоматология уже стала неким искусством, где художником выступает сам стоматолог. Вся... ')</p>
                    </div>
                @endfor
            </div>

            <button class="slider-button slider-button--prev articles-slider__button--prev">
                <span class="icon icon--circle icon--fill icon--chevron"></span>
            </button>
            <button class="slider-button slider-button--next articles-slider__button--next">
                <span class="icon icon--circle icon--fill icon--chevron"></span>
            </button>
        </div>
    </div>
</section>
