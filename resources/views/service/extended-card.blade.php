<div class="article-card">
    <div class="container article-card__container">
        <h4 class="article-card__title article-card__title--mobl">{{ $service->title }}</h4>
        <a href="{{ $service->path() }}" class="article-card__photo">
            <img src="{{ optional($service->image)->getUrl('extended') }}" width="370" height="220" alt="{{ $service->title }}" class="article-card__img">
        </a>

        <div class="article-card__content">
            <h4 class="article-card__title">{{ $service->title }}</h4>
            <p class="article-card__text">{!! $service->description !!}</p>

            <a href="{{ $service->path() }}" class="button article-card__button">Читать далее</a>
        </div>
    </div>
</div>