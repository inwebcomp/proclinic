<section class="tag-cloud-sect">
    <div class="container">
        <nav>
            <ul class="tag-cloud">
                @for ($i = 0; $i < 12; $i++)
                    <li class="tag-cloud__item">
                        <a href="" class="button-tag button-tag--active tag-cloud__link">
                            Все статьи
                            <span class="button-tag__count">2{{$i}}</span>
                        </a>
                    </li>
                    <li class="tag-cloud__item">
                        <a href="" class="button-tag tag-cloud__link">
                            Профессиональная диагностика
                            <span class="button-tag__count">2{{++$i}}</span>
                        </a>
                    </li>
                @endfor
                    <li class="tag-cloud__all">Еще 7</li>
            </ul>
        </nav>
    </div>
</section>
