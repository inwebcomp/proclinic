<section class="block block--services">
    <div class="container">
        <h3 class="block__title">@lang('Наши услуги')</h3>

        <div class="services">
            @foreach ($items as $item)
                <div class="service">
                    <span class="icon icon--circle-big icon--{{ $item['icon'] }} service__icon"></span>
                    <a href="#" class="service__img">
                        <img src="{{ asset('img/services/' . $item['img']) }}" alt="photo">
                        <p class="service__name">{{ $item['name'] }}</p>
                    </a>

                    @if ($item['list'])
                        <ul class="service__list">
                            <li class="service__list__item">имплантация зубов</li>
                            <li class="service__list__item">реконструктивные операции</li>
                        </ul>
                    @else
                        <p class="service__text">{{ $item['text'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
