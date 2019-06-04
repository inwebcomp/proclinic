@include('blocks.mob-menu')
<header class="header">
    @include('blocks.header__top-line')

    <div class="container banner header__banner">
        <div class="banner__row">
            <h1 class="banner__title">@lang('Лечение зубов без боли с гарантией результата')</h1>
            <div class="banner__descr">@lang('Современный медицинский центр') <strong>@lang('в Кишиневе')</strong></div>
        </div>
        <div class="banner__row">
            <div class="banner__quest">
                <p class="banner__quest__title">@lang('Нужна консультация?')</p>
                <p>@lang('Оставьте заявку и получите бесплатный прием')</p>
            </div>
            <field-contact/>
        </div>
    </div>
</header>
