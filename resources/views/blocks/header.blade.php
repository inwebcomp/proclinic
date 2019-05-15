<header class="header">
    <div class="header__top-line">
        <div class="container header__top-line__container">
            <img src="../img/logo.svg" width="160" height="40" alt="логотип" class="logo header__logo">

            <nav class="menu">
                <a href="#" class="menu__link">Услуги</a>
                <a href="#" class="menu__link">Клиника</a>
                <a href="#" class="menu__link">Отзывы</a>
                <a href="#" class="menu__link">Блог</a>
                <a href="#" class="menu__link">Контакты </a>
            </nav>

            <a href="#" class="header__phone">
                <span class="icon icon--circle icon--fill icon--phone-call"></span>
                +373
                <span class="header__phone-bold">78 90 60 60</span>
            </a>

            <div class="lang-toggler">
                <button class="lang-toggler__button lang-toggler__button--ru active">ru</button>
                <button class="lang-toggler__button lang-toggler__button--md">md</button>
                <button class="lang-toggler__button lang-toggler__button--en">en</button>
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
