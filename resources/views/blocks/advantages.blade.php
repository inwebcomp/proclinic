<section class="block block--advantages" id="advantages">
    <div class="container">
        <h3 class="block__title">@lang('Наши преимущества')</h3>

        <div class="advantages">
            @foreach ($advantages as $i => $advantage)
                <div class="advantage @if($i == count($advantages) - 1 or $i == count($advantages) - 2) advantage--lg @endif">
                    <span class="icon icon--fill icon--circle-big advantage__icon"
                          style="background-image: url({{ optional($advantage->image)->getUrl() }})"></span>
                    <span class="advantage__counter">{{ '0' . ($i + 1) }}</span>
                    <span class="advantage__name">{{ $advantage->title }}</span>
                    <p class="advantage__text">{!! $advantage->description !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
