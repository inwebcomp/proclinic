@if (is_iterable($items))
    <section class="article-cards">
        @foreach ($items as $item)
            @include('service.extended-card', ['service' => $item])
        @endforeach
    </section>
@endif

