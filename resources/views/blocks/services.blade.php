<section class="block block--services" id="services">
    <div class="container">
        <h3 class="block__title">@lang('Наши услуги')</h3>

        <div class="services">
            @foreach ($services as $service)
                @include('service.card')
            @endforeach
        </div>
    </div>
</section>
