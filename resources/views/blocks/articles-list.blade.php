<div class="block block--articles">
    <div class="container">
        <h3 class="block__title">@lang('Мы ответим на ваши вопросы')</h3>

        <div class="articles-list">
            @for ($i = 0; $i < 3; $i++)
                <div href="#"  class="article-prew">
                    <a href="#" class="article-prew__photo">
                        <img src="{{ asset('img/article-covers/1.jpg') }}" alt="Фото статьи" class="article-prew__img">
                    </a>

                    <a href="#" class="article-prew__title">@lang('Современная стоматогоия - ваш путь к красивой и здоровой улыбке')</a>
                    <ul class="tag-cloud">
                        <li class="tag-cloud__tag">
                            <a href="#" class="tag-cloud__tag__link">@lang('Лечение зубов')</a>
                        </li>
                    </ul>

                    <p class="article-prew__text">@lang('Сейчас стоматология уже стала неким искусством, где художником выступает сам стоматолог. Вся... ')</p>
                </div>
            @endfor
        </div>
    </div>
</div>


