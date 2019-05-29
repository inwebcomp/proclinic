<section class="mob-menu">
    <button class="mob-menu__close">
        <span class="icon icon--close mob-menu__close-icon"></span>
    </button>

    <a class="logo mob-menu__logo" href="#">
        <img class="logo__img" src="{{ asset('img/logo.svg') }}" width="170" alt="{{ config('app.name') }}">
    </a>

    <div class="mob-menu__langs">
         @include('blocks.lang-toggler')
    </div>

    <nav class="mob-menu__list">
        <a href="#" class="mob-menu__link">
            <span class="icon icon--busines"></span>
            Клиника
        </a>
        <a href="#" class="mob-menu__link">
            <span class="icon icon--chat"></span>
            Клиника
        </a>
        <a href="#" class="mob-menu__link">
            <span class="icon icon--email"></span>
            Клиника
        </a>
        <a href="#" class="mob-menu__link">
            <span class="icon icon--man"></span>
            Клиника
        </a>
        <a href="#" class="mob-menu__link">
            <span class="icon icon--peoples"></span>
            Клиника
        </a>
    </nav>

    <footer class="mob-menu__footer">
        <a href="#" class="header__phone mob-menu__phone">
            <span class="icon icon--circle icon--fill icon--phone-call-white"></span>
            +373
            <span class="header__phone-bold">78 90 60 60</span>
        </a>
    </footer>
</section>
