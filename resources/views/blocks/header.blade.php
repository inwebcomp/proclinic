@include('blocks.mob-menu')
<header class="header">
    <div class="header__top-line">
        <div class="container header__top-line__container">
            <a class="logo header__logo" href="#">
                <img src="{{ asset('img/logo.svg') }}" width="200" alt="{{ config('app.name') }}" class="logo__img">
            </a>

            @include('blocks.menu', [
                'classMod' => 'header__menu',
            ])

            <a href="#" class="header__phone">
                <span class="icon icon--circle icon--fill icon--phone-call-white"></span>
                +373
                <span class="header__phone-bold">78 90 60 60</span>
            </a>

            @include('blocks.lang-toggler')
            {{-- @include('blocks.burgher-btn', [
                'classMod' => 'header__burgher',
            ]) --}}
             <button class="header__burgher">
                 <span class="icon icon--menu "></span>
            </button>

        </div>
    </div>


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
            <div class="input-field">
                <span class="icon icon--phone-call input-field__icon"></span>
                <input class="input-field__input" type="text" placeholder="Как с вами связаться?">
                <button class="button input-field__button">@lang('Отправить')</button>
            </div>
            <button class="button banner__input-button">@lang('Отправить')</button>
        </div>
    </div>
</header>

<script>
    const buttons = document.querySelectorAll('.lang-toggler__button');
    const burgher = document.querySelector('.header__burgher');
    const menu = document.querySelector('.mob-menu');

    buttons.forEach((item) => {
        item.addEventListener('click', (e) => {
            buttons.forEach((item)=> {
                item.classList.remove('active')
            })
            e.target.classList.toggle('active')
        })
    });

    burgher.addEventListener('click', () => {
        menu.classList.toggle('mob-menu--open')
    })
</script>
