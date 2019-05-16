<header class="header">
    <div class="header__top-line">
        <div class="container header__top-line__container">
            <a class="logo header__logo" href="#">
                <img src="../img/logo.svg" width="160" height="40" alt="логотип" class="logo_img">
            </a>

            @include('blocks.menu', [
                'classMod' => 'header__menu',
            ])

            <a href="#" class="header__phone">
                <span class="icon icon--circle icon--fill icon--phone-call-white"></span>
                +373
                <span class="header__phone-bold">78 90 60 60</span>
            </a>

            @include('blocks.lang-toggler', [
                'classMod' => '',
            ])

        </div>
    </div>

    <div class="container banner header__banner">
        <div class="banner__row">
            <h1 class="banner__title">Лечение зубов без боли с гарантией результата</h1>
            <div class="banner__descr">Современный медицинский центр <br> <strong>в Кишиневе</strong></div>
        </div>
        <div class="banner__row">
            <div class="banner__quest">
                <p class="banner__quest__title">Нужна консультация?</p>
                <p>Оставьте заявку и получите бесплатный прием</p>
            </div>
            <div class="input-field">
                <span class="icon icon--phone-call input-field__icon"></span>
                <input class="input-field__input" type="text" placeholder="Как с вами связаться?">
                <button class="button">Отправить</button>
            </div>
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
    })
</script>
