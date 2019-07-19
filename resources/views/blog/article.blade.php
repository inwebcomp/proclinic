<div class="article-prew">
    <a href="{{ $article->path() }}" class="article-prew__photo">
        <img src="{{ asset('img/article-covers/1.jpg') }}" alt="{{ $article->title }}" class="article-prew__img">
    </a>

    <a href="{{ $article->path() }}" class="article-prew__title">{{ $article->title }}</a>
    <ul class="tags">
        @if ($article->category)
            <li class="tags__item">
                <a href="{{ $article->category->path() }}" class="tags__item__link tags__item__link--active">{{ $article->category->title }}</a>
            </li>
        @endif
        {{--                <li class="tags__date">{{ $article->date }}</li>--}}
    </ul>

    <div class="article-prew__text">{{ $article->description }}</div>
</div>