@if($pages->lastPage() > 1)
    <ul class="pagination">
        @if(! $pages->onFirstPage())
            <li class="pagination__item">
                <a href="{{ $pages->previousPageUrl() }}" class="pagination__link pagination__link--arrow-prev">
                    <span class="icon icon--chevron-inverse"></span>
                </a>
            </li>
        @endif

        <li class="pagination__item">
            <a href="{{ $pages->url(1) }}" class="pagination__link @if($pages->currentPage() == 1) pagination__link--active @endif">1</a>
        </li>

        @php
            $rangeStart = max($pages->currentPage() - 2, 2);
            $rangeEnd = min($pages->currentPage() + 2, $pages->lastPage() - 1);
        @endphp

        @if($rangeEnd > $rangeStart)
            @foreach($pages->getUrlRange($rangeStart, $rangeEnd) as $page => $link)
                <li class="pagination__item">
                    <a href="{{ $link }}" class="pagination__link @if($pages->currentPage() == $page) pagination__link--active @endif">{{ $page }}</a>
                </li>
            @endforeach
        @endif

        <li class="pagination__item">
            <a href="{{ $pages->url($pages->lastPage()) }}" class="pagination__link @if($pages->currentPage() == $pages->lastPage()) active @endif">{{ $pages->lastPage() }}</a>
        </li>

        @if($pages->hasMorePages())
            <li class="pagination__item">
                <a href="{{ $pages->nextPageUrl() }}" class="pagination__link pagination__link--arrow-next">
                    <span class="icon icon--chevron-inverse"></span>
                </a>
            </li>
        @endif
    </ul>
@endif
