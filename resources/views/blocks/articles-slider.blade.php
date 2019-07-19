@if(count($articles))
    <section class="block--articles-slider">
        <div class="container">
            <h3 class="block__title">@lang('Популярные записи')</h3>

            <div class="articles-slider">
                <div class="articles-slider__list js-slider">
                    @foreach ($articles as $article)
                        @include('blog.article')
                    @endforeach
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
@endif