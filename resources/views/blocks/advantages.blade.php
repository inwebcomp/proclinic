<section class="block block--advantages">
    <div class="container">
        <h3 class="block__title">@lang('Наши преимущества')</h3>

        <div class="advantages">
            @foreach ($items as $item)
                <div class="advantage {{ $item['classMod'] ?? '' }}">
                    <span class="icon icon--fill icon--circle-big icon--{{ $item['icon'] }} advantage__icon"></span>
                    <span class="advantage__counter">{{ $item['count'] }}</span>
                    <span class="advantage__name">{{ $item['name'] }}</span>
                    <p class="advantage__text">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
