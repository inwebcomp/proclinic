<div class="articles-list">
    @for ($i = 0; $i < 3; $i++)
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

