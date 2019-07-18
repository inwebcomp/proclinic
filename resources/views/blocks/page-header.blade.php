<section class="page-header">
    <div class="container">
        <h2 class="title page-header__title">{{ $pageTitle }}</h2>

        @if (isset($breadcrumbs) and is_iterable($breadcrumbs))
            <nav class="breadcrumbs">
                <a href="{{ localized('') }}" class="breadcrumbs__item">
                    <span class="icon icon--home"></span>
                </a>
                @foreach($breadcrumbs as $item)
                    <a href="{{ $item['link'] }}" class="breadcrumbs__item">
                        <span class="breadcrumbs__text">{{ $item['title'] }}</span>
                    </a>
                @endforeach
            </nav>
        @endif
    </div>
</section>
