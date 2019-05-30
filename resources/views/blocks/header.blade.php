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
            <div class="input-field input-field--buttoned">
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

    buttons.forEach((item) => {
        item.addEventListener('click', (e) => {
            buttons.forEach((item)=> {
                item.classList.remove('active')
            })
            e.target.classList.toggle('active')
        })
    });
</script>
