<section class="tag-cloud-sect">
    <div class="container">
        <nav>
            <ul class="tag-cloud">
                <li class="tag-cloud__item">
                    <a href="{{ \App\Models\Category::allPath() }}" class="button-tag tag-cloud__link @if (! $category)  button-tag--active @endif">
                        @lang('Все статьи')
                        <span class="button-tag__count">{{ \App\Models\Article::published()->count() }}</span>
                    </a>
                </li>

                @foreach($categories as $cat)
                    @if($cat->articlesCount > 0)
                        <li class="tag-cloud__item">
                            <a href="{{ $cat->path() }}" class="button-tag tag-cloud__link @if ($category and $category->id == $cat->id)  button-tag--active @endif">
                                {{ $cat->title }}
                                <span class="button-tag__count">{{ $cat->articlesCount }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</section>
